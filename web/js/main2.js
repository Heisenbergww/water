/**
 * Created by juri on 2017/2/6.
 */
$(document).ready(function () {
    changeLanguage();
    // 切换语言请求js
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    function changeLanguage() {
        $('#en').click(function(){
            $.post('http://steel.com/public/language.html',{"lang":"en","_csrf":csrfToken},function(){
                window.location.reload();
            });
        })
        $('#ru').click(function(){
            $.post('http://steel.com/public/language.html',{"lang":"ru","_csrf":csrfToken},function(){
                window.location.reload();
            });
        })
    }
})

window.onload = function () {


    // 获取当前滚动条高度
    var maxHeight = 200;
    var top = document.getElementsByClassName('go_top_bt')[0];

    function getScrollTop() {
        var scrollPos;
        if (window.pageYOffset) {
            scrollPos = window.pageYOffset;
        }
        else if (document.compatMode && document.compatMode != 'BackCompat'){
            scrollPos = document.documentElement.scrollTop;
        }
        else if (document.body) {
            scrollPos = document.body.scrollTop;
        }
        return scrollPos;
    }

    function showTopBtn() {
        var scrollTop = getScrollTop();
        console.log(scrollTop);
        if(scrollTop > maxHeight){
            top.style.visibility = 'visible';
        }else{
            top.style.visibility = 'hidden';
        }
    }

    showTopBtn();

    window.onscroll = function () {
        showTopBtn();
    };


    top.addEventListener('onclick',function () {


        if (window.pageYOffset) {
            console.log('ie');
            var t = window.pageYOffset;
            var time = setInterval(function () {
                window.pageYOffset = window.pageYOffset - t*0.01;//需要1/(0.01*1)=100ms//总高度为单位一，每一毫秒跑总高度的0.01
                if (window.pageYOffset === 0) {
                    clearInterval(time);
                }
            }, 1);
        }
        else if (document.compatMode && document.compatMode != 'BackCompat'){
            console.log('firefox');
            var t = document.documentElement.scrollTop;
            var time = setInterval(function () {
                document.compatMode = document.compatMode - t*0.01;//需要1/(0.01*1)=100ms//总高度为单位一，每一毫秒跑总高度的0.01
                if (document.compatMode === 0) {
                    clearInterval(time);
                }
            }, 1);
        }
        else if (document.body) {
            var t = document.body.scrollTop;
            var time = setInterval(function () {
                document.body.scrollTop = document.body.scrollTop - t*0.01;//需要1/(0.01*1)=100ms//总高度为单位一，每一毫秒跑总高度的0.01
                if (document.body.scrollTop === 0) {
                    clearInterval(time);
                }
            }, 1);
        }

    })

};