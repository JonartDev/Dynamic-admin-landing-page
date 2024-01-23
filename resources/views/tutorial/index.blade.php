<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $admin[0]->title}}</title>
    <link rel="stylesheet" href="landing_page/tutorial/assets/css/style.css" />
    <link rel="stylesheet" href="landing_page/tutorial/assets/css/bootstrap.min.css" />
    <link rel="icon" href="landing_page/assets/favicon.png" type="image/x-icon">
</head>

<body>
    <header class="header">
        <section class="flex">
            <a href="/" class="logo"><img src="{{ asset('storage/'.$admin[0]->logo) }}" alt=""></a>
            <div class="icons">
                <div class="text-logo">
                    <a href="/">APP安装教程</a>
                </div>
            </div>
        </section>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="box active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                            <div class="flex-img">
                                <div class="box-content">
                                    <p>IOS教程</p>
                                </div>
                            </div>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="box" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="home" aria-selected="true">
                            <div class="flex-img">
                                <div class="box-content">
                                    <p>Android教程</p>
                                </div>
                            </div>
                        </button>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="wrapper">
                            <div class="mobiles">
                                <div class="mobile">
                                    <img src="landing_page/tutorial/assets/images/ios/1.png" alt="IOS" />
                                    <p>1、进入浏览器搜索平台网址，点击【右上角APP】进行下载</p>
                                </div>
                                <div class="mobile">
                                    <img src="landing_page/tutorial/assets/images/ios/2.png" alt="IOS" />
                                    <p>2、请您点击下载IOS桌面版，点击安装，点击继续</p>
                                </div>
                                <div class="mobile">
                                    <img src="landing_page/tutorial/assets/images/ios/3.png" alt="IOS" />
                                    <p>3、选择允许下载配置描述文件进入设置-通用-设备管理，把防掉签文件和证书删除掉</p>
                                </div>
                                <div class="mobile">
                                    <img src="landing_page/tutorial/assets/images/ios/4.png" alt="IOS" />
                                    <p>4、进入设置-通用-VPN与设备管理，选择【988】，点击安装（若重新下载，将之前的988移除描述文件）</p>
                                </div>
                                <div class="mobile">
                                    <img src="landing_page/tutorial/assets/images/ios/5.png" alt="IOS" />
                                    <p>5、输入手机密码，点击下一步，点击安装，按照提示步骤一步步操作</p>
                                </div>
                                <div class="mobile">
                                    <img src="landing_page/tutorial/assets/images/ios/6.png" alt="IOS" />
                                    <p>
                                        6、再次点击安装即可下载完成。 iOS手机【提示新的 MDM 有效负载与旧的有效负载不匹配】在【设置—通用—VPN与设备管理—打开VPN与设备管理】，找到对应的描述文件，点击移除设备管理，然后返回重新下载即可
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="wrapper">
                            <div class="mobiles">
                                <div class="mobile">
                                    <img src="landing_page/tutorial/assets/images/android/1.png" alt="IOS" />
                                    <p>1、进入浏览器搜索平台网址，点击【右上角APP】进行下载</p>
                                </div>
                                <div class="mobile">
                                    <img src="landing_page/tutorial/assets/images/android/2.png" alt="IOS" />
                                    <p>2、点击下载安卓 APP版，选择【仍然下载】</p>
                                </div>
                                <div class="mobile">
                                    <img src="landing_page/tutorial/assets/images/android/3.png" alt="IOS" />
                                    <p>3、选择【了解风险】（图例为华为手机）</p>
                                </div>
                                <div class="mobile">
                                    <img src="landing_page/tutorial/assets/images/android/4.png" alt="IOS" />
                                    <p>4、按照提示步骤操作，再次点击【仍然安装】</p>
                                </div>
                                <div class="mobile">
                                    <img src="landing_page/tutorial/assets/images/android/5.png" alt="IOS" />
                                    <p>5、选择不再提示风险应用，安装成功</p>
                                </div>
                                <div class="mobile">
                                    <img src="landing_page/tutorial/assets/images/android/6.png" alt="IOS" />
                                    <p>6、点击【打开】，根据页面提示将弹出的信息全部选择允许，或点击【设置--应用和服务--权限管理--应用--搜索乐发，可将权限开启</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">{{ $admin[0]->info}}</footer>
    <script src="landing_page/tutorial/assets/js/jquery-3.6.0.min.js"></script>
    <script src="landing_page/tutorial/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>