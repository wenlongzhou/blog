<?php
class IndexController extends Controller{
    public function ActionLabel(){
        $data = Label::model()->findAll();
        $this->renderStatic('label',array('data'=>$data));
    }
    public function ActionQQRoll(){

    }
    public function ActionTest(){
        include('ws.php');
        $ws = new Ws('localhost',4000);
        $ws->run();
        p($ws);
    }
    public function ActionSetlog($content){
        file_put_contents('./',$content."\r\n",FILE_APPEND);
    }
    public function ActionTest1(){
        $this->render('test1');
    }
    public function ActionTell(){
        $this->render('tell');
    }
    public function ActionGetPosition($p=''){
        logs($p);
    }
    public function ActionCors(){
//        header("Access-Control-Allow-Origin:http://localhost");  // * 可改为[域名|ip], 多个地址用逗号,分割
//        header("Access-Control-Request-Method: POST"); // 设置只允许POST请求跨域
//        header("Access-Control-Allow-Credentials: true");
        p('aa');
    }
}