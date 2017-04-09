$(function(){
    $("#management").show();
    $("#video").hide();
    $("#container").hide();
    $("#accordion2").hide();
    $("#cube2").hide();
    $("#comments").hide();
    $("#file-img").hide();
    $("body").css("background","#fff");
    $("#item-management").on("click",function(){
        $("#management").show();
        $("#video").hide();
        $("#container").hide();
        $("#accordion2").hide();
        $("#cube2").hide();
        $("#comments").hide();
        $("#file-img").hide();
        $("body").css({
            'background':"#fff",
            'perspective':'',
            'perspective-origin':''
        });
    });
    $("#video-show").on('click',function(){
        $("#management").hide();
        $("#container").hide();
        $("#accordion2").hide();
        $("#cube2").hide();
        $("#comments").hide();
        $("#file-img").hide();
        $("#video").show();
        $("body").css("background","#fff");
    });
    $("#3d-trans-img").on('click',function(){
        $("#management").hide();
        $("#video").hide();
        $("#accordion2").hide();
        $("#cube2").hide();
        $("#comments").hide();
        $("#file-img").hide();
        $("#container").show();
        $("body").css({
            'background':"#fff",
            'perspective':'1000px',
            'perspective-origin':'50% 10%'
        });
    });
    $("#accordion").on('click',function(){
        $("#management").hide();
        $("#video").hide();
        $("#container").hide();
        $("#cube2").hide();
        $("#comments").hide();
        $("#file-img").hide();
        $("#accordion2").show();
        $("body").css("background","#fff");
    });
    $("#cube").on('click',function(){
        $("#management").hide();
        $("#video").hide();
        $("#container").hide();
        $("#accordion2").hide();
        $("#comments").hide();
        $("#file-img").hide();
        $("#cube2").show();
        $("body").css({
            'background':"#000",
            'perspective':'1000px',
            'perspective-origin':'50% 10%'
        });
    });
    $("#comment").on("click",function(){
        $("#management").hide();
        $("#video").hide();
        $("#container").hide();
        $("#accordion2").hide();
        $("#cube2").hide();
        $("#file-img").hide();
        $("#comments").show();
        $("body").css("background","#fff");
    });
    $("#file-image").on('click',function(){
        $("#management").hide();
        $("#video").hide();
        $("#container").hide();
        $("#accordion2").hide();
        $("#cube2").hide();
        $("#comments").hide();
        $("#file-img").show();
        $("body").css("background","#fff");
    });



    var title=$("#login-modal input[name=title]");
    var describe=$("#login-modal input[name=describe]");
    var job=$("#login-modal textarea[name=job]");

    $("#logined-form").on("submit",function(){
        if(title.val()&&describe.val()&&job.val()){
            return true;
        }else{
            return false;
        }
    });
    $(".del-item").on("click",function(){
        if (confirm("是否删除该项目")){

        }else{
            return false;
        }
    });

    var oContainer=document.getElementById("container");
    var count=0;
    for(var i=0;i<9;i++){
        var oImg=new Image();
        oImg.onload=function(){
            count++;
            if(count==9){
                loadSuccess();
            }
        };
        oImg.src="assets/img/"+(i+1)+".jpg";
        oContainer.appendChild(oImg);
    }
    function loadSuccess(){
        var aImg=oContainer.getElementsByTagName('img');
        for(var i=0;i<aImg.length;i++){
            aImg[i].style.transitionDelay=i*50+'ms';
            aImg[i].style.transform='rotateY('+40*(i+1)+'deg)'+'translateZ(200px)';

        }
    }
    var num=1;
    oContainer.onclick=function(){
        this.style.transform="rotateY("+-40*num+"deg)";
        num++;
    };
    var tt=document.getElementById("file-img");
    var aImg=tt.getElementsByTagName("img");
    for(var j=0;j<aImg.length;j++){
        aImg[j].addEventListener("mouseover",function(){
            this.className="animated zoomOut";
        },true);
        aImg[j].addEventListener("webkitAnimationEnd",function(){
            this.className="animated zoomIn";
        },true);
    }





});