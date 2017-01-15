<?php
/**
 * Created by PhpStorm.
 * User: CF
 * Date: 2016/5/17
 * Time: 15:21
 */
class Label extends CActiveRecord{
    public $oldValue;

    public static function model($className = __CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return "label"; //花括号表示可以自动拼接前缀
    }

    public function attributeLabels(){
        return array(
            'value' => '标签名',
            'image' => '图片'
        );
    }

    public function rules(){
        return array(
            array('value','required','message'=>'标签名不能为空！'),
            array('value','exist'),
            array('image','required','message'=>'图片不能为空！'),
        );
    }

//    public function relations(){
//        return array(
//            'articles'=>array(self::MANY_MANY,'Label','article_label(tag_id,id)')
//        );
//    }

    public function exist(){
        if($this->oldValue != $this->value){
            $label = Label::model()->find('value=:v', array(':v' => $this->value));
            if ($label) {
                $this->addError('value', '标签名已存在！');
            }
        }
    }

    public function getLabel(){

    }
}