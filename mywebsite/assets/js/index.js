$(function(){
	$("#login-modal .close").on("click",function(){
		$("#login-form input").val("");
		//$("#login-form span").hide();
	});
	
	$("#home-page .nav li a").on('click',function(){
		var href=$(this).attr("href");
		var Top=$(href).offset().top;
		$(document.body).animate({
			scrollTop:Top
		},1000);
		$("#home-page .nav li").removeClass("active");
		$(this).parent().addClass('active');
		return false;
	});
	$("#go-top").on('click',function(){
		var href=$(this).attr("href");
		var Top=$(href).offset().top;
		$(document.body).animate({
			scrollTop:Top
		},1000);
		$("#home-page .nav li").removeClass("active");
		$(".shoupage").addClass('active');
		return false;
	});

	$("#name-fail").hide();
	$("#pass-fail").hide();

	var opts={
		bSubmit:true
	};
	$("#exampleInputUsername").on("blur",function(){
		//四个参数:url,data,callback,dataType
		$.get("welcome/check_name",{
			name:this.value
		},function(data){
			if(data=="fail"){
				$("#name-fail").show();
				opts.bSubmit=false;
			}else{
				$("#name-fail").hide();
				opts.bSubmit=true;
			}
		},'text');
	});
	$("#exampleInputPassword1").on("keyup",function(){
		if(this.value.length<6){
			$("#pass-fail").show();
			opts.bSubmit=false;
		}else{
			$("#pass-fail").hide();
			opts.bSubmit=true;
		}
	});
	$("#login-form").on("submit",function(){
		return opts.bSubmit;
	});
	document.getElementById("zt").addEventListener("mouseover",function(){
		this.className="animated hinge";
	},false);
    document.getElementById("zt").addEventListener("webkitAnimationEnd",function(){
        this.className="";
    },false);









	
});