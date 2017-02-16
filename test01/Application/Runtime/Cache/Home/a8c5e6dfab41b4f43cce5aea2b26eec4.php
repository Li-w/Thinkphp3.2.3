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
            <form method="post" action="/thinkphp/test01/index.php/Home/Form/update">
                标题：<input type="text" name="title" value="<?php echo ($vo["title"]); ?>"/><br/>
                内容：<textarea name="content" rows="5" cols="45"><?php echo ($vo["content"]); ?></textarea><br/>
                <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
                <input type="submit" value="提交"/>
            </form>
        </div>
    </body>
</html>