<?php
/**
 * Created by PhpStorm.
 * User: CF
 * Date: 2016/5/17
 * Time: 13:49
 */
class LoginController extends Controller{
    public function actionIndex(){
        $loginForm = new LoginForm();
        if(!empty($_POST)){
            $loginForm->attributes = $_POST['LoginForm'];
            if($loginForm->validate() && $loginForm->login()){
                echo Yii::app()->user->name;
                $this->redirect(array('index/index'));
            }
        }
        $this->layout = 'null';
        $this->render('index',array('loginForm'=>$loginForm));
    }

    public function actions(){
        return array(
            'captcha'=>array(
                'class'=>'system.web.widgets.captcha.CCaptchaAction',
                'height'=>35,
                'width'=>80,
                'minLength'=>4,
                'maxLength'=>4
            )
        );
    }

    public function actionOut(){
        Yii::app()->user->logout();
        $this->redirect(array('index'));
    }
}