$(document).ready(function () {


    var SlideTop = function (option) {
        var that = this;
        var top = $('.go_top_bt');
        
        that.default = {
            height : '300',
            timeIndex : '100'
        };

        for(var op in that.default){
            if(op in option){
                that.default[op] = option[op];
            }
        }

        this.showTopBtn = (function () {
            $(window).scroll(function () {                
                var scrollTop = $(window).scrollTop();
                if(scrollTop > that.default.height){
                    top.css({visibility:'visible'});
                }else{
                    top.css({visibility:'hidden'});
                }
            });
        })();

        this.toTop = (function () {
            top.click(function () {
                var t = $(window).scrollTop();
                var time = setInterval(function () {
                    $(window).scrollTop($(window).scrollTop() - t/that.default.timeIndex);//需要1/(0.01*1)=100ms//总高度为单位一，每一毫秒跑总高度的0.01
                    // console.log($(window).scrollTop());
                    if ($(window).scrollTop() === 0) {
                        clearInterval(time);
                    }
                }, 1);
            })
        })();
    };

    var haha = new SlideTop({
        height : '200',
        timeIndex : '75'//小于100可变快
    });

});








