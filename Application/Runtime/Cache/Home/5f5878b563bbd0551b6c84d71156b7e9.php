<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/web-code-browser/Public/css/bootstrap.min.css"/>
    <title><?php echo ($title); ?></title>
</head>
<body>
<div class="container">

    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle"  data-toggle="dropdown" href="<?php echo U('Index/Index');?>">
                Root
            </a>
        </li>
    </ul>

    <ul class="list-group">

        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['is_file']): ?><a href="<?php echo U('Index/view',['dir'=>base64_encode($vo['dir'])]);?>">

                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-file"></span>
                        <?php echo ($vo["name"]); ?>
                    </li>
                </a>

                <?php else: endif; endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['is_file']): else: ?>

                <a href="<?php echo U('Index/Index',['dir'=>base64_encode($vo['dir'])]);?>">
                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <?php echo ($vo["name"]); ?>
                    </li>
                </a><?php endif; endforeach; endif; else: echo "" ;endif; ?>

    </ul>
</div>
</body>
</html>