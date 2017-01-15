<?php

/**
 * Created by PhpStorm.
 * User: CF
 * Date: 2016/5/20
 * Time: 14:26
 */
class MenuController extends BaseController{

    public function actionindex(){
        $data = Menu::model()->findAll();
        $this->render('index', array('data' => $data));
    }

    public function actionadd(){
        $m = new Menu();
        if ($_POST) {
            $m->attributes = $_POST['Menu'];
            if ($m->save()) {
                Yii::app()->user->setFlash('success', '添加成功！');
                $this->redirect(array('menu/index'));
            }
        }
        $this->render('add', array('model' => $m));
    }

    public function actionupdate($id){
        $m = new Menu();
        if ($_POST) {
            $m->attributes = $_POST['Menu'];
            if ($m->validate()) {
                $res = $m->updateByPk($id, $_POST['Menu']);
                if ($res) {
                    Yii::app()->user->setFlash('success', '修改成功！');
                    $this->redirect(array('menu/index'));
                }
            }
        }
        $data = Menu::model()->findByPk($id);
        $this->render('update', array('model' => $m, 'data' => $data));
    }

    public function actiondelete($id){
        if (Menu::model()->findByPk($id)->delete()) {
            Yii::app()->user->setFlash('success', '删除成功！');
            $this->redirect(array('menu/index'));
        }
    }
}