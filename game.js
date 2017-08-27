/**
 * Created by j on 2017/8/27.
 */
(function (window) {
    function Game(map) {
        this.map = map;
        //食物对象
        this.food = new Food({
            width: 20,
            height: 20,
            color: "green",
            map: map1
        });
        //蛇对象
        //小方块的高，宽，蛇头的颜色，蛇身的颜色，蛇的位置
        this.snake = new Snake({
            map: map1
        });
        this.bindKeyEvent();
    }
    Game.prototype= {
        startGame:function () {
            var that=this;
            var timer = setInterval(function () {
                that.snake.move(that.food);
                if (that.snake.body[0].x < 0 || that.snake.body[0].x >= that.snake.map.offsetWidth / that.snake.width ||
                    that.snake.body[0].y < 0 || that.snake.body[0].y >= that.snake.map.offsetHeight / that.snake.height) {
                    clearInterval(timer);
                    alert("撞墙了");
                }
                for (var i = 3; i < that.snake.body.length; i++) {
                    if (that.snake.body[0].x == that.snake.body[i].x && that.snake.body[0].y == that.snake.body[i].y) {
                        clearInterval(timer);
                        alert("撞到自己了");
                    }
                }
            }, 500);
        },
        bindKeyEvent:function () {
            var that=this;
            document.onkeyup = function (e) {
                console.log(e.keyCode);
                switch (e.keyCode) {
                    case 37:
                        if (that.snake.direction != "right") {
                            that.snake.direction = "left";
                        }
                        break;
                    case 38:
                        if (that.snake.direction != "bottom") {
                            that.snake.direction = "top";
                        }
                        break;
                    case 39:
                        if (that.snake.direction != "left") {
                            that.snake.direction = "right";
                        }
                        break;
                    case 40:
                        if (that.snake.direction != "top") {
                            that.snake.direction = "bottom";
                        }
                        break;
                }
            };
        }
    };
    window.Game=Game;
})(window);



