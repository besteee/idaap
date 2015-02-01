<?php
namespace Certificate\Controller;
use Common\Controller\AdminbaseController;
class IndexadminController extends AdminbaseController{
	protected $homemb;
	public function _initialize(){
		parent::_initialize();
		$this->homemb=M("ecms_homemb");
	}
	function index(){
		$total=$this->homemb->count();
		$page=ceil($total/10);
		if(isset($_GET['pageNow'])){
			$pageNow=$_GET['pageNow'];
		}else{
			$pageNow=1;
		}
		$this->data=$this->homemb->page($pageNow,10)->order('id desc')->select();
		$pageShow=' <a class="btn btn-primary" href="'.U('index?pageNow=1').'">首页</a>';
		for($i=1;$i<=$page;$i++){
			$pageShow.=' <a class="btn btn-primary" href="'.U('index?pageNow=').$i.'">'.$i.'</a>';
		}
		$pageShow.=' <a class="btn btn-primary" href="'.U('index?pageNow=').$page.'">尾页</a>';
		$this->assign('page',$pageShow);
		$this->display(":index");
	}
	function add(){
		$this->display(":add");
	}
	function addPost(){
		eval('$arr = '.$_POST['input']);
		echo $this->homemb->add($arr);
	}
	function alter(){
		$this->data=$this->homemb->where('id='.$_GET['id'])->select();
		$this->display(":alter");
	}
	function alterPost(){
		eval('$arr = '.$_POST['input']);
		echo $this->homemb->save($arr);
	}
	function cdelete(){
		$this->homemb->where('id='.$_GET['id'])->delete();
		$this->index();
	}
}
