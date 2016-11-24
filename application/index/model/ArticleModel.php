<?php
namespace app\index\model;

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
}