<?php if (!defined('THINK_PATH')) exit();?><!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>连贯操作</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div>
            <h1>连贯操作</h1>
            <div>查询一个User表的满足状态为1的前10条记录，并希望按照用户的创建时间排序 ，代码如下：
                <p>$User->where('status=1')->order('create_time')->limit(10)->select();</p>
                <p>这里的where、order和limit方法就称之为连贯操作方法，除了select方法必须放到最后一个外</p>
                <p>连贯操作的方法调用顺序没有先后</p>
            </div>
        </div>
    </body>
</html>