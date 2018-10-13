<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">

    <link rel="stylesheet" href="<?php echo base_url('dist/'); ?>assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('dist/'); ?>assets/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('dist/'); ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url('dist/'); ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url('dist/'); ?>assets/css/style.css">
	<title>樹德學生權益請願</title>

</head>
<body data-spy="scroll" data-target=".navbar">
    <div class="ts-page-wrapper" id="page-top">
    	<script src="<?php echo base_url('dist/'); ?>assets/js/jquery-2.2.4.min.js"></script>
		<script src="<?php echo base_url('dist/'); ?>assets/bootstrap/js/bootstrap.min.js"></script>
		<script>
			function base_url(str=""){
				return '<?php echo base_url() ?>'+str;
			}
		</script>
        <!--*********************************************************************************************************-->
        <!--************ HERO ***************************************************************************************-->
        <!--*********************************************************************************************************-->
        <header id="ts-hero" class="ts-full-screen ts-separate-bg-element">
            <!--NAVIGATION ******************************************************************************************-->
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top ts-separate-bg-element" data-bg-color="#141a3a">
                <div class="container">
                    <a class="navbar-brand" href="#page-top" style="font-size: 1.5em">
                        樹德科技大學學生冷氣使用權請願
                    </a>
                    <!--end navbar-brand-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!--end navbar-toggler-->
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                            <a class="nav-item nav-link active ts-scroll" href="#page-top">頂部 <span class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link ts-scroll" href="#reason">事因</a>
                            <a class="nav-item nav-link ts-scroll" href="#about-us">訴求</a>
                            <a class="nav-item nav-link ts-scroll" href="#numbers">目前進度</a>
                            <a class="nav-item nav-link ts-scroll" href="#petition">連署牆</a>
                            <a class="ts-scroll btn btn-primary btn-sm m-1 px-3 ts-width__auto" href="#from">立即參與聯署</a>
                        </div>
                        <!--end navbar-nav-->
                    </div>
                    <!--end collapse-->
                </div>
                <!--end container-->
            </nav>
            <!--end navbar-->

            <!--HERO CONTENT ****************************************************************************************-->
            <div class="container align-self-center align-items-center">
                <div class="row">
                    <div class="col-md-7">
                        <h1 data-animate="ts-fadeInUp">我們需要你的連署</h1>
                        <div data-animate="ts-fadeInUp" data-delay=".1s">
                            <p class="w-75 text-white mb-5 ts-opacity__50" style="font-size: 1.3em">總務處實施了不合理的教學大樓冷氣使用規則<br>現在的樹德全天候冷氣收費。</p>
                        </div>
                        <a href="#reason" class="btn btn-primary btn-lg ts-scroll mr-4" data-animate="ts-fadeInUp" data-delay=".2s">
                            了解事因
                            <i class="fa fa-arrow-right small ml-3 ts-opacity__50"></i>
                        </a>
                        <a href="#form" class="btn-link text-white d-inline-block" data-animate="ts-fadeInUp" data-delay=".3s">
                            <strong>立即參與聯署</strong>
                        </a>
                    </div>
                    <!--end col-md-7-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
            <!--END HERO CONTENT ************************************************************************************-->

            <!--HERO BACKGROUND *************************************************************************************-->
            <div class="ts-background" data-bg-color="#141a3a" data-bg-parallax="scroll" data-bg-parallax-speed="3">
          	</div>
            <!--END HERO BACKGROUND *********************************************************************************-->

        </header>
        <!--end #hero-->

        <!--*********************************************************************************************************-->
        <!--************ CONTENT ************************************************************************************-->
        <!--*********************************************************************************************************-->
        <main id="ts-content">
            <!--事因-->
            <?php $this->load->view('basic/reason'); ?>
            <!--事因-->
            <hr>
            <!--訴求-->
            <?php $this->load->view('basic/about'); ?>
            <!--訴求-->

            <!--計數-->
            <?php $this->load->view('basic/numbers'); ?>
            <!--計數-->

            <!--時間軸-->
            <?php $this->load->view('basic/timeLine'); ?>
            <!--時間軸-->

            <section id="subscribe" class="ts-block ts-separate-bg-element ts-background-repeat py-5" data-bg-image-opacity=".05" data-bg-color="#ecf2fe">
                <div class="container text-center">
                    <div class="ts-title mb-3">
                        <h2 class="mb-0">我們需要你的贊成票！</h2>
                    </div>
                    <!--end ts-title-->
                    <a class="ts-scroll btn btn-primary btn-sm m-1 px-3 ts-width__auto" href="#from">立即參與聯署</a>
                </div>
                <!--end container-->
            </section>

            <!--連署牆-->
            <?php $this->load->view('basic/petition'); ?>
            <!--連署牆-->
        </main>

        <!--*********************************************************************************************************-->
        <!--************ FOOTER *************************************************************************************-->
        <!--*********************************************************************************************************-->
        <footer id="ts-footer">
            <?php $this->load->view('basic/contact'); ?>
        </footer>
        <!--end #footer-->

    </div>
    <!--end page-->

	<script src="<?php echo base_url('dist/'); ?>assets/js/custom.hero.js"></script>
	<script src="<?php echo base_url('dist/'); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url('dist/'); ?>assets/js/imagesloaded.pkgd.min.js"></script>
	<script src="<?php echo base_url('dist/'); ?>assets/js/isInViewport.jquery.js"></script>
	<script src="<?php echo base_url('dist/'); ?>assets/js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url('dist/'); ?>assets/js/owl.carousel.min.js"></script>
	<script src="<?php echo base_url('dist/'); ?>assets/js/scrolla.jquery.min.js"></script>
	<script src="<?php echo base_url('dist/'); ?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url('dist/'); ?>assets/js/jquery-validate.bootstrap-tooltip.min.js"></script>
    <script src="<?php echo base_url('dist/'); ?>assets/js/custom.js"></script>

</body>
</html>
