<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        *{
            margin:0;
            padding:0;
        }
        html{
            width: 100%;
            height: 100%;
        }
        body{
            width: 100%;
            height: 100%;
            background:url(assets/img4/bg.jpg);
        }
        #container .img{
            width: 125px;
            height: 125px;
            border:5px solid #fff;
            box-shadow:2px 2px 2px rgba(0,0,0,0.6);
            position: absolute;
            left:-500px;
            top:-500px;
            transition:all 1s ease-out;
        }
        #container span{
            width: 100%;
            height: 100%;
            opacity:0;
            display: block;
            background-repeat: no-repeat;
            transition:all 1s ease-out;
        }
        #prev,#next{
            width: 60px;
            height: 60px;
            background-color:#fff;
            background-repeat: no-repeat;
            background-position: center;
            border-radius: 10%;
            position: absolute;
            top:50%;
            margin-top:-30px;
            display: none;
            cursor: pointer;
        }
        #prev{
            background-image: url('assets/img4/prev.png');
            left:-10px;
        }
        #next{
            background-image: url('assets/img4/next.png');
            right:-10px;
        }
    </style>
</head>
<body>
<div id="container"></div>
<a href="admin/back_administrator" class="btn btn-default btn-md " role="button" id="back">返回</a>
<span id="prev"></span>
<span id="next"></span>
<script>
    (function(){
        var COL= 6,
            ROW= 4,
            NUM=COL*ROW,
            count= 0,
            ThumbsWidth=125,
            ThumbsHeight=125,
            BigImageWidth = 750,
            BigImageHeight = 500;

        //图片预加载
        for(var i=0;i<NUM;i++){
            var ThumbsImage=new Image();
            ThumbsImage.onload=function(){
                count++;
                if(count==NUM*2){
                    loadSuccess();
                }
            };
            ThumbsImage.src='assets/img4/thumbs/'+(i+1)+'.jpg';
            var BigImage=new Image();
            BigImage.onload=function(){
                count++;
                if(count==NUM*2){
                    loadSuccess();
                }
            };
            BigImage.src='assets/img4/'+(i+1)+'.jpg';
        }
        //图片加载完成后执行的函数
        var oContainer=document.getElementById('container');
        var index=0;
        function loadSuccess(){
            for(var i=0;i<ROW;i++){
                for(var j=0;j<COL;j++){
                    index++;
                    //console.log(index);
                    var oDiv=document.createElement('div');
                    oDiv.style.backgroundImage='url(assets/img4/thumbs/'+index+'.jpg)';
                    oDiv.className='img';
                    oDiv.pos={
                        row:i,
                        col:j
                    };
                    oDiv.innerHTML='<span></span>';
                    oDiv.index=index;
                    oContainer.appendChild(oDiv);
                }
            }


            //计算行间距和列间距
            var aDiv=oContainer.getElementsByTagName('div');
            var BodyWidth=document.body.clientWidth;
            var BodyHeight=document.body.clientHeight;
            var oDivWidth=aDiv[0].offsetWidth;
            var oDivHeight=aDiv[0].offsetHeight;
            var iColGap=(BodyWidth-COL*oDivWidth)/(COL+1);
            var iRowGap=(BodyHeight-ROW*oDivHeight)/(ROW+1);
            var iNow=0;

            //使图片飞入相应的位置
            var timerCount=NUM;
            var timer=setInterval(function(){
                timerCount--;
                aDiv[timerCount].style.left=(oDivWidth+iColGap)*aDiv[timerCount].pos.col+iColGap+'px';
                aDiv[timerCount].style.top=(oDivHeight+iRowGap)*aDiv[timerCount].pos.row+iRowGap+'px';
                aDiv[timerCount].style.transform='rotate('+ (Math.random()*40-20)+'deg)';
                if(timerCount==0){
                    clearInterval(timer);
                }
            },100);
            //给每个div设置点击事件
            var flag=false;
            var oPrev=document.getElementById('prev');
            var oNext=document.getElementById('next');
            oContainer.onclick=function(e){
                var target= e.target||window.event.srcElement;
                if(target.className!='img'){
                    target=target.parentNode;
                }
                if(flag==false){//要合上
                    clearInterval(timer);
                    for(var i=0;i<NUM;i++){
                        aDiv[i].style.border='1px solid #fff';
                        aDiv[i].style.left=(BodyWidth-BigImageWidth)/2+aDiv[i].pos.col*(oDivWidth-8)+'px';
                        aDiv[i].style.top=(BodyHeight-BigImageHeight)/2+aDiv[i].pos.row*(oDivHeight-8)+'px';
                        aDiv[i].style.transform='rotate(0deg)';
                        var oSpan=aDiv[i].getElementsByTagName('span')[0];
                        oSpan.style.backgroundImage='url(assets/img4/'+target.index+'.jpg)';
                        var x=-aDiv[i].pos.col*ThumbsWidth;
                        var y=-aDiv[i].pos.row*ThumbsHeight;
                        oSpan.style.backgroundPosition=x+'px '+y+'px';
                        oSpan.style.opacity=1;
                        oPrev.style.display=oNext.style.display='block';
                        iNow=target.index;
                    }


                }else{//要散开
                    for(var i=0;i<NUM;i++){
                        aDiv[i].style.border='5px';
                        aDiv[i].style.left=(oDivWidth+iColGap)*aDiv[i].pos.col+iColGap+'px';
                        aDiv[i].style.top=(oDivHeight+iRowGap)*aDiv[i].pos.row+iRowGap+'px';
                        aDiv[i].style.transform='rotate('+ (Math.random()*40-20)+'deg)';
                        aDiv[i].style.backgroundImage='url(assets/img4/thumbs/'+aDiv[i].index+'.jpg)';
                        var oSpan=aDiv[i].getElementsByTagName('span')[0];
                        oSpan.style.opacity=0;
                        oPrev.style.display=oNext.style.display='none';
                    }
                }
                flag=!flag;
            };
            //给左右按钮设置点击事件

            oPrev.onclick=oNext.onclick=function(){
                if(this==oPrev){
                    iNow--;
                    if(iNow==0){
                        iNow=NUM;
                    }
                }else{
                    iNow++;
                    if(iNow==NUM+1){
                        iNow=1;
                    }
                }

                var arr=[];
                for(i=0;i<NUM;i++){
                    arr.push(i);
                }
                arr.sort(function(){
                    return Math.random()-0.5;
                });
                var timer2=setInterval(function(){
                    var item=arr.pop();
                    var oSpan=aDiv[item].getElementsByTagName('span')[0];
                    oSpan.style.backgroundImage='url(assets/img4/'+iNow+'.jpg)';
                    if(arr.length==0){
                        clearInterval(timer2);
                    }
                },30);
                
            };
        }
    })();
</script>
</body>
</html>