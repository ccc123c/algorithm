function move(ele, target, speed) {
    clearInterval(ele.timer);
    var speed = target > ele.offsetLeft ? speed : -speed;
    ele.timer = setInterval(function () {
        var val = target - ele.offsetLeft;
        ele.style.left = ele.offsetLeft + speed + "px";
        if (Math.abs(val) < Math.abs(speed)) {
            ele.style.left = target + "px";
            clearInterval(ele.timer);
        }
    }, 30);

}
