require(["./leaf"],function(Leaf){
    var oContainer=document.getElementById('leaf-down');
    var winWidth=document.documentElement.clientWidth;


    for(var i=0;i<4;i++){
        var iWidth=100+parseInt(Math.random()*51);
        var options={
            'width':iWidth,
            'left':parseInt(Math.random()*(winWidth-iWidth)),
            'container':oContainer
        };
        var leaf=new Leaf(options);
        /*var leaf=new Leaf({
         'width':iWidth,
         'left':parseInt(Math.random()*(winWidth-iWidth)),
         'container':oContainer
         });*/
        leaf.fall();
    }
});