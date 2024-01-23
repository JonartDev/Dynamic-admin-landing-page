<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $admin[0]->title }}</title>
    <link rel="stylesheet" href="landing_page/assets/all.min.css">
    <link rel="stylesheet" href="landing_page/assets/style.css">
    <link rel="stylesheet" href="landing_page/assets/responsive.css">
    <link rel="stylesheet" href="landing_page/assets/animate.css">
    <link rel="stylesheet" href="landing_page/assets/swiper-bundle.min.css">

    <link rel="icon" href="landing_page/assets/favicon.png" type="image/x-icon">
</head>

<body>
    <header class="header">
        <section class="flex">
            <a href="/" class="logo"><img src="{{ asset('storage/'.$admin[0]->logo) }}" alt=""></a>
            <div class="icons">
                @if(isset($links) && count($links) > 0 )
                <a class="link16" href="{{ $links[0]->links }}" target="_blank">
                    <img src="{{ asset('storage/'. $links[0]->image_path) }}" alt="">
                </a>
                @endif
            </div>
        </section>
    </header>
    <section class="about" id="rowContainer">
        <div class="row box_link mobile">
            <div class="swiper content mySwiperMobile">
                <div class="swiper-wrapper"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="row box_link mobile">
            <img src="landing_page/assets/images/payments.webp" style="width: 100%">
        </div>
        <div class="row box_link desktop">
            <div class="image abg show show1" style="display: block; margin-bottom: 5px">
                @foreach($buttons as $item)
                @if($item->_group == 1)
                <a href="{{$item->links}}" target="_blank">
                    <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{$item->name}}">
                </a>
                @endif
                @endforeach
            </div>
            <div class="swiper content mySwiperDesktop">
                <div class="swiper-wrapper"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="row box_link desktop">
            <img src="landing_page/assets/images/payments.webp" style="width: 100%">
        </div>
        <div class="main a7 show show2" style="display: block">
            <div>
                <div>
                    <h1 class="heading">
                        <img src="landing_page/assets/images/premium.webp" alt="" class="a4 show show4" style="display: block">
                    </h1>
                </div>
                <div class="box-container a7 show show6">
                    @foreach($buttons as $item)
                    @if($item->_group == 2)
                    <a class="box" href="{{$item->links}}" target="_blank">
                        <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{$item->name}}">
                    </a>
                    @endif
                    @endforeach
                </div>
            </div>
            <div>
                <div>
                    <h1 class="heading">
                        <img src="landing_page/assets/images/ewallet.webp" alt="" class="a4 show show4" style="display: block">
                    </h1>
                </div>
                <div class="box-container a7 show show6">
                    @foreach($buttons as $item)
                    @if($item->_group == 3)
                    <a class="box" href="{{$item->links}}" target="_blank">
                        <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{$item->name}}">
                    </a>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">{{ $admin[0]->info }} </footer>
    <script src="landing_page/assets/swiper-bundle.min.js"></script>
    <script src="landing_page/assets/jquery-3.1.0.js"></script>
    <script>
        window.onload = function() {

            $.ajax({
                url: "{{ route('get.banner') }}",
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    bannerUI(data);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error("Error fetching data:", error);
                }
            });

            function bannerUI(data) {
                var desktopImages = [];
                var mobileImages = [];

                data.forEach(function(item) {
                    var image = {
                        src: 'storage/' + item.image_path,
                        isMobile: item.isMobile
                    };

                    if (image.isMobile === 0) {
                        desktopImages.push(image);
                    } else if (image.isMobile === 1) {
                        mobileImages.push(image);
                    }
                });

                updateSwiper(".mySwiperDesktop", desktopImages);
                updateSwiper(".mySwiperMobile", mobileImages);
            }

            function updateSwiper(selector, images) {
                var bannerImages = [];

                if (images.length > 0) {
                    bannerImages = images;

                    bannerImages.forEach(function(image) {
                        var swiperWrapper = $('<div>', {
                            'class': 'swiper-slide'
                        }).append(
                            $('<img>', {
                                'src': image.src
                            })
                        );

                        $(selector + ' .swiper-wrapper').append(swiperWrapper);
                    });

                    var swiper = new Swiper(selector, {
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
                } else {
                    // Handle the case where no images are received
                    console.warn('No images received.');
                }
            }
        }
    </script>

</body>

</html>