/**
 * Created by j on 2017/8/27.
 */
(function (window) {
    function Snake(options) {
        this.width = options.width || 20;
        this.height = options.height || 20;
        this.headColor = options.headColor || "red";
        this.bodyColor = options.bodyColor || "yellow";
        this.map = options.map;
        this.elements = [];
        this.direction = "right";
        this.body = [
            {x: 3, y: 1, color: this.headColor},
            {x: 2, y: 1, color: this.bodyColor},
            {x: 1, y: 1, color: this.bodyColor}];
        this.render();
    }

    Snake.prototype = {
        render: function () {
            for (var i = 0; i < this.body.length; i++) {
                var div = document.createElement('div');
                //将创建蛇的小方块存在一个数组中去，方便以后删除
                this.elements.push(div);
                div.style.position = "absolute";
                div.style.width = this.width + "px";
                div.style.height = this.height + "px";
                div.style.left = this.body[i].x * this.width + "px";
                div.style.top = this.body[i].y * this.height + "px";
                div.style.backgroundColor = this.body[i].color;
                this.map.appendChild(div);
            }
        },
        move: function (food) {
            for (var i = this.body.length - 1; i > 0; i--) {
                this.body[i].x = this.body[i - 1].x;
                this.body[i].y = this.body[i - 1].y;
            }
            switch (this.direction) {
                case "left":
                    this.body[0].x--;
                    break;
                case "right":
                    this.body[0].x++;
                    break;
                case "top":
                    this.body[0].y--;
                    break;
                case "bottom":
                    this.body[0].y++;
                    break;
            }
            if (this.body[0].x == food.x && this.body[0].y == food.y) {
                this.body.push({
                    x:this.body[this.body.length-1].x,
                    y:this.body[this.body.length-1].y,
                    color:this.bodyColor
                });
                food.render();
            }
            for (var j = 0; j < this.elements.length; j++) {
                this.map.removeChild(this.elements[j]);
            }
            this.elements = [];
            this.render();
        }
    };
    window.Snake = Snake;
})(window);
