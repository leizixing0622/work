<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\ArticleModel;

class Index extends Base
{
    public function index()
    {
        return $this->fetch('/index');
    }
    public function article(){
    	$article = new ArticleModel();
		 $this->assign([

   		 	'article' => $article->getAllArticle(),

		  ]);
    	return $this->fetch('article');
    }
    public function indexPage(){
    	return $this->fetch('index');
    }
}
