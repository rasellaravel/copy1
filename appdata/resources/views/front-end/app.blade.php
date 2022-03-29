<!DOCTYPE html>
<html lang="en">

<head>
    <title>Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="verify-paysera" content="ec05f1d6a36239ec3dd7241e0464f76b">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/fontawesome-all.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/gallery/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mobile-menu/demo1b26.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/swiper/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/range/wrunner-default-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    @yield('style')
    <style type="text/css">
        .header-section .mid-menu .mid-ul .mid-li {
           padding: 0;
           margin: 0 5px;
       }
       .img-auto {
        width: auto;
        height: auto;
        max-width: 100%;
        max-height: 100%;
    }
    .social-nav1 li {
        margin-right: 15px;
        padding: 0;
        width: 35px;
        height: 35px;
        text-align: center;
        line-height: 35px;
    }
    .social-nav1 a{
     display: block;
 }
 .top-product-section .row {
    margin-right: -10px !important;
    margin-left: -10px !important;
}
.igo-cart-wrapper .igo-cart2-warp .table th {
    vertical-align: middle;
    padding: .75rem;
}
.igo-cart-wrapper .igo-cart2-warp .table td {
    vertical-align: middle;
    display: table-cell;
}
.header-section .mid-menu .logo {
    width: 75px;
}
.filter-list {
    border: 1px solid #dee2e6;
    border-bottom: none;
}
.filter-list li {
    position: relative;
}
.filter-list .m-li {
    background: transparent !important;
    border: none;
    border-bottom: 1px solid #dee2e6 !important;
}
.collapse-ul {
}
.filter-list a {
    padding: 10px 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.sub-list a {
    padding: 10px 0;
}
.sub-list > li a {
    font-size: 13px;
    border-bottom: 1px solid #dee2e6;
}
.sub-list > li:last-child a {
 border-bottom: none;
}
.inner-list li a {
    font-size: 12px;
    border-bottom: 1px solid #dee2e6;
}
.inner-list li:last-child a {
    border-bottom: none;
}
.show-li {
    border-bottom: 1px solid #dee2e6;
}
.filter-list a.active {
    color: #BD1829;
    font-weight: 600;
}
.filter-list .fa-caret-down {
    border: 1px solid #ddd;
    padding: 3px 7px;
    border-radius: 2px;
    position: absolute;
    color: #000;
    right: 15px;
    top: 10px;
    cursor: pointer;
    transition: .5s;
}
.filter-list .fa-caret-down:hover,.rotate-icon.fa-caret-down {
    background: #BD1829;
    color: #fff;
}
.rotate-icon.fa-caret-down{
    transform: rotate(180deg);
}
.sub-list .fa-caret-down  {
    right: 10px;
}
@media screen and (max-width: 767px) {
    .header-section .mid-menu .mid-ul .mid-li {
       margin: 0 8px;
       font-size: 17px;
   }
   .header-section .mid-menu .mid-ul .mid-li .li-txt {
    display: none;
}
.header-section .mid-menu .logo {
    width: 75px;
}
}
</style>
</head>

<body>
    <div class="main-wrapper" id="app">
        @include('front-end.pages.inc.header')
        @yield('content')
        @if (request()->route()->getName() != 'productM')
        <div class="pro-filter-area1"></div>
        @endif
        @include('front-end.pages.inc.footer')
    </div>


    <div class="scroll-up">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 172 172"
        style=" fill:#000000;">
        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
        font-family="none" font-weight="none" font-size="none" text-anchor="none"
        style="mix-blend-mode: normal">
        <path d="M0,172v-172h172v172z" fill="none"></path>
        <g fill="#68aa10">
            <path
            d="M86,6.88c-43.63156,0 -79.12,35.48844 -79.12,79.12c0,43.63156 35.48844,79.12 79.12,79.12c43.63156,0 79.12,-35.48844 79.12,-79.12c0,-43.63156 -35.48844,-79.12 -79.12,-79.12zM115.95219,74.67219c-0.67187,0.67188 -1.54531,1.00781 -2.43219,1.00781c-0.88687,0 -1.76031,-0.33594 -2.43219,-1.00781l-21.64781,-21.64781v74.25562c0,1.90813 -1.54531,3.44 -3.44,3.44c-1.89469,0 -3.44,-1.53187 -3.44,-3.44v-74.25562l-21.64781,21.64781c-1.34375,1.34375 -3.52062,1.34375 -4.86437,0c-1.34375,-1.34375 -1.34375,-3.52062 0,-4.86437l27.52,-27.52c0.3225,-0.3225 0.69875,-0.56438 1.11531,-0.73906c0.84656,-0.34937 1.78719,-0.34937 2.63375,0c0.41656,0.17469 0.79281,0.41656 1.11531,0.73906l27.52,27.52c1.34375,1.34375 1.34375,3.52062 0,4.86437z">
        </path>
    </g>
</g>
</svg>
</div>


<script type="text/javascript" src="{{ asset('admin-assets/bower_components/jquery/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/bower_components/bootstrap/js/bootstrap.min.js') }}">
</script>
<script src="{{ asset('assets/swiper/js/swiper.js') }}"></script>
<script src="{{ asset('assets/gallery/jquery.fancybox.js') }}"></script>
<script src="{{ asset('assets/range/wrunner-jquery.js') }}"></script>
<script src="{{ asset('assets/mobile-menu/hc-offcanvas-nav1b26.js') }}"></script>
{{-- <script src="{{ asset('assets/js/custom.js') }}"></script> --}}
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    window.ciupkim_search = "{{ route('user.search') }}";
    window.favorite_add = "{{ route('favorite.add') }}";
    window.favorite_delete = "{{ route('favorite.delete') }}";
    window.base_url = "<?= url('/') ?>";
    $(function($) {
        var $nav = $('#main-nav');
        var $toggle = $('.toggle');
        var data = {};
        var defaultData = {
            maxWidth: false,
            customToggle: $toggle,
            navTitle: 'menu',
            levelTitles: true,
            pushContent: '#container'
        };

        const initNav = function(conf) {
            var $old = $('.hc-offcanvas-nav');

            setTimeout(function() {
                if ($old.length) {
                    $old.remove();
                }
            }, $toggle.hasClass('toggle-open') ? 420 : 0);

            if ($toggle.hasClass('toggle-open')) {
                $toggle.click();
            }
            $toggle.off('click');
            $.extend(data, conf)
            $nav.clone().hcOffcanvasNav($.extend({}, defaultData, data));
        }
        initNav({});

        $('.actions').find('a').on('click', function(e) {
                // e.preventDefault();

                var $this = $(this).addClass('active');
                var $siblings = $this.parent().siblings().children('a').removeClass('active');

                initNav(eval('(' + $this.data('demo') + ')'));
            });
        $('.filter-list .fa-caret-down').on('click', function(e) {
            if($(this).hasClass('rotate-icon')) {
             $(this).siblings('.collapse-ul').slideUp();
             $(this).siblings('.collapse-a').removeClass('show-li');
             $(this).removeClass('rotate-icon');
         }else { 
             $(this).siblings('.collapse-ul').slideDown();
             $(this).siblings('.collapse-a').addClass('show-li');
             $(this).addClass('rotate-icon'); 
         }
     });

        $('.actions').find('input').on('change', function() {
            var $this = $(this);
            var data = eval('(' + $this.data('demo') + ')');

            if ($this.is(':checked')) {
                initNav(data);
            } else {
                var removeData = {};
                $.each(data, function(index, value) {
                    removeData[index] = false;
                });
                initNav(removeData);
            }
        });
    });
    $(document).ready(function() {

        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function() {
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function(e) {
                    if (e < onStar) {
                        $(this).addClass('hover');
                    } else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function() {
                $(this).parent().children('li.star').each(function(e) {
                    $(this).removeClass('hover');
                });
            });


            /* 2. Action to perform on click */
            $('#stars li').on('click', function() {
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }

                // JUST RESPONSE (Not needed)
                var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                var msg = "";
                if (ratingValue > 1) {
                    msg = "Thanks! You rated this " + ratingValue + " stars.";
                } else {
                    msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
                }
                responseMessage(msg);

            });
            // sub menu css top added
            $(".sub-m").css("top", $(".main-menu-all").height());
        });
    $(function() {
        $('[data-fancybox="gallery"]').fancybox({
            thumbs: {
                autoStart: true
            }
        });
    });
</script>
@yield('script')
</body>

</html>
