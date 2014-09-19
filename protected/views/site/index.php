<section class="banner-home">
	<div class="fotorama" data-width="100%" data-fit="cover" data-nav="none" data-transition="dissolve" data-loop="true" data-arrows="false" data-autoplay="3000">        	
                    <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/home/home.jpg" alt="banner-home"/>
                    <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/home/home1.jpg" alt="banner-home"/>
                </div>
	<div class="img-logos">
    	<img src="<?php echo Yii::app()->request->getBaseUrl(true);?>/images/logo-01.png" alt="logo"/>
        <img src="<?php echo Yii::app()->request->getBaseUrl(true);?>/images/logo-02.png" alt="logo"/>
        <img src="<?php echo Yii::app()->request->getBaseUrl(true);?>/images/logo-03.png" alt="logo"/>
    </div>
</section>
<script type="text/javascript">
    $('#new_p').show();
    $('#head').toggleClass('h-metropolitano h-metropolitano-int');
</script>