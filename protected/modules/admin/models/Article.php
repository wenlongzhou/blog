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
        return "article"; //花括号表示可以自动拼接前缀
    }
    public function attributeLabels(){
        return array(
            'title'=>'标题',
            'content'=>'内容',
            'tag_id'=>'标签'
        );
    }
    public function rules(){
        return array(
            array('title,content,tag_id','required'),
            array('title', 'checktitle' ,'on'=>'create'),
        );
    }
    public function checktitle($attribute,$params){
        $data = $this::model()->find('title=:t',array(':t'=>$_POST['Article']['title']));
        if($data){
            $this->addError($attribute,'该标题已存在！');
        }
    }
    public function relations(){
        return array(
            'labels'=>array(self::BELONGS_TO,'Label','id')
        );
    }
    public static function getArticleList(){
        $data = $user = Yii::app()->db->createCommand()
            ->select('a.*,l.value')
            ->from('article a')
            ->join('label l', 'a.tag_id=l.id')
            ->queryAll();
        return $data;
    }
}