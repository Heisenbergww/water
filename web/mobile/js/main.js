/**
 * Created by juri on 2016/9/14.
 */
$(document).ready(function(){
    //菜单展开
    //侧边菜单
    $(".top_menu_bar").click(function(){
        $(".side_menu").show();
        side_about_c.hide();
        side_support_c.hide();
    })
    $(".side_menu_content_bar").click(function(){
        $(".side_menu").hide();
    })
    $(".side_menu_content").click(function(event){
        event.stopPropagation();
        // do something
    })
    $(".side_menu").click(function(){
        $(this).hide();
    })

    //下部菜单
    function openAndClose(fa,child){
        fa.click(function(){
            child.toggle();
            if( fa.find("img").attr('src')=="/mobile/img/add.png"){
                fa.find("img").attr("src","/mobile/img/line.png");
            }
            else {
                fa.find("img").attr("src","/mobile/img/add.png");
            }
        })
    }
    var about=$(".about_fa");
    var about_c=$(".for_about");
    var support=$(".support_fa");
    var support_c=$(".for_support");
    var side_about=$(".side_about_fa");
    var side_about_c=$(".side_for_about");
    var side_support=$(".side_support_fa");
    var side_support_c=$(".side_for_support");

    openAndClose(about,about_c);
    openAndClose(support,support_c);
    openAndClose(side_about,side_about_c);
    openAndClose(side_support,side_support_c);


    //item商品图片切换
    //beBig();
//                点击前一张图片向前移动
    $(".right_btn").click(function(){
        //            获取这些图片的div把他们放入数组
        a=$(".fivepics_smallpic").children("div .fivepic ");
        var i=0;
        b=a[0];
        while(i< a.length){
            a[i]=a[i+1];
            i++;
        }
        i=i-1;
        a[i]=b;
        var z=0;
        $("div").remove(".fivepic");
        while(z< a.length){
            $(".fivepics_smallpic").append(a[z]);
            z++;
        }
        p=$(".fivepics_smallpic").children("div .fivepic ");
        beTheone();
    })
//            点击后一张图片向后移动
    $(".left_btn").click(function(){
        //            获取这些图片的div把他们放入数组
        a=$(".fivepics_smallpic").children("div .fivepic ");
        var y= a.length-1;
        b=a[y];
        while( y>0){
            a[y]=a[y-1];
            //console.log(y);
            y--;
        }
        a[0]=b;
        var z=0;
        $("div").remove(".fivepic");
        while(z< a.length){
            $(".fivepics_smallpic").append(a[z]);
            z++;
        }
        p=$(".fivepics_smallpic").children("div .fivepic ");
        beTheone();
    })
//            点击其中一张图片在上面显示大图
    function beTheone(){
        c=$(".fivepics_smallpic .fivepic img").first().attr("src");
        console.log(c);
        $(".product_pic").attr("src",c);
    }
    //function beBig(){
    //    $(".fivepic").click(function(){
    //        var bigPicSrc=/s(?=\d)/g;
    //        c=$(this).attr("src");
    //        d= c.replace(bigPicSrc,'b');
    //        $(".product_pic").attr("src",c);
    //    })
    //}


    //pdf下载
    //  模态窗显示
    function theTanChuangShow(){
        var  dd=$('.tanchuang');
        var ee=$('.bg');
        $('.pdf_pic').click(function() {
//                    dd.css("display", "block");
            dd.fadeIn('slow');
//                    ee.css("display", "block");
            ee.fadeIn('fast');
            if (dd.css("display") == "block") {
                dd.mouseleave(function () {
//                            alert("再见，您的鼠标离开了该段落。");

                })
                $('.tanchuang .close').click(function () {
                    dd.css("display", "none");
                    ee.css("display", "none");
                });
                $('.bg').click(function () {
                    dd.css("display", "none");
                    ee.css("display", "none");
                });

            }
        })
    }
//  在页面中制作一个背景
    function makeDarkBg(){
        $("body").append("<div class=bg></div>")
    }
//给背景加上样式
    function decorationTheBg(){
        $('.bg').css({
            "width":"12000px",
            "height":"12000px",
            "left":"0",
            "top":"0",
            "background-color":"#333333",
            "opacity":"0.8",
            "position":"fixed",
            "z-index":"4",
            "display":"none"
        })
    }
    makeDarkBg();
    decorationTheBg();
    theTanChuangShow();



})