<?php
/**
 * Created by PhpStorm.
 * User: CF
 * Date: 2016/5/20
 * Time: 9:44
 */
use \Michelf\Markdown;

class IndexController extends BaseController{
    public function actionIndex(){
        $this->render('index');
    }
}