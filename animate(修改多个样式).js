/**
 * Created by j on 2017/8/21.
 */
function getStyle(obj, attr) {
    if (window.getComputedStyle) {
        return window.getComputedStyle(obj, false)[attr];
    }
    return obj.currentStyle[attr];
}
function animate(element, obj, fn) {
    if (element.timer) {
        clearInterval(element.timer);
    }
    element.timer = setInterval(function () {
        var flag = true;
            for (var k in obj) {
                var leader = getStyle(element, k);
                var target = obj[k];
                if (k == "zIndex") {
                    element.style[k] = target;
                    continue;
                }
                if (k == "opacity") {
                    leader = parseInt(leader * 100);
                    target *= 100;
                } else {
                    leader = parseInt(leader);
                }
                var speed = (target - leader) / 10;
                speed = speed > 0 ? Math.ceil(speed) : Math.floor(speed);
                leader += speed;
                if (k == "opacity") {
                    element.style[k] = leader / 100;
                } else {
                    element.style[k] = leader + "px";
                }
                if (target != leader) {
                    flag = false;
                }
            }
            if (flag) {
                clearInterval(element.timer);
                fn && fn();
            }
        }
        , 15)
}