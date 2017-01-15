<?php
class BaseController extends Controller{
    protected function beforeAction($action){
        if(Yii::app()->user->isGuest){
            $this->redirect(array('login/index'));
        }
        return true;
    }
}