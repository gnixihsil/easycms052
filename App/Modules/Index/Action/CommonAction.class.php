<?php
/**
* 前台公共类
* @author  <[c@easycms.cc]>
*/
class CommonAction extends Action
{
	Public function _initialize(){
		//全局首页，用户个人中心导航分类展示
		$cats=M('Category')->where('isverify=1 and isshow=1')->limit('5')->select();
		$this->assign('cats',$cats);

	}
	
	//空操作
	public function _empty(){
		$this->redirect(__ROOT__);
	}
}
