<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- start: Meta -->
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- end: Mobile Specific -->

	<!-- start: CSS -->
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/style.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->baseUrl; ?>/css/theme.css" rel="stylesheet">
    <link
        href="<?php echo Yii::app()->baseUrl; ?>/resources/font-awesome/css/font-awesome.min.css"
        rel="stylesheet">
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap-wysihtml5.css"
          rel="stylesheet">
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/flatelements.css" rel="stylesheet">
    <!-- end: CSS -->
	
	 <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/html5shiv.js"></script>
    <link id="ie-style" href="<?php echo Yii::app()->baseUrl; ?>/css/ie.css" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="<?php echo Yii::app()->baseUrl; ?>/css/ie9.css" rel="stylesheet">
    <![endif]-->

    <!-- start: JavaScript -->
	

	<!-- wow script -->
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/wow/wow.min.js"></script>


	<!-- boostrap -->
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

	<!-- jquery mobile -->
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/mobile/touchSwipe.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/respond/respond.js"></script>

	<!-- gallery -->
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/gallery/jquery.blueimp-gallery.min.js"></script> 

	<!-- custom script -->
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/script.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/ekko-lightbox-modified.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/modernizr.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.cookie.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.highlight.min.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.autosize.min.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.timeago.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/locales/jquery.timeago.<?php echo Yii::app()->locale->getLanguageId(Yii::app()->language); ?>.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.knob.min.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap3-wysihtml5.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.flatelements.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.placeholder.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.iframe-transport.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.ui.widget.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.fileupload.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.color-2.1.0.min.js"></script>

    <!-- start: render additional head (css and js files) -->
    <?php //$this->renderPartial('//layouts/head'); ?>

    <!-- end: render additional head -->
	
	<!-- Global app functions -->
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/app.js"></script>
    <!-- end: JavaScript -->

	</head>

<body>


	<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="<?php echo Yii::app()->createUrl(''); ?>" id="text-logo">
				  <h4> <?php echo CHtml::encode(Yii::app()->name); ?></h4>
    </a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              
                 <?php $this->widget('zii.widgets.CMenu',array(
									'items'=>array(
									array('label'=>'Home', 'url'=>array('/site/index')),
									array('label'=>'Restaurants', 'url'=>array('/restaurant/index')),
									array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
									array('label'=>'Contact', 'url'=>array('/site/contact')),
									array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
									array('label'=>'Register', 'url'=>array('/user/registration'), 'visible'=>Yii::app()->user->isGuest),
									array('label'=>'Profile', 'url'=>array('/user/profile'), 'visible'=>!Yii::app()->user->isGuest),
									array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
									),
									'htmlOptions'=>array('class'=>'nav navbar-nav navbar-right scroll'),
									)); ?>


              
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>
<!-- #Header Ends -->
	<div class='container putspace'>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
		
	
	<!-- start: show content (and check, if exists a sublayout -->
<?php if (isset($this->subLayout) && $this->subLayout != "") : ?>
    <?php echo $this->renderPartial($this->subLayout, array('content' => $content)); ?>
<?php else: ?>
    <?php echo $content; ?>
<?php endif; ?>
<!-- end: show content -->
	</div>
	
<div class="clear"></div>

	<!-- Footer Starts -->
<div class="footer text-center spacer">
<p class="wowload flipInX"><a href="#"><i class="fa fa-facebook fa-2x"></i></a> <a href="#"><i class="fa fa-instagram fa-2x"></i></a> <a href="#"><i class="fa fa-twitter fa-2x"></i></a> <a href="#"><i class="fa fa-flickr fa-2x"></i></a> </p>
Copyright &copy; <?php echo date('Y'); ?> by YoungWorld Nigeria.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
</div>
<!-- # Footer Ends --><!-- footer -->

<!-- start: Modal (every lightbox will/should use this construct to show content)-->
<div class="modal" id="globalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="loader">
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: Modal -->

<script type="text/javascript">
    // Replace the standard checkbox and radio buttons
    $('body').find(':checkbox, :radio').flatelements();
</script>

<?php //echo HSetting::GetText('trackingHtmlCode'); ?>
</body>
</html>
