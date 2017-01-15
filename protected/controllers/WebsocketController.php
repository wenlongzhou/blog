<?php
class WebsocketController extends Controller{
    public function ActionIndex(){
	include 'ws.php';
        $w = new WS('localhost',5000);
        $w->run();
    }
}
