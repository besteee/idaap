<?php
namespace Certificate\Controller;
use Common\Controller\HomeBaseController;
class IndexController extends HomeBaseController{
	function index(){
		$this->display(":index");
	}
	function check(){
		$name=$_POST['user_name'];
		$bookNo=$_POST['user_id'];
		$paperNo=$_POST['user_icNum'];
		$result=M('ecms_homemb');
		$resultOld=M('ecms_news');
		$condition['name']=$name;
		$condition['bookNo']=$bookNo;
		$condition['paperNo']=$paperNo;
		$conditionOld['title']=array('like',$name.'%'.$paperNo);
		$this->data=$result->where($condition)->select();
		$this->dataOld=$resultOld->where($conditionOld)->select();
		$newstext=str_replace('\\','',$this->dataOld[0]['newstext']);
		$this->assign('newstext',$newstext);
		$this->display(":check");
	}
	function navCheck(){
		$this->display(":navCheck");
	}	
	function userDiy(){
		$this->display("user:userDiy");
	}
}
