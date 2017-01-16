<?php
/**
 * Created by PhpStorm.
 * User: CF
 * Date: 2016/5/20
 * Time: 9:44
 */
class IndexController extends BaseController{
    public function actionIndex(){
        $data = Article::model()->findByPk(27);
        Yii::import('application.extensions.md.Markdown');
        $my_text = file_get_contents($data->path);
        $my_html = Markdown::defaultTransform($my_text);
        p($my_html);
        $this->render('index');
    }
}