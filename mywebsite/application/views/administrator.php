<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?php echo site_url();?>">
    <link rel="shortcut icon" href="assets/fonts/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/administrator.css">
    <title>Administrator</title>
</head>
<body>

<div id="nav">
    <ul class="nav-bar">
        <li>管理菜单</li>
        <li class="item"><a href="javascript:;" id="item-management">项目经验管理</a></li>
        <li class="item"><a href="javascript:;" id="file-image" >图片上传</a></li>
        <li class="item"><a href="javascript:;" id="video-show">周杰伦高清MV欣赏</a></li>
        <li class="item">
            <div class="btn-group" id="has-sub">
                <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    进入3D世界 <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="javascript:;" id="3d-trans-img">3D旋转木马</a></li>
                    <li><a href="javascript:;" id="accordion">手风琴</a></li>
                    <li><a href="javascript:;" id="cube">会跳舞的立方体</a></li>
                </ul>
            </div>
        </li>
        <li class="item"><a href="admin/photo_wall">旋转的照片墙</a></li>
        <li class="item"><a href="javascript:;" id="comment">我的留言</a></li>
    </ul>
</div>
<div id="management">
        <a href="" data-toggle="modal" data-target="#login-modal" class="btn btn-success" id="add-items">添加项目</a>
        <a href="welcome/logout" class="btn btn-default btn-md " role="button" id="logout">退出</a>
        <?php
        foreach($list as $experiences){
            ?>
    <form action="admin/update_items?exp_id=<?php echo $experiences->exp_id;?>" method="post">
    <p>
            &nbsp;&nbsp;&nbsp;项目名称：<input type="text" name="title" value="<?php echo $experiences->title;?>"><br><br>
            &nbsp;&nbsp;&nbsp;项目简述：<input type="text" name="describe" value="<?php echo $experiences->describe?>">
                    <br><br>
            &nbsp;&nbsp;&nbsp;项目职责：<textarea name="job" id="" cols="80" rows="4"><?php echo $experiences->job?></textarea>
                <a href="admin/delete_items?exp_id=<?php echo $experiences->exp_id;?>"  class="btn btn-danger del-item">删除</a>
                <button type="submit" class="btn btn-primary">修改</button>
                <br>
            <hr>
            </p>
    </form>
        <?php  }?>
    <div id="page">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li><?php echo $page;?></li>
            </ul>
        </nav>
    </div>



</div>
<div id="file-img">
    <form action="admin/file_upload" method="post" enctype="multipart/form-data" >
        <input type="file" name="some_img">
        <button type="submit" class="btn btn-primary">上传</button>
    </form>
    <div>
        <?php foreach($img_src as $src){?>
        <img src="<?php echo $src->src;?>" alt="">
        <?php  }?>
    </div>
</div>
<div id="video">
    <div>
        <h2>一路向北</h2>
        <video src="assets/MV/一路向北.mp4" controls="controls"></video>
    </div>
</div>
<div id="trans">
    <div id="container"></div>
    <div id="accordion2">
        <ul id="accordion3">
            <li><a href="javascript:;">描述1</a><img src="assets/img2/1.jpg" alt=""/></li>
            <li><a href="javascript:;">描述2</a><img src="assets/img2/2.jpg" alt=""/></li>
            <li><a href="javascript:;">描述3</a><img src="assets/img2/3.jpg" alt=""/></li>
            <li><a href="javascript:;">描述4</a><img src="assets/img2/4.jpg" alt=""/></li>
            <li><a href="javascript:;">描述5</a><img src="assets/img2/5.jpg" alt=""/></li>
        </ul>
    </div>
    <div id="cube2">
        <div id="cubes">
            <div class="cube one">1</div>
            <div class="cube two">2</div>
            <div class="cube three">3</div>
            <div class="cube four">4</div>
            <div class="cube five">5</div>
            <div class="cube six">6</div>
            <div id="cubes2">
                <div class="cube2 a"></div>
                <div class="cube2 b"></div>
                <div class="cube2 c"></div>
                <div class="cube2 d"></div>
                <div class="cube2 e"></div>
                <div class="cube2 f"></div>
            </div>
        </div>
    </div>
</div>
<div id="comments">
    <ul>
        <?php foreach ($comment as $comments){?>
        <li>
            <span>姓名：<?php echo $comments->pname;?></span>
            <span>email:<?php echo $comments->pemail;?></span>
            <span>qq:<?php echo $comments->pqq;?></span>
            <span>phone:<?php echo $comments->pphone;?></span>
            <a href="comment/del_comment?pid=<?php echo $comments->pid;?>" class="btn btn-danger del-item">删除</a>
            <span id="comment-time">时间:<?php echo $comments->post_date;?></span>
            <div>content:<?php echo $comments->pcontent;?></div>
        </li>
        <?php }?>
    </ul>
</div>
<div id="leaf-down">

</div>

<div class="modal fade"  tabindex="-1" id="login-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/save_items" method="post" id="logined-form">
                    项目名称：<input type="text" name="title"><br><br>
                    项目简述：<input type="text" name="describe"><br><br>
                    项目职责：<textarea name="job" id="" cols="50" rows="4" ></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" >添加</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/jquery-2.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/administrator.js"></script>
<script src="assets/js/require.js" data-main="assets/js/leaf-down"></script>
</body>
</html>