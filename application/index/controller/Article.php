<?php
namespace app\index\controller;

use app\index\model\ArticleModel;

class Article extends Base
{
	public function index(){
		 $article = new ArticleModel();

       		 $this->assign([
        
           		 'article' => $article->getAllArticle(),
       
      		  ]);
		return $this->fetch();		
	}
	//添加用户
	public function articleAdd()
	    {
	        if(request()->isPost()){

	            $param = input('param.');
	            $param = parseParams($param['data']);

	            
	            $article = new ArticleModel();
	            $flag = $article->insertArticle($param);

	            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
	        }

	        return $this->fetch();
	    }
}