<div class="image-upload-container profile-user-photo-container" id="image-container" style="width: 250px; height: 250px;" >

            <?php
            /* Get original profile image URL */

            $profileImageExt = pathinfo($user->getProfileImage()->getUrl(), PATHINFO_EXTENSION);

            $profileImageOrig = preg_replace('/.[^.]*$/', '', $user->getProfileImage()->getUrl());
            $defaultImage = (basename($user->getProfileImage()->getUrl()) == 'default_user.jpg' || basename($user->getProfileImage()->getUrl()) == 'default_user.jpg?cacheId=0') ? true : false;
            $profileImageOrig = $profileImageOrig . '_org.' . $profileImageExt;

            if (!$defaultImage) {
                ?>

                <!-- profile image output-->
                <a data-toggle="lightbox" data-gallery="" href="<?php echo $profileImageOrig; ?>#.jpeg"  data-footer='<button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo Yii::t('FileModule.widgets_views_showFiles', 'Close'); ?></button>'>
                    <img class="img-rounded profile-user-photo" id="user-profile-image"
                         src="<?php echo $user->getProfileImage()->getUrl(); ?>"
                         data-src="holder.js/250x250" alt="140x140" style="width: 250px; height: 250px; padding-top: 25px"/>
                </a>
		<div style='margin-top:0px;background-color:#333;color:#fff;width:250px;height:50px'><h3>Brand Image or Logo</h3></div>

            <?php } else { ?>

                <img class="img-rounded profile-user-photo" id="user-profile-image"
                     src="<?php echo $user->getProfileImage()->getUrl(); ?>"
                     data-src="holder.js/250x250" alt="250x250" style="width: 250px; height: 250px; padding-top: 25px"/>
			<div style='margin-top:0px;background-color:#333;color:#fff;width:250px;height:50px'><h3>Brand Image or Logo</h3></div>
            <?php } ?>

            <!-- check if the current user is the profile owner and can change the images -->
            <?php if ($isProfileOwner) { ?>
                <form class="fileupload" id="profilefileupload" action="" method="POST" enctype="multipart/form-data"
                      style="position: absolute; top: 0; left: 0; opacity: 0; height: 250px; width: 250px;">
                    <input type="file" name="passportfiles[]">
					<?php //echo CHtml::hiddenField('guid',$user->guid); ?>
                </form>

                <div class="image-upload-loader" id="profile-image-upload-loader" style="padding-top: 60px;">
                    <div class="progress image-upload-progess-bar" id="profile-image-upload-bar">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="00"
                             aria-valuemin="0"
                             aria-valuemax="100" style="width: 0%;">
                        </div>
                    </div>
                </div>

                <div class="image-upload-buttons" id="profile-image-upload-buttons">
                    <a href="#" onclick="javascript:$('#profilefileupload input').click();" class="btn btn-info btn-sm"><i
                            class="fa fa-cloud-upload"></i></a>
                    <a id="profile-image-upload-edit-button"
                       style="<?php
                       if (!$user->getProfileImage()->hasImage()) {
                           echo 'display: none;';
                       }
                       ?>"
                       href="<?php echo Yii::app()->createUrl('//user/student/cropPassportImage'); ?>"
                       class="btn btn-info btn-sm" data-toggle="modal" data-target="#globalModal"><i
                            class="fa fa-edit"></i></a> 
                        <?php
                        $this->widget('application.widgets.ModalConfirmWidget', array(
                            'uniqueID' => 'modal_profileimagedelete',
                            'linkOutput' => 'a',
                            'title' => Yii::t('UserModule.widgets_views_deleteImage', '<strong>Confirm</strong> image deleting'),
                            'message' => Yii::t('UserModule.widgets_views_deleteImage', 'Do you really want to delete this photograph?'),
                            'buttonTrue' => Yii::t('UserModule.widgets_views_deleteImage', 'Delete'),
                            'buttonFalse' => Yii::t('UserModule.widgets_views_deleteImage', 'Cancel'),
                            'linkContent' => '<i class="fa fa-times"></i>',
                            'class' => 'btn btn-danger btn-sm',
                            'style' => $user->getProfileImage()->hasImage() ? '' : 'display: none;',
                            'linkHref' => $this->createUrl("//user/student/deletePassportImage", array('type' => 'passport')),
                            'confirmJS' => 'function(jsonResp) { resetProfileImage(jsonResp); }'
                        ));
                        ?>
                </div>
            <?php } ?>
	
        </div>
		
		<!-- start: Error modal -->
<div class="modal" id="uploadErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-extra-small animated pulse">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"
                    id="myModalLabel"><?php echo Yii::t('UserModule.widgets_views_profileHeader', '<strong>Something</strong> went wrong'); ?></h4>
            </div>
            <div class="modal-body text-center">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"
                        data-dismiss="modal"><?php echo Yii::t('UserModule.widgets_views_profileHeader', 'Ok'); ?></button>
            </div>
        </div>
    </div>
</div>