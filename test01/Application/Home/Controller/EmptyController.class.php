<?php
namespace Home\Controller;
use Think\Controller;
Class EmptyController extends Controller{
    public function index(){
        $cityName = CONTROLLER_NAME;
        $this->city($cityName);
    }
    
    protected function city($name){
        echo "当前城市".$name;
    }
}
?>
