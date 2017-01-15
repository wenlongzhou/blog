<?php
/**
 * Created by PhpStorm.
 * User: CF
 * Date: 2016/5/23
 * Time: 15:31
 */
class Article extends CActiveRecord{

    public static function model($className = __CLASS__){
        return parent::model($className);
    }
    public function tableName(){
        return "article";
    }
    public function relations(){
        return array(
            'tab' => array(self::BELONGS_TO,'Label','tag_id'),
            'rep' => array(self::HAS_MANY,'Reply','article_id')
        );
    }
    public static function getHomeArticle($tid,$s){
        if($tid == 0){
            $l = $s?"content like :s or title like :s":'tag_id<>10';
            $d = Article::model()->with('tab')->findAll(array(
                'condition' => $l,
                'params'    => [':s'=>'%'.$s.'%'],
                'order'     => 'update_time desc'
            ));
        }else{
            $d = Article::model()->with('tab')->findAll(array(
                'condition' => "tag_id=:tid",
                'params'    => array(':tid'=>(int)$tid),
                'order'     => 'update_time desc'
            ));
        }
        foreach($d as &$v){
            $v->content = CArticle::Generate_Brief($v->content,1500);
        }
        return $d;
    }
}