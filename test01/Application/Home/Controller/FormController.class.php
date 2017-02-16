<?php
namespace Home\Controller;
use Think\Controller;
Class FormController extends Controller{
    
/**
 * 写入数据
 */
    public function insert(){
        $Form = D('Form');
        
//    添加数据1，有预处理        
//            if($Form->create()){
//                $result = $Form->add();
//                if($result){
//                    $this->success('数据添加成功！');
//                }else{
//                    $this->error('数据添加错误！');
//                }
//            }else{
//                $this->error($Form->getError());
//            }
     
 
//    充分信任数据，可直接添加        
//            $data['title'] = 'ThinkPHP';
//            $data['content'] = '表达内容';
//            $Form->add($data);   
//      
//     支持对象方式操作
//      
//            $Form->title = 'Thinkphp';
//            $Form->content = '表达内容';
//            $Form->add();
     
    }

/*
 * 读取数据
 * D函数需要有对应的模型类，这里用M方法
 * @param int $id id值
 */
    public function read($id=0){
        $Form = M('Form');
        //读取数据
        $data = $Form->find($id);
        if($data){
            $this->assign('data',$data);
        }else{
            $this->error('数据错误');
        }
        //获取某个字段
        $title = $Form->where('id=2')->getField('title');
        $this->assign('title',$title);
        
        $this->display();
    }
    
/**
 * 更新数据
 * save方法的返回值是影响的记录数
 */
    public function edit($id=0){
        $Form = M('Form');
        $this->assign('vo',$Form->find($id));
        $this->display();
    }
    public function update(){
        $Form = D('Form');
        if($Form->create()){
            $result = $Form->save();
            if($result){
                $this->success('操作成功！');
            }else{
                $this->error('写入错误！');
            }
        }else{
            $this->error($Form->getError());
        }
        //更改某字段
        $Form->where('id=5')->setfield('title','ThinkPHP');
        
        //统计字段,setInc,setDec
        $User = M("User"); // 实例化User对象
        $User->where('id=5')->setInc('score',3); // 用户的积分加3
        $User->where('id=5')->setInc('score'); // 用户的积分加1
        $User->where('id=5')->setDec('score',5); // 用户的积分减5
        $User->where('id=5')->setDec('score'); // 用户的积分减1
    }
    
    /**
     * 删除数据
     * delete方法的返回值是删除的记录数
     */
    public function delete(){
        $Form = M('Form');
        $Form->delete(5);       //表示删除主键为5的数据
        
        $User = M("User"); // 实例化User对象
        $User->where('id=5')->delete(); // 删除id为5的用户数据
        $User->delete('1,2,5'); // 删除主键为1,2和5的用户数据
        $User->where('status=0')->delete(); // 删除所有状态为0的用户数据
    }
        
}

?>
