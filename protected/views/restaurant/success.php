<?php
	$profileImageExt = pathinfo($restaurant->getProfileImage()->getUrl(), PATHINFO_EXTENSION);

	$profileImageOrig = preg_replace('/.[^.]*$/', '', $restaurant->getProfileImage()->getUrl());
            //$defaultImage = (basename($user->getProfileImage()->getUrl()) == 'default_user.jpg' || basename($user->getProfileImage()->getUrl()) == 'default_user.jpg?cacheId=0') ? true : false;
    $profileImageOrig = $profileImageOrig . '_org.' . $profileImageExt;

?>

<div class='clearfix'><div id='arrow' class='pull-left'></div><h1>Success</h1></div>
<p class="note">Your Restaurant has been successfully created. Here are your details.</p>
<div class='row'>
	
	<div class="col-md-3">
     <a data-toggle="lightbox" data-gallery="" href="<?php echo $profileImageOrig; ?>#.jpeg"  data-footer='<button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo Yii::t('FileModule.widgets_views_showFiles', 'Close'); ?></button>'>
                    <img class="img-rounded profile-user-photo" id="user-profile-image"
                         src="<?php echo $restaurant->getProfileImage()->getUrl(); ?>"
                         data-src="holder.js/250x250" alt="140x140" style="width: 250px; height: 250px;"/>
                </a>
</div>
<div class='col-md-6'>
	<h1 style="margin-top:0px;"><?php echo $restaurant->name; ?></h1>
	<div><i class='fa fa-map-marker'></i><?php echo '  '.$restaurant->address; ?></div>
	<div><i class='fa fa-envelope'></i><?php echo '  '.$restaurant->email; ?></div>
	<div><i class='fa fa-phone'></i><?php echo '  '.$restaurant->phone; ?></div>
	<div><i class='fa fa-key'></i><?php echo '  '.$restaurant->key; ?></div>
	<span class="fa-stack fa-5x">
  <i class="fa fa-shopping-cart fa-stack-3x"></i>
  <i class="fa fa-cutlery fa-stack"></i>
</span>
<?php //$this->renderPartial('_form', array('model'=>$model)); ?>
</div>
	<div class='col-md-2'></div>

</div>