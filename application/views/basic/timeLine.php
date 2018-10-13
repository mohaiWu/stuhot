<section id="our-life-sotry" class="ts-block ts-separate-bg-element ts-background-repeat" data-bg-image-opacity=".1">
    <!--end ts-title-->
    <div class="ts-time-line__horizontal">
        <div class="ts-title text-center">
            <h2>在訴求獲得正視前，連署不會停止。</h2>
        </div>
        <ul id="timeLineUl" class="pt-5 owl-carousel" data-owl-items="99" data-owl-auto-width="1">
        	<li class="ts-time-line__item ts-time-line__milestone">
                <div class="ts-box">
                    <h5>連署開始</h5>
                </div>
                <!--end ts-box-->
                <figure>
                    <h6>　</h6>
                    <h6>　</h6>
                </figure>
                <!--end date-->
            </li>
        </ul>
    </div>
    <!--end ts-timeline__horizontal-->
</section>
<script>
    $(window).load(function() {
        loadTimeLine();
    });
    function loadTimeLine(){
        $.ajax({
            url: base_url('home/getTimeLine'),
            dataType: 'json'
        })
        .done(function(json) {
            for(var i=0;i<json.length;i++){
                $('#timeLineUl').append('<li class="ts-time-line__item"><div class="ts-box"><h5>'+json[i]['text']+'</h5></div><figure><h6>'+json[i]['time']+'</h6><h6>　</h6></figure></li>');
            }
            onTimeLine();
        })
        .fail(function() {
            alert('無法取得目前連署數');
        });
    }
    function onTimeLine(){
        var $owlCarousel = $(".owl-carousel");
        if( $owlCarousel.length ){
            $owlCarousel.each(function() {

                var items = parseInt( $(this).attr("data-owl-items"), 10);
                if( !items ) items = 1;

                var nav = parseInt( $(this).attr("data-owl-nav"), 2);
                if( !nav ) nav = 0;

                var dots = parseInt( $(this).attr("data-owl-dots"), 2);
                if( !dots ) dots = 0;

                var center = parseInt( $(this).attr("data-owl-center"), 2);
                if( !center ) center = 0;

                var loop = parseInt( $(this).attr("data-owl-loop"), 2);
                if( !loop ) loop = 0;

                var margin = parseInt( $(this).attr("data-owl-margin"), 2);
                if( !margin ) margin = 0;

                var autoWidth = parseInt( $(this).attr("data-owl-auto-width"), 2);
                if( !autoWidth ) autoWidth = 0;

                var navContainer = $(this).attr("data-owl-nav-container");
                if( !navContainer ) navContainer = 0;

                var autoplay = parseInt( $(this).attr("data-owl-autoplay"), 2);
                if( !autoplay ) autoplay = 0;

                var autoplayTimeOut = parseInt( $(this).attr("data-owl-autoplay-timeout"), 10);
                if( !autoplayTimeOut ) autoplayTimeOut = 5000;

                var autoHeight = parseInt( $(this).attr("data-owl-auto-height"), 2);
                if( !autoHeight ) autoHeight = 0;

                var fadeOut = $(this).attr("data-owl-fadeout");
                if( !fadeOut ) fadeOut = 0;
                else fadeOut = "fadeOut";

                if( $("body").hasClass("rtl") ) var rtl = true;
                else rtl = false;

                if( items === 1 ){
                    $(this).owlCarousel({
                        navContainer: navContainer,
                        animateOut: fadeOut,
                        autoplayTimeout: autoplayTimeOut,
                        autoplay: 1,
                        autoheight: autoHeight,
                        center: center,
                        loop: loop,
                        margin: margin,
                        autoWidth: autoWidth,
                        items: 1,
                        nav: nav,
                        dots: dots,
                        rtl: rtl,
                        navText: []
                    });
                }
                else {
                    $(this).owlCarousel({
                        navContainer: navContainer,
                        animateOut: fadeOut,
                        autoplayTimeout: autoplayTimeOut,
                        autoplay: autoplay,
                        autoHeight: autoHeight,
                        center: center,
                        loop: loop,
                        margin: margin,
                        autoWidth: autoWidth,
                        items: 1,
                        nav: nav,
                        dots: dots,
                        rtl: rtl,
                        navText: [],
                        responsive: {
                            1199: {
                                items: items
                            },
                            992: {
                                items: 3
                            },
                            768: {
                                items: 2
                            },
                            0: {
                                items: 1
                            }
                        }
                    });
                }

                if( $(this).find(".owl-item").length === 1 ){
                    $(this).find(".owl-nav").css( { "opacity": 0,"pointer-events": "none"} );
                }

            });
        }
    }
</script>