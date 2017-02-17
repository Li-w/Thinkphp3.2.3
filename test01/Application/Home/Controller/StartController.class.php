<?php

namespace Home\Controller;

use Think\Controller;

Class StartController extends Controller {

    /**
     * 4、连贯操作
     * @连贯操作的方法调用顺序没有先后
     * @除了select方法必须放到最后一个外
     */
    public function start4() {
        $User = M('User');
        $User->where('status=1')->order('create_time')->limit(10)->select();

        $User->where('id=1')->field('id,name,email')->find();
        $User->where('status=1 and id=1')->delete();

        //data
        $Model->data($data)->add();
        $Model->data($data)->where('id=3')->save();

        //page
        //表示每页显示25条记录的情况下面，获取第5页的数据。
        $this->page(5, 25)->select();
    }

    /**
     * 5、变量
     * @不建议直接使用传统方式获取
     * @因为没有统一的安全处理机制
     * @更好的方式是在框架中统一使用I函数进行变量获取和过滤
     * 用法格式
     * @ I('变量类型.变量名/修饰符',['默认值'],['过滤方法'],['额外数据源'])
     */
    public function start5() {

        //直接获取变量，不建议
        $id = $_GET['id']; // 获取get变量
        $name = $_POST['name'];  // 获取post变量
        $value = $_SESSION['var']; // 获取session变量
        $name = $_COOKIE['name']; // 获取cookie变量
        $file = $_SERVER['PHP_SELF']; // 获取server变量
        
        
        //I方法
        //@变量类型不区分大小写。 
        //@变量名则严格区分大小写
        echo I('get.id', 0); // 相当于 $_GET['id'],如果不存在$_GET['id'] 则返回0
        echo I('get.name'); // 相当于 $_GET['name']
        
        // 获取整个$_GET 数组
        I('get.');

        //path
        //当前访问URL地址是http://serverName/index.php/New/2013/06/01
        echo I('path.1'); // 输出2013
        echo I('path.2'); // 输出06
        echo I('path.3'); // 输出01
        
        
        //过滤
        // 采用正则表达式进行变量过滤
        I('get.name', '', '/^[A-Za-z]+$/');
        I('get.id', 0, '/^\d+$/');

        //变量修饰符
        I('get.id/d');
        I('post.name/s');
        I('post.ids/a');
//        s 强制转换为字符串类型
//        d 强制转换为整形类型
//        b 强制转换为布尔类型
//        a 强制转换为数组类型
//        f 强制转换为浮点类型
    }
    
    /**
     * 9、循环和控制输出
     * @循环输出主要使用volist和foreach。
     */
    public function start9(){
        
        //1、循环输出volist和foreach
        $User = M('User');
        $list = $User->limit(10)->select();
        $this->assign('list', $list);
        
        //模板输出,为空的时候输出提示       
//        <volist name="list" id="vo" empty="暂时没有数据">
//        {$vo.id}:{$vo.name}<br/>
//        </volist>
       
        //输出其中的第5～15条记录
//        <volist name="list" id="vo" offset="5" length='10'>
//        {$vo.name}
//        </volist>
        
        //输出偶数记录
        //Mod属性还用于控制一定记录的换行
//        <volist name="list" id="vo" mod="2" >
//        {$vo.name}
//        <eq name="mod" value="4"><br/></eq>
//        </volist>
        
        
        //2、条件输出
        //switch
//        <switch name="User.level" >
//        <case value = "1" break = "0">输出内容1</case>
//        <case value = "2">输出内容2</case>
//        <default />默认情况
//        </switch>
        
        //是gif、png或者jpg的话，就判断为图像格式
//        <switch name = "Think.get.type">
//        <case value = "gif|png|jpg">图像格式</case>
//        <default />其他格式
//        </switch>
        
        
        //3、比较标签
        //name变量的值等于value就输出
//        <eq name="vo.size" value="5">{$vo.name}</eq>
        
        
        //4、范围判断标签
        //判断模板变量是否在某个范围内
//        <in name="id" value="1,2,3">id在范围内<else/>id不在范围内</in>
//        <between name="id" value="1,10">输出内容1</between>
        
        //5、赋值判断标签present,empty
        //判断某个变量是否已经定义
//        <present name="name">name已经赋值<else /> name还没有赋值</present> 
        //判断某个变量是否为空        
//        <empty name="Think.get.name">$_GET['name']为空值</empty>
        //判断某个常量是否有定义
//        <defined name="NAME">NAME常量已经定义<else /> NAME常量未定义</defined> 
        
        
        //6、原生代码
        //第一种：使用php标签       <php>echo 'Hello,world!';</php>
        //第二种：使用原生php代码   <?php echo 'Hello,world!'; ? >  
    }
    
    /**
     * 12、空操作和空控制器
     */
    public function _empty($name){
        $this->city($name);
    }
    
    protected function city($name){
        echo '当前城市:'.$name;
    }
    
    /**
     * 13、初始化、前置和后置操作
     */
    //初始化方法
    public function _initialize(){
        echo 'initialize<br/>';
    }
    //前置方法
    public function _before_one(){
        echo 'before<br/>';
    }
    public function one(){
        echo 'one<br/>';
    }
    //后置方法
    public function _after_one(){
        echo 'after<br/>';
    }
    
    
    /**
     * 19、自动验证
     */
    public function start19(){
        //1、静态验证Model中
        $Start = D("Start");
        if(!$Start->create()){
            exit($Start->getError());
        }else{
            $Start->add();
        }
        
        //验证规则的定义格式: array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间])
        //@验证规则：require 字段必须、email 邮箱、url URL地址、currency 货币、number 数字
        //@验证条件：0 存在字段就验证（默认），1 必须验证，2 值不为空的时候验证
        //@附加规则：unique验证是否唯一
        //@验证时间：1新增数据时候验证,2编辑数据时候验证,3全部情况下验证（默认）
        
        //2、动态验证
        $rules = array(
            array('name', 'require', '用户名必须！'), // 用户名必须
            array('name', '', '帐号名称已经存在！', 1, 'unique', 1), // 验证用户名是否已经存在
            array('email', 'email', 'Email格式错误！', 2), // 如果输入则验证Email格式是否正确
            array('password', '6,30', '密码长度不正确', 0, 'length'), // 验证密码是否在指定长度范围
            array('repassword', 'password', '确认密码不一致', 0, 'confirm'), // 验证确认密码是否和密码一致  
        );

        if (!$Start->validate($rules)->create()) {
            // 如果创建失败 表示验证没有通过 输出错误提示信息
            exit($Start->getError());
        } else {
            // 验证通过 可以进行其他数据操作
            $Start->add();
        }
    }
    
    /**
     * 20、自动完成
     */
    public function start20(){
        //1、静态方式，在模型类里面通过$_auto属性
        $User = D("User"); // 实例化User对象
        if (!$User->create()) { // 创建数据对象
            // 如果创建失败 表示验证没有通过 输出错误提示信息
            exit($User->getError());
        } else {
            // 验证通过 写入新增数据
            $User->add();
        }
        
        //规则:array(array(完成字段1, 完成规则, [完成条件, 附加规则]),);
        //@完成时间：1新增数据时候处理,2更新数据时候处理,3全部情况下处理（默认）
        //@附加规则：
        
        //2、动态方式，使用模型类的auto方法
        $rules = array ( 
            array('status', '1'), // 新增的时候把status字段设置为1
            array('password', 'md5', 3, 'function'), // 对password字段在新增和编辑的时候使md5函数处理
            array('update_time', 'time', 2, 'function'), // 对update_time字段在更新的时候写入当前时间戳
        );
        $User = M('User');
        $User->auto($rules)->create();
        $User->add();
        
        //修改数据对象
        $User = D("User"); // 实例化User对象
        $User->create(); // 生成数据对象
        $User->status = 2; // 修改数据对象的status属性
        $User->register_time = NOW_TIME; // 增加register_time属性
        $User->add(); // 新增用户数据
    }

}

?>
