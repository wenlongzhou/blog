<?php
/**
 * Created by PhpStorm.
 * User: CF
 * Date: 2016/5/20
 * Time: 14:26
 */
class ArticleController extends BaseController{

    public function actionindex(){
        $data = Article::getArticleList();
        $this->render('index',array('data' => $data));
    }

    public function actionadd(){
        $m = new Article();
        if($_POST){
            if(isset($_POST['id']) && $_POST['id'] != ''){
                $this->actionupdate($_POST['id']);exit;
            }
            $m->attributes  = $_POST['Article'];
            $m->md_content = $_POST['Article']['md_content'];
            if($m->validate()){
                $m->path = './assets/editor/md/'.$_POST['Article']['title'].'.md';
                $res = file_put_contents($m->path,$_POST['Article']['md_content']);
                if($m->save() && $res){
                    if(Yii::app()->request->isAjaxRequest){
                        echo $m->primaryKey;exit;
                    }
                    Yii::app()->user->setFlash('success', '添加成功！');
                    $this->redirect(array('article/index'));
                }
            }
        }
        $label = Label::model()->findAll();
        $this->render('add',array('model'=>$m,'label'=>$label));
    }

    public function actionupdate($id){
        $data = Article::model()->findByPk($id);
        if($_POST){
            file_put_contents($data->path,$_POST['Article']['md_content']);
            $data->attributes = $_POST['Article'];
            $data->md_content = $_POST['Article']['md_content'];
            if($data->save()){
                if(Yii::app()->request->isAjaxRequest){
                    echo $data->primaryKey;exit;
                }
                Yii::app()->user->setFlash('success', '修改成功！');
                $this->redirect(array('article/index'));
            }
        }
        $label = Label::model()->findAll();
        $this->render('update',array('model'=>$data,'label'=>$label,'data'=>$data));
    }

    public function actiondelete($id,$link){
        if(Article::model()->findByPk($id)->delete() && unlink($link)){
            Yii::app()->user->setFlash('success','删除成功！');
        }else{
            Yii::app()->user->setFlash('success','删除失败！');
        }
        $this->redirect(array('article/index'));
    }
}