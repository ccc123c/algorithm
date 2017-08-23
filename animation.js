function animate(element,target,step,fn) {
    if (element.timer) {
        clearInterval(element.timer);
    }

    element.timer = setInterval(function () {
        var leader = element.offsetLeft;
        if(target < leader){
            step = -Math.abs(step);
        }
        if (Math.abs(leader - target) > Math.abs(step)) {
            leader += step;
            element.style.left = leader + "px";
        } else {
            clearInterval(element.timer);
            element.style.left = target + "px";
            fn && fn();
            // console.log("我是定时器里动画执行完成以后的代码");
        }
    }, 50);
}/**
 * Created by j on 2017/8/23.
 */
