<?php
/**
 * Created by PhpStorm.
 * User: CF
 * Date: 2016/5/17
 * Time: 15:21
 */
class Menu extends CActiveRecord{
    public static function model($className = __CLASS__){
        return parent::model($className);
    }
    public function tableName(){
        return "a_menu"; //花括号表示可以自动拼接前缀
    }
    public function attributeLabels(){
        return array(
            'c' => '控制器',
            'f' => '方法',
            'i' => '图标',
            'name' => '菜单名',
            'pid' => '属于'
        );
    }
    public function rules(){
        return array(
            array('c','required','message'=>'控制器必须填写！'),
            array('f','required','message'=>'方法必须填写！'),
            array('i','required','message'=>'图标必须填写！'),
            array('name','required','message'=>'菜单名必须填写！'),
            array('pid','required','message'=>'属于必须填写！')
        );
    }
    public static function getMenuList(){
        return Menu::model()->findAll();
    }
}