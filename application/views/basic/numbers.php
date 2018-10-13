<section id="numbers" class="ts-block ts-background-is-dark ts-separate-bg-element py-5 ts-xs-text-center" data-bg-image-opacity=".1" data-bg-color="#0e1e3d" data-bg-parallax="scroll" data-bg-parallax-speed="3">
    <div class="container">
        <div class="ts-promo-numbers py-5">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="ts-promo-number">
                        <h2 class="ts-opacity__50" id="numberCount">0</h2>
                        <h3 class="mb-0">目前連署數</h3>
                    </div>
                    <!--end ts-promo-number-->
                </div>
                <!--end col-sm-3-->
                <div class="col-sm-6 col-md-6">
                    <div class="ts-promo-number">
                        <h2 class="ts-opacity__50">10699+</h2>
                        <h3 class="mb-0">日間部在學學生數</h3>
                    </div>
                    <!--end ts-promo-number-->
                </div>
            </div>
            <!--end row-->
        </div>
        <!--end ts-promo-numbers-->
    </div>
    <!--end container-->
</section>
<script>
    $(window).load(function() {
        loadNumberCount();
    });
    function loadNumberCount(){
        $.ajax({
            url: base_url('home/allCount'),
            dataType: 'text'
        })
        .done(function(number) {
            $('#numberCount').html(number);
        })
        .fail(function() {
            alert('無法取得目前連署數');
        });
        
    }
</script>