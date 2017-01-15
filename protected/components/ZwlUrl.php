<?php

class ZwlUrl extends CUrlManager{

    public $arr = array(
        'article/info',
        'article/index',
        'index/label',
        'article/list',
        'article/zwl',
    );

    public function createUrl($route,$params=array(),$ampersand='&'){
        if(YII_DEBUG)return parent::createUrl($route,$params,$ampersand);
        $split = explode($ampersand,$route);
        $type = $split[0];
        unset($split[0]);
        if(in_array($type,$this->arr)){
            $split = paramToArray($split);
            $split = array_merge($split,$params);
            switch($type){
                case 'article/info':
                    if(isset($split['s']))return parent::createUrl($route,$params,$ampersand);

                    return '/article/'.$split['c'].'.html';

                case 'article/index':
                    if(isset($split['s']))return parent::createUrl($route,$params,$ampersand);

                    if(isset($split['tid']))return '/article/t'.$split['tid'].'.html';

                    return '/index.html';

                case 'index/label':
                    return '/label.html';

                case 'article/list':
                    return '/list.html';

                case 'article/zwl':
                    return '/zwl.html';
            }
            return parent::createUrl($route,$params,$ampersand);
        }else{
            return parent::createUrl($route,$params,$ampersand);
        }
    }

}