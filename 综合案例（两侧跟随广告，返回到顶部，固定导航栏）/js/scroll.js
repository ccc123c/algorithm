/**
 * Created by j on 2017/8/20.
 */
function scroll() {//获取被卷曲的高和宽
    return{
        "top":window.pageYOffset||document.body.scrollTop||document.documentElement.scrollTop,
        "left":window.pageXOffset||document.body.scrollLeft||document.documentElement.scrollLeft
    }
}
function getStyle(obj,name) {//取非行间样式
    if(obj.currentStyle){
        return obj.currentStyle[name];
    }else{
        return getComputedStyle(obj,false)[name];
    }
}