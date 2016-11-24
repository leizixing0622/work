<?php
namespace app\admin\controller;

use app\admin\model\Node;
use app\index\model\ArticleModel;

class Article extends Base
{
	public function index(){
		 	 /*$article = new ArticleModel();

       		 $this->assign([
        
           		 'article' => $article->getAllArticle(),
       
      		  ]);*/
      		if(request()->isAjax()){

            $param = input('param.');

            $limit = $param['pageSize'];
            $offset = ($param['pageNumber'] - 1) * $limit;

            $where = [];
            if (isset($param['searchText']) && !empty($param['searchText'])) {
                $where['title'] = ['like', '%' . $param['searchText'] . '%'];
            }
            $article = new ArticleModel();
            $selectResult = $article->getArticleByWhere($where, $offset, $limit);

            foreach($selectResult as $key=>$vo){

                $operate = [
                    '编辑' => url('role/roleEdit', ['id' => $vo['id']]),
                    '删除' => "javascript:roleDel('".$vo['id']."')",
                    '分配权限' => "javascript:giveQx('".$vo['id']."')"
                ];
                $selectResult[$key]['operate'] = showOperate($operate);

            }

            $return['total'] = $article->getAllArticle($where);  //总数据
            $return['rows'] = $selectResult;

            return json($return);
        }

       
		return $this->fetch();		
	}
	//添加文章
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