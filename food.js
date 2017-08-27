/**
 * Created by j on 2017/8/27.
 */
(function (window) {
    function Food(options) {
        this.width = options.width||20;
        this.height = options.height||20;
        this.color = options.color||"green";
        this.x = 0;
        this.y = 0;
        this.map=options.map;
        this.element = document.createElement('div');
        this.init();
    }
    Food.prototype = {
        init: function () {
            this.element.style.height = this.height + "px";
            this.element.style.width = this.width + "px";
            this.element.style.backgroundColor = this.color;
            this.render();
        },
        render:function () {
            this.element.style.position="absolute";
            this.x=Utils.getRandom(0,this.map.offsetWidth/this.width);
            this.y=Utils.getRandom(0,this.map.offsetHeight/this.height);
            this.element.style.left=this.x*this.width+"px";
            this.element.style.top=this.y*this.height+"px";
            this.map.appendChild(this.element);
        }
    };
    window.Food=Food;
})(window)
