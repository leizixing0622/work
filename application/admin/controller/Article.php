<?php
namespace app\admin\controller;

use app\admin\model\ArticleModel;

class Article extends Base
{
	public function index(){
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
                            '编辑' => url('article/articleEdit', ['id' => $vo['id']]),
                            '删除' => "javascript:articleDel('".$vo['id']."')",
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
                            //处理上传图片
                            
                            $param = input('param.');
                            $param = parseParams($param['data']);

                            $param['create_time']=date('Y-m-d H:i:s',time());
                            $article = new ArticleModel();
                            $flag = $article->insertArticle($param);

                            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $param]);
                        }

                        return $this->fetch();
	    }
        //编辑文章
                public function articleEdit()
                {
                    $article = new ArticleModel();

                    if(request()->isPost()){

                        $param = input('post.');
                        $param = parseParams($param['data']);
                        $param['update_time']=date('Y-m-d H:i:s',time());
                        $flag = $article->editArticle($param);

                        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
                    }

                        $id = input('param.id');
                        $this->assign([
                            'article' => $article->getOneArticle($id)
                        ]);
                        return $this->fetch();
                }
                //删除文章
                public function articleDel(){
                        $id = input('param.id');
                        $article = new ArticleModel();
                        $flag = $article->delArticle($id);
                        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
                }
}