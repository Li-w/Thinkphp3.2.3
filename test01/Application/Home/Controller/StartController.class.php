<?php

namespace Home\Controller;

use Think\Controller;

Class StartController extends Controller {

    /**
     * 连贯操作
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
     * 变量
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
     * 循环和控制输出
     */
    public function start9(){
        
    }

}

?>
