<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController; 
/**
 * 首页
 */
class IndexController extends HomeBaseController {
	
    //首页
	public function index() {
		$mbResult=M('ecms_homemb');
		$this->newsMb=$mbResult->order('id desc')->limit('8')->select();
		$this->display(":index");
	
	}   

}

?>
