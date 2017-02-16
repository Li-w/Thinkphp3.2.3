<?php if (!defined('THINK_PATH')) exit();?><!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div>
            <form method="post" action="/thinkphp/test01/index.php/Home/Form/insert">
                标题：<input type="text" name="title"/><br/>
                内容：<textarea name="content" rows="5" cols="45"></textarea><br/>
                <input type="submit" value="提交"/>
            </form>
        </div>
    </body>
</html>