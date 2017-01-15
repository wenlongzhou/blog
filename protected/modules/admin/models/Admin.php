<?php
/**
 * Created by PhpStorm.
 * User: CF
 * Date: 2016/5/23
 * Time: 15:31
 */
class Admin extends CActiveRecord{
    public $username;
    public $password;
    public $password1;

    public static function model($className = __CLASS__){
        return parent::model($className);
    }
    public function tableName(){
        return "admin"; //花括号表示可以自动拼接前缀
    }
    public function attributeLabels(){
        return array(
            'username'=>'用户名',
            'password'=>'密码',
            'password1'=>'确认密码'
        );
    }
    public function rules(){
        return array(
            array('username,password,password1','required'),
            array('username','exist'),
            array('password1','compare','compareAttribute'=>'password','message'=>'2次密码不一样！'),
        );
    }
    public function exist(){
        if(!$this->hasErrors()){
            $adminInfo = Admin::model()->find('username=:name',array(':name'=>$this->username));
            if($adminInfo){
                $this->addError('username','用户名已存在！');
            }
        }
    }
}