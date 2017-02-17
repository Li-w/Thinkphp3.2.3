<?php

namespace Home\Model;
use Think\Model;
class StartModel extends Model{
    
    //自动验证，静态验证
    //验证规则的定义格式: array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间])
    
    //@验证规则：require 字段必须、email 邮箱、url URL地址、currency 货币、number 数字
    //@验证条件：0 存在字段就验证（默认），1 必须验证，2 值不为空的时候验证
    //@附加规则：unique验证是否唯一
    //@验证时间：1新增数据时候验证,2编辑数据时候验证,3全部情况下验证（默认）
    protected $_validate = array(
        array('name','require' ,'用户名必须'),
        array('name','','帐号名称已经存在！',1,'unique',1), // 验证用户名是否已经存在
        array('email','email','Email格式错误！',2), // 如果输入则验证Email格式是否正确
        array('password','6,30','密码长度不正确',0,'length'), // 验证密码是否在指定长度范围
        array('repassword','password','确认密码不一致',0,'confirm'), // 验证确认密码是否和密码一致    
        
    );
    
    
    //自动完成，静态方式
    protected $_auto = array ( 
         array('status','1'),  // 新增的时候把status字段设置为1
         array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
         array('name','getName',3,'callback'), // 对name字段在新增和编辑的时候回调getName方法
         array('update_time','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳
     );
}
?>
