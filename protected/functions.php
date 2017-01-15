<?php
/**
 * Created by PhpStorm.
 * User: CF
 * Date: 2016/5/16
 * Time: 17:44
 */
function p($request,$log=false){
    if($log){
        CVarDumper::dump($request,$depth=10,$highlight=true);
    }else{
        CVarDumper::dump($request,$depth=10,$highlight=true);exit;
    }

}
function logs($p=''){
    $s = md5($_SERVER['REMOTE_ADDR'] . $p . $_SERVER['HTTP_USER_AGENT']);
    if(!Yii::app()->cache->get($s)){
        Yii::app()->cache->set($s,'1',1800);
        $str = date('Y-m-d H:i:s',time()) ."\t". $_SERVER['REMOTE_ADDR'] ."\t". $p ."\t". $_SERVER['HTTP_USER_AGENT']."\r\n";
        file_put_contents('./log.txt',$str,FILE_APPEND);
    }
}
function paramToArray($arr){
    if(empty($arr))return $arr;
    foreach($arr as $k=>$v){
        $param = explode('=',$v);
        $arr[$param[0]] = $param[1];
        unset($arr[$k]);
    }
    return $arr;
}