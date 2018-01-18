<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="SHORTCUT ICON" href="{{asset('sources/cropped-LOGO白底.jpg')}}"/>
    <title>三牛中美中学</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('own/css/sannew.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('own/css/sannew2.css')}}">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
@if(request()->user())
    @include('admin_nav')
@endif
<header id="sd-header" class="clearfix">

    <div class="sd-header-top">
        <div class="container">
            <ul class="sd-header-left-options">

                <li><i class="fa fa-phone"></i> <a href="tel:027-84853636">027-84853636</a></li>

                <li><i class="fa fa-envelope-o"></i> <a href="mailto:info@sannewschool.com">@sannewschool.com</a>								<li><i class="fa fa-location-arrow"></i><a target="_blank" href="http://j.map.baidu.com/i_Io1">学校地址：武汉经济技术开发区太子湖北路（武汉实验外国语学校东侧）</a></li>

            </ul>


        </div>
    </div>
    <!-- header top end -->
    <div class=" clearfix">
        <div class="container">

            <h1 class="sd-logo">
                <a href="http://www.sannewschool.com/" title="三牛中美中学" rel="home"> <img src="http://www.sannewschool.com/wp-content/uploads/2016/01/三牛中美中学广告语1透.png" alt="三牛中美中学" /></a>

            </h1>
            <!-- logo end -->
            <img class="wechat hidden-xs" src="{{asset('sources/三牛中美学校微信二维码.jpg')}}" />
            <nav class="sd-menu-wrapper hidden-xs">
                <ul id="sd-main-menu" class="sf-menu"><li id="menu-item-2875" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2875"><a href="http://www.sannewschool.com/%e5%ad%a6%e6%a0%a1%e4%bb%8b%e7%bb%8d/">学校介绍</a></li>
                    <li id="menu-item-2878" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2878"><a href="http://www.sannewschool.com/%e8%af%be%e7%a8%8b%e4%bd%93%e7%b3%bb/">课程体系</a></li>
                    <li id="menu-item-2876" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2876"><a href="http://www.sannewschool.com/%e5%b8%88%e8%b5%84%e5%9b%a2%e9%98%9f/">师资团队</a></li>
                    <li id="menu-item-2879" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2879"><a href="http://www.sannewschool.com/%e5%ad%a6%e7%94%9f%e7%94%9f%e6%b4%bb/">学生生活</a></li>
                    <li id="menu-item-2874" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2874"><a href="http://www.sannewschool.com/%e5%85%8d%e8%b4%b9%e5%85%ac%e5%bc%80%e8%af%be/">免费公开课</a></li>
                    <li id="menu-item-2877" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2877"><a href="http://www.sannewschool.com/%e6%8b%9b%e7%94%9f%e4%bf%a1%e6%81%af/">招生信息</a></li>
                </ul>		</nav>

            <!-- primary menu end-->
        </div>
    </div>
</header>

<body>
<div style="min-height:745px;">
    <div class="sd-page-top clearfix" >
        <div class="container">
            <!-- page title -->

            <h2 class="sd-styled-title">
                @yield('header')</h2>
            <!-- page title end -->
        </div>
    </div>
    <!-- 中间内容区局 -->
    <div class="container">
        <div class="row" style="height: 30px"></div>
        <div class="row">

            <!-- 左侧菜单区域   -->
            <div class="col-md-3">
                @section('leftmenu')

                @show
            </div>

            <!-- 右侧内容区域 -->
            <div class="col-md-9">

                @yield('content')

            </div>
        </div>
    </div>
</div>


<footer id="sd-footer">
    <div class="sd-copyright">
        <div class="container">
            <div id="baidu-tracking" style="display: hidden;"><script>
                    var _hmt = _hmt || [];
                    (function() {
                        var hm = document.createElement("script");
                        hm.src = "https://hm.baidu.com/hm.js?84bfe7c5f46f958dcc1d20d5b24f1911";
                        var s = document.getElementsByTagName("script")[0];
                        s.parentNode.insertBefore(hm, s);
                    })();
                </script></div>
            <div class="col-md-4 col-sm-6">Copyright © 2015-2017 版权所有 武汉三牛中美中学</div>
            <div class="col-md-3 col-md-offset-5 col-sm-6">鄂ICP备14013426号-2</div>					</div>
    </div>
</footer>




<!-- jQuery 文件 -->
<script src="{{ asset('static/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap JavaScript 文件 -->
<script src="{{ asset('static/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
