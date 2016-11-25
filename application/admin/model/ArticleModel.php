<?php
namespace app\admin\model;

use think\Model;

class ArticleModel extends Model
{
	protected $table = 'snake_article';
	//查看所有文章数目
	 public function getAllArticle($where)
    {
        return $this->where($where)->count();
    }
	//查找指定文章
	public function getArticleByWhere($where, $offset, $limit)
    {

        return $this->where($where)->limit($offset, $limit)->order('id desc')->select();
    }
    //根据ID获取文章
    public function getOneArticle($id)
    {
        return $this->where('id', $id)->find();
    }
	//插入新文章
	public function insertArticle($param)
	    {
	        try{

	            $result =  $this->validate('ArticleValidate')->save($param);
	            if(false === $result){
	                // 验证失败 输出错误信息
	                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
	            }else{

	                return ['code' => 1, 'data' => '', 'msg' => '添加文章成功'];
	            }
	        }catch( PDOException $e){

	            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
	        }
	    }
	    //编辑文章
	    public function editArticle($param)
		    {
		        try{

		            $result =  $this->validate('ArticleValidate')->save($param, ['id' => $param['id']]);

		            if(false === $result){
		                // 验证失败 输出错误信息
		                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
		            }else{

		                return ['code' => 1, 'data' => '', 'msg' => '编辑文章成功'];
		            }
		        }catch( PDOException $e){
		            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
		        }
		    }
	 //删除文章
	   public function delArticle($id)
		    {
		        try{

		            $this->where('id', $id)->delete();
		            return ['code' => 1, 'data' => '', 'msg' => '删除文章成功'];

		        }catch( PDOException $e){
		            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
		        }
		    }
}