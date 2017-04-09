define(function(require,exports,module){
    function Leaf(options){
        this.width=options.width;
        this.left=options.left;

        this.oImg=new Image();
        this.oImg.src='assets/img5/'+ parseInt(Math.random()*4+1)+'.png';
        this.oImg.style.width=this.width+'px';
        this.oImg.style.left=this.left+'px';
        options.container.appendChild(this.oImg);
    }
    Leaf.prototype.fall=function(){
        var that=this;
        var timer=setInterval(function(){
            that.oImg.style.top=that.oImg.offsetTop+5+'px';
            if(that.oImg.offsetTop>=document.documentElement.clientHeight){
                clearInterval(timer);
                that.oImg.style.display="none";
            }
        },Math.random()*200);

    }

    module.exports=Leaf;
});