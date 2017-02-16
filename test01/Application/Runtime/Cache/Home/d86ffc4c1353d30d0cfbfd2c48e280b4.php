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
        <table>
            <tr>
                <td>id:</td>
                <td><?php echo ($data["id"]); ?></td>
            </tr>
            <tr>
                <td>标题：</td>
                <td><?php echo ($data["title"]); ?></td>
            </tr>
            <tr>
                <td>内容：</td>
                <td><?php echo ($data["content"]); ?></td>
            </tr>
            <tr>
                <td>获取某个字段title：</td>
                <td><?php echo ($title); ?></td>
            </tr>
        </table>
    </body>
</html>