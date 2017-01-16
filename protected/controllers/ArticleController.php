<?php
class ArticleController extends Controller{

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

    /*
     * 前台首页，显示所有文章
     * @param tid:标签id
     */
    public function actionIndex($tid=0,$s=''){
        logs();
        $d = Article::getHomeArticle($tid,$s);
        $this->renderStatic('index',array('data'=>$d));
    }

    /**
     * @param $c
     * @param string $s
     * 文章页
     */
    public function actionInfo($c,$s=''){
        $data = Article::model()->with(array('tab'))->findByPk((int)$c);
        //搜索关键字变红
        if($s){
            $data['content'] = preg_replace('/(<[^>]*>[^<]*)('.$s.')([^<]*<\/[^>]*>)/i','$1'.'<span style="color:red">'.$s.'</span>'.'$3',$data['content']);
        }
        $this->renderStatic('info',array('data'=>$data));
    }

    /**
     * 发表评论
     */
    public function actionAddComment(){
        if($_GET){
            $m = new Reply();
            //字段映射
            $data = $m::fieldMap($_GET['reply']);
            $m->attributes = $data;
            if($m->save()){
                echo "Y";
            }else{
                echo "N";
            }
        }else{
            echo "非法请求！";
        }
    }

    public function actionComment($aid){
        $data = Reply::getComment($aid);
        $this->renderPartial('comment',array('data'=>$data));
    }

    public function actionList(){
        $this->renderStatic('list');
    }

    public function actionZwl(){
        $this->renderStatic('zwl');
    }

}