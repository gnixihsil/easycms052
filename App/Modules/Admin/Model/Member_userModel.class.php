<?php
/**
 * 自定义会员模型类
 * @author  <[c@easycms.cc]>
 */
class Member_userModel extends Model{
	
	//自动验证（参考手册中6.15自动验证）
	protected $_validate = array(
		 array('username','/^[a-z0-9]{2,10}$/i','账号信息必须大于2位到10位字符之间！'), //默认情况下用正则进行验证
		 array('username','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		 array('password','require','密码必须填写！'), //默认情况下用正则进行验证
		 array('email','email','邮箱格式错误',2),//不为空时验证
		 
		 
	//	 array('reuserpass','userpass','密码与确认密码不一致',0,'confirm'), // 验证确认密码是否和密码一致

	);
	
	
	//自动填充（参考手册中6.17自动完成）
	protected $_auto = array( 
		//array('sex','w'),  //指定某个字段设置某个值
		array("regtime","time","1","function"), //当执行添加时为addtime字段指定time时间
		array('regip',"get_client_ip","1","function"),
		array('password',"mypass","3","callback"), //通过回调本类中的自定义方法对密码做处理
		
	);
	
	protected function mypass(){
		return md5($_POST['password']);
	}
	
	
	//字段映射
	protected $_map = array(
        //'name' =>'username', // 把表单中name映射到数据表的username字段
        //'mail'  =>'email', // 把表单中的mail映射到数据表的email字段
    );

}
