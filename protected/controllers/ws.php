<?php
Class WS {
    var $master;
    var $sockets = array();

    public function __construct($a, $p)
    {
        $this->master = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)
        or die("socket_create() failed:" . socket_strerror(socket_last_error()));

        socket_set_option($this->master, SOL_SOCKET, SO_REUSEADDR, 1)
        or die("socket_option() failed" . socket_strerror(socket_last_error()));

        socket_bind($this->master, $a, $p)
        or die("socket_bind() failed" . socket_strerror(socket_last_error()));

        socket_listen($this->master, 20)
        or die("socket_listen() failed" . socket_strerror(socket_last_error()));

        echo "Listening on   : " . $a . " port " . $p . "\n";

        array_push($this->sockets, $this->master);
        while (true) {
            //自动选择来消息的 socket 如果是握手 自动选择主机
            $write = NULL;
            $except = NULL;
            socket_select($this->sockets, $write, $except, NULL);
            foreach($this->sockets as $v){
                if($v == $this->master){
                    $client = socket_accept($this->master);
                    socket_recv($client, $buffer, 2048, 0);
                    if(socket_write($client, $this->handshakeResponse($buffer))!== false){
                        array_push($this->sockets, $client);
                    }else{
                        echo 'error on handshake';
                    }
                }else{
                    socket_recv($v, $buffer, 2048, 0);
                    $frame = $this->parseFrame($buffer);
                    socket_write($v,date('Y-m-d H:i:s',time()).' : '.$buffer);
                    $str  = $this->decode($buffer);
                    $str = $this->frame($str);
                    socket_write($v,$str,strlen($str));
                }
            }
        }
    }
    private function getBit($m,$n){
        return  ($n >> ($m-1)) & 1;
    }

    /**
     *  parse the frame
     * */
    private function parseFrame($d){
        $firstByte = ord(substr($d,0,1));
        $result =array();
        $result['FIN'] = $this->getBit($firstByte,1);
        $result['opcode'] = $firstByte & 15;
        $result['length'] = ord(substr($d,1,1)) & 127;
        return $result;
    }

    /*
     *   build the data frame sent to client by server socket.
     *
     * **/
    function frame($s){
        $a = str_split($s, 125);
        if (count($a) == 1){
            return "\x81" . chr(strlen($a[0])) . $a[0];
        }
        $ns = "";
        foreach ($a as $o){
            $ns .= "\x81" . chr(strlen($o)) . $o;
        }
        return $ns;
    }

    /*
     * decode the client socket input
     *
     * **/
    function decode($buffer) {
        $len = $masks = $data = $decoded = null;
        $len = ord($buffer[1]) & 127;

        if ($len === 126) {
            $masks = substr($buffer, 4, 4);
            $data = substr($buffer, 8);
        }
        else if ($len === 127) {
            $masks = substr($buffer, 10, 4);
            $data = substr($buffer, 14);
        }
        else {
            $masks = substr($buffer, 2, 4);
            $data = substr($buffer, 6);
        }

        for ($index = 0; $index < strlen($data); $index++) {
            $decoded .= $data[$index] ^ $masks[$index % 4];
        }
        return $decoded;
    }

    /**params @parseRequest : request written in socket
     * return handshakResponse witten in response socket
     * */
    function  handshakeResponse($request){
        $parsedRequest  = $this->parseHeaders($request);
        $encryptedKey = $this->getKey($parsedRequest['key']);
        $response  = "HTTP/1.1 101 Switching Protocol\r\n" .
            "Upgrade: websocket\r\n" .
            "Connection: Upgrade\r\n" .
            "Sec-WebSocket-Accept: " .$encryptedKey. "\r\n\r\n";
        return $response;

    }

    /*
     * params @requestHeaders : read from request socket
     * return an array of request
     *
     * */
    function parseHeaders($requsetHeaders){
        $resule =array();
        if (preg_match("/GET (.*) HTTP/"              ,$requsetHeaders,$match)) { $resule['reuqest'] = $match[1]; }
        if (preg_match("/Host: (.*)\r\n/"             ,$requsetHeaders,$match)) { $result['host'] = $match[1]; }
        if (preg_match("/Origin: (.*)\r\n/"           ,$requsetHeaders,$match)) { $result['origin'] = $match[1]; }
        if (preg_match("/Sec-WebSocket-Key: (.*)\r\n/",$requsetHeaders,$match)) { $result['key'] = $match[1]; }
        return $result;

    }

    /*
     * protocol version : 13
     * generting the key of handshaking
     * return encrypted key
     * */
    function getKey($requestKey){
        return base64_encode(sha1($requestKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11', true));

    }
}