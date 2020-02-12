<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Travel Mate - Index</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/lineicons.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/weather-icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}"/>
</head>
<body>
<div id="app">
    <nav
        class="navbar navbar-default navbar-inverse navbar-theme navbar-theme-abs navbar-theme-border"
        id="main-nav">
        <div class="navbar-inner nav">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" data-target="#navbar-main" data-toggle="collapse"
                        type="button" area-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <router-link class="navbar-brand" to="/">
                    <img src="img/logo.png" alt="Image Alternative text" title="Image Title"/>
                </router-link>
            </div>
            <div class="collapse navbar-collapse" id="navbar-main">
                <ul class="nav navbar-nav">

                    <li>
                        <router-link to="/bus-company">Bus Companies</router-link>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

        <router-view></router-view>

</div>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/moment.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/owl-carousel.js')}}"></script>
<script src="{{asset('js/blur-area.js')}}"></script>
<script src="{{asset('js/icheck.js')}}"></script>
<script src="{{asset('js/gmap.js')}}"></script>
<script src="{{asset('js/magnific-popup.js')}}"></script>
<script src="{{asset('js/ion-range-slider.js')}}"></script>
<script src="{{asset('js/sticky-kit.js')}}"></script>
<script src="{{asset('js/smooth-scroll.js')}}"></script>
<script src="{{asset('js/fotorama.js')}}"></script>
<script src="{{asset('js/bs-datepicker.js')}}"></script>
<script src="{{asset('js/typeahead.js')}}"></script>
<script src="{{asset('js/quantity-selector.j')}}s"></script>
<script src="{{asset('js/countdown.js')}}"></script>
<script src="{{asset('js/window-scroll-action.js')}}"></script>
<script src="{{asset('js/fitvid.js')}}"></script>
<script src="{{asset('js/youtube-bg.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>
