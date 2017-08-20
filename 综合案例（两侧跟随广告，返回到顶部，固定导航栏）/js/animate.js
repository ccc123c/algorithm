/**
 * Created by j on 2017/8/20.
 */
function animate(ele, target) {
    if (ele.timer) {
        clearInterval(ele.timer);
    }
    ele.timer = setInterval(function () {
        var speed = (target - ele.offsetTop) / 10;
        speed = target > ele.offsetTop ? Math.ceil(speed) : Math.floor(speed);
        var val=target - ele.offsetTop;
        ele.style.top = ele.offsetTop + speed + "px";
        if (Math.abs(val) < Math.abs(speed)) {
            ele.style.top = target + "px";
            clearInterval(ele.timer);
        }
    }, 15);
}

