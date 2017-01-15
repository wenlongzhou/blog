<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    //静态页面
    public function renderStatic($view,$data=null,$return=false)
    {
        $uri = $_SERVER['REQUEST_URI'];

        if(YII_DEBUG || (substr($uri,strrpos($uri,'.')) != '.html' && $uri!='/')){
            $this->render($view,$data,$return);
        }else{
            $uri = $uri=='/'?'/index.html':$uri;
            $path = substr($uri,0,strrpos($uri,'/'));
            $html = '/home/www/blog/html';
            if(!is_dir($html.$path)){
                mkdir($html.$path,0777);
            }
            $str = $this->render($view,$data,true);
            file_put_contents($html.$uri,$str.'<!-- This is static -->');
            echo $str;exit;
        }
    }
}