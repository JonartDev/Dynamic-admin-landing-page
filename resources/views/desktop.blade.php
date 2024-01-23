<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>988娱乐城</title>
        <link rel="stylesheet" href="landing_page/assets/all.min.css">
        <link rel="stylesheet" href="landing_page/assets/style.css">
        <link rel="stylesheet" href="landing_page/assets/responsive.css">
        <link rel="stylesheet" href="landing_page/assets/animate.css">
        <link rel="stylesheet" href="landing_page/assets/swiper-bundle.min.css">

        <link rel="icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
        <header class="header">
            <section class="flex">
                <a href="/" class="logo"><img src="landing_page/assets/images/logo.webp" alt=""></a>
                <div class="icons">
                    <a class="link16" href="/" target="_blank">
                        <img src="landing_page/assets/images/7x24.webp" alt="">
                    </a>
                </div>
            </section>
        </header>
        <section class="about" id="rowContainer">
            <div class="row box_link">
                <div class="image abg show show1 animated fadeInDown" style="display: block; margin-bottom: 5px">
                    <a class="app_click" href="/">
                        <img src="landing_page/assets/images/app.png" alt="app安装教程">
                    </a>
                    <a class="tut_click" href="/">
                        <img src="landing_page/assets/images/tutorial.png" alt="防劫持教程">
                    </a>
                    <a class="link1" href="/" target="_blank">
                        <img src="landing_page/assets/images/promotions.png" alt="优惠活动">
                    </a>
                    <a class="link2" href="/">
                        <img src="landing_page/assets/images/online-service.png" alt="在线客服">
                    </a>
                </div>
                <div class="swiper content mySwiperDesktop">
                    <div class="swiper-wrapper"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div>
                <div>
                    <h1 class="heading header_charge">
                        <img src="landing_page/assets/images/charge.webp" alt="" class="a4 show show3 animated bounceInLeft" style="display: block">
                    </h1>
                </div>
            </div>
            <div class="main a7 show show2 animated zoomIn" style="display: block">
                <div>
                    <div>
                        <h1 class="heading">
                            <img src="landing_page/assets/images/premium.webp" alt="" class="a4 show show4 animated bounceInLeft" style="display: block">
                        </h1>
                    </div>
                    <div class="box-container a7 show show6 animated zoomIn">
                        <a class="box" href="/" target="_blank">
                            <img src="landing_page/assets/images/premium/1.webp">
                        </a>
                        <a class="box" href="/" target="_blank">
                            <img src="landing_page/assets/images/premium/2.webp">
                        </a>
                        <a class="box" href="/" target="_blank">
                            <img src="landing_page/assets/images/premium/3.webp">
                        </a>
                        <a class="box" href="/" target="_blank">
                            <img src="landing_page/assets/images/premium/4.webp">
                        </a>
                        <a class="box" href="/" target="_blank">
                            <img src="landing_page/assets/images/premium/5.webp">
                        </a>
                        <a class="box" href="/" target="_blank">
                            <img src="landing_page/assets/images/premium/6.webp">
                        </a>
                    </div>
                </div>
                <div>
                    <div>
                        <h1 class="heading">
                            <img src="landing_page/assets/images/ewallet.webp" alt="" class="a4 show show4 animated bounceInLeft" style="display: block">
                        </h1>
                    </div>
                    <div class="box-container a7 show show6 animated zoomIn">
                        <a class="box" href="http://okpqianbao021.com" target="_blank">
                            <img src="landing_page/assets/images/ewallet/1.webp">
                        </a>
                        <a class="box" href="https://topay33.com/" target="_blank">
                            <img src="landing_page/assets/images/ewallet/2.webp">
                        </a>
                        <a class="box" href="http://dsgys82126.com/#/" target="_blank">
                            <img src="landing_page/assets/images/ewallet/3.webp">
                        </a>
                        <a class="box" href="https://www.mp6.ag/" target="_blank">
                            <img src="landing_page/assets/images/ewallet/4.webp">
                        </a>
                        <a class="box" href="http://mdkkdg.abillioncoin.com/home/#/" target="_blank">
                            <img src="landing_page/assets/images/ewallet/5.webp">
                        </a>
                        <a class="box" href="https://download.ipay888.com/" target="_blank">
                            <img src="landing_page/assets/images/ewallet/6.webp">
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">Copyright 988娱乐城 reserved</footer>
        <script src="landing_page/assets/swiper-bundle.min.js"></script>
        <script src="landing_page/assets/jquery-3.1.0.js"></script>
        <script>
            
            window.onload = function () {

                images = [
                    'landing_page/uploads/640X210-A.gif', 
                    'landing_page/uploads/640X210-B.gif', 
                    'landing_page/uploads/640X210-C.gif', 
                    'landing_page/uploads/640X210-D.gif',
                    'landing_page/uploads/640X210-E.gif'
                ]

                $.each(images, function(index, image) {
                    
                    var swiperWrapper = $('<div>', {
                        'class' : 'swiper-slide'
                    } ).append(
                        $('<img>', {
                            'src' : image
                        } )
                    );

                    $(".mySwiperDesktop .swiper-wrapper").append(swiperWrapper);

                });

                var swiperDesktop = new Swiper(".mySwiperDesktop", {
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                        dynamicBullets: true,
                    },
                    autoplay: {
                        delay: 1500,
                    },
                    grabCursor: true,
                });

            }
        </script>
    </body>
</html>
