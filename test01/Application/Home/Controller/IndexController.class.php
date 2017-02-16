<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $Data = M('Data');
        $result = $Data->find(1);
        $this->assign('result',$result);
        $this->display();
    }
 
    public function hello($name = 'thinkphp'){
        $this->assign('name',$name);
        $this->display();
    }
    
    protected function hello2($name = 'thinkphp'){
        echo 'hello,'.$name;
    }
    
    private function hello3($name = 'thinkphp'){
        echo 'hello,'.$name;
    }
}