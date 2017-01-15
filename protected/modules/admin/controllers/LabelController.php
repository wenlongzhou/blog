<?php
/**
 * Created by PhpStorm.
 * User: CF
 * Date: 2016/5/20
 * Time: 14:26
 */
class LabelController extends BaseController{

    public function actionindex(){
        $data = Label::model()->findAll();
        $this->render('index',array('data'=>$data));
    }

    public function actionadd(){
        $m = new Label();
        if ($_POST) {
            $m->attributes = $_POST['Label'];
            if ($m->save()) {
                Yii::app()->user->setFlash('success', '添加成功！');
                $this->redirect(array('label/index'));
            }
        }
        $this->render('add',array('model'=>$m));
    }

    public function actionupdate($id){
        $m = new Label();
        $data = Label::model()->findByPk($id);
        if ($_POST) {
            $m->oldValue = $data->value;
            $m->attributes = $_POST['Label'];
            if ($m->validate()) {
                $res = Label::model()->updateByPk($id, $_POST['Label']);
                if ($res) {
                    Yii::app()->user->setFlash('success', '修改成功！');
                    $this->redirect(array('label/index'));
                }
            }
        }
        $this->render('update',array('model'=>$m,'data'=>$data));
    }

    public function actiondelete($id){
        if (Label::model()->findByPk($id)->delete()) {
            Yii::app()->user->setFlash('success', '删除成功！');
            $this->redirect(array('label/index'));
        }
    }
}