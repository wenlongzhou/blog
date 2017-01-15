<?php

/**
 * Created by PhpStorm.
 * User: CF
 * Date: 2016/5/23
 * Time: 15:24
 */
class AdminController extends BaseController{

    public function actionindex(){
        $data = Admin::model()->findAll();
        $this->render('index', array('data' => $data));
    }

    public function actionadd(){
        $m = new Admin;
        if ($_POST) {
            $m->attributes = $_POST['Admin'];
            if ($m->save()) {
                Yii::app()->user->setFlash('success', '添加成功！');
                $this->redirect(array('admin/index'));
            }
        }
        $this->render('add', array('model' => $m));
    }

    public function actionupdate($id, $name){
        $m = Admin::model();
        if ($_POST) {
            $m->attributes = $_POST['Admin'];
            if ($m->validate(array('password'))) {
                $res = $m->updateByPk($id, array('password'=>$_POST['Admin']['password']));
                if ($res) {
                    Yii::app()->user->setFlash('success', '修改成功！');
                    $this->redirect(array('admin/index'));
                }
            }
        }
        $this->render('update', array('model' => $m, 'name' => $name));
    }

    public function actiondelete($id){
        if (Admin::model()->findByPk($id)->delete()) {
            Yii::app()->user->setFlash('success', '删除成功！');
            $this->redirect(array('admin/index'));
        }
    }
}