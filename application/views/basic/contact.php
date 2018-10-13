<section id="contact" class="ts-separate-bg-element" data-bg-image-opacity=".1" data-bg-color="#12264f">
    <div class="container">
        <div class="ts-box mb-0 p-5 ts-mt__n-10" data-animate="ts-fadeInUp">
            <div class="row">
                <div class="col-md-4">
                    <h3>連署書</h3>
                    <address>
                        <figure style="font-size: 18px">
                            同意本請願網頁中提到的所有訴求，希望學校能夠正視學生權益，因此填寫此連署書。
                        </figure>
                        <br>
                        <figure  style="font-size: 18px">
                        	同意本網站保存我所提供的個人資料做為連署證明，並絕不二用。
                        </figure>
                    </address>
                    <!--end address-->
                </div>
                <!--end col-md-4-->
                <div class="col-md-8">
                    <h3>提供資料</h3>
                    <form id="from" method="post" class="clearfix ts-form ts-form-email ts-inputs__transparent">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="form-contact-name">你的姓名（會以打碼方式顯示）</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="你的姓名" required>
                                </div>
                                <!--end form-group -->
                            </div>
                            <!--end col-md-6 col-sm-6 -->
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label >你的學號（會以打碼方式顯示）</label>
                                    <input type="text" class="form-control" id="schoolNumber" name="email" placeholder="1XXXXXXX" required>
                                </div>
                                <!--end form-group -->
                            </div>
                            <!--end col-md-6 col-sm-6 -->
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label >你的手機號碼（並不會顯示）</label>
                                    <input type="text" class="form-control" id="phone" name="email" placeholder="09XXXXXXXX" required>
                                </div>
                                <!--end form-group -->
                            </div>
                            <!--end col-md-6 col-sm-6 -->
                        </div>
                        <!--end row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form-contact-message">我想說的話</label>
                                    <textarea class="form-control" id="opinion" rows="5" name="message" placeholder="留下你的想法（可為空）" required></textarea>
                                </div>
                                <!--end form-group -->
                            </div>
                            <!--end col-md-12 -->
                        </div>
                        <!--end row -->
                        <div class="form-group clearfix">
                            <div class="col-md-6 col-sm-6" id="captcha" style="padding-left: 0;" onclick="loadCaptcha()">
                            </div>
                            <div class="col-md-6 col-sm-6" style="padding-left: 0;padding-bottom: 1em">
                                <input style="margin-top:5px" type="text" class="form-control" id="captchaText" placeholder="輸入上方驗證碼" required>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-primary float-right" onclick="over(this)">送出連署</a>
                            <div class="text-right" style="display:none"  id="loadingButton" ><img  src="<?php echo base_url('dist/assets/img/button-loader.gif') ?>"  height="50"></div>
                        </div>
                        <!--end form-group -->
                        <div class="form-contact-status"></div>
                    </form>
                    <!--end form-contact -->
                </div>
            </div>
            <!--end row-->
        </div>
        <!--end ts-box-->
        <div class="text-center text-white py-4">
            <small>© 2018 樹德科技大學學生冷氣使用請願 Author by Amos WU</small>
        </div>
    </div>
    <!--end container-->
</section>
<script>
    $(window).load(function() {
        loadCaptcha();
    });
    function loadCaptcha(){
        $.ajax({
            url: base_url('home/captcha'),
            type: 'POST',
            dataType: 'text'
        })
        .done(function(img) {
            $('#captcha').html(img);
        })
        .fail(function() {
            alert('無法取得驗證碼');
        });
    }
    function over(object){
        $(object).hide();
        $('#loadingButton').show();
        $.ajax({
            url: base_url('home/submit'),
            type: 'POST',
            dataType: 'text',
            data: {name: $('#name').val(),
                   schoolNumber:$('#schoolNumber').val(),
                   phone:$('#phone').val(),
                   opinion:$('#opinion').val(),
                   captcha:$('#captchaText').val()}
        })
        .done(function(e) {
            $('#loadingButton').hide();
            $(object).show();
            if(e == 1){
                alert('成功送出，請前往學校信箱收取認證信（3分送到），完成連署的最後一步！');
                $('#name').val('');
                $('#schoolNumber').val('');
                $('#phone').val('');
                $('#opinion').val('');
                $('#captchaText').val('');
                loadCaptcha();
            }else if(e == 2){
                alert('請填寫正確的姓名，兩字以上小於十五字');
            }else if(e == 3){
                alert('請填寫正確的學號，共八碼');
            }else if(e == 4){
                alert('請填寫正確的手機號碼，共十碼');
            }else if(e == 5){
                alert('驗證碼輸入錯誤');
            }else if(e == 6){
                alert('這個學號已經連署過了，請確認是否收到認證信，謝謝你的支持！');
            }else if(e == 7){
                alert('認證郵件寄送失敗，可能為伺服器繁忙，請稍後再試！');
                $('#captchaText').val('');
                loadCaptcha();
            }else{
                alert('未知的錯誤');
            }
        })
        .fail(function() {
            alert('連署無法送出，請重新整理後再試一次');
        });
    }
</script>
