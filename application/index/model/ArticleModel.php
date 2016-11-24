<?php
namespace app\index\model;

use think\Model;

class ArticleModel extends Model
{
	protected $table = 'snake_article';
	//查看所有文章
	public function getAllArticle()
	    {
	        $result = db('article')->field('id,title,author,content')->select();
	        return $result;
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