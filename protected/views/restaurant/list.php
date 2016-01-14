<div id="foods"  class=" clearfix grid">
<?php foreach($models as $model): ?>
			
				<figure class='effect-oscar  wowload fadeInUp'>
                          <img src='<?php echo $model->getProfileImage()->getUrl(); ?>' alt='<?php echo $model->name; ?>' style='width:441px;height:286px'/>
                          <figcaption>
                              <h2><?php echo $model->name; ?></h2>
                              <p><?php echo $model->address; ?><br>
                              <a href='<?php echo $this->createUrl('update',array('id'=>$model->id)); ?>'>See Menu Available </a></p>            
                          </figcaption>
                      </figure>
								
                     
			<?php endforeach;?>
	</div>