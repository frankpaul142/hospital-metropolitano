<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
        </div>
        <!-- -->
        <div class="contenido-pag-internas">
        	<h1><?php echo Yii::t('general','revista'); ?></h1>
            <!-- REVISTA -->
            <?php foreach($dataProvider->data as $magazine):
                $n='magazine_'.$magazine->id.'_name'; ?>
                <div class="thumb-revista">
                	<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/revista/revista.jpg" alt="img revista"/>
                    <?php echo Yii::t('magazines',$n); ?> <br/>
                    <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/magazine/<?php echo $magazine->dir ?>" target='_blank'><?php echo Yii::t('magazines','ver'); ?></a>
                    <div class="btn-descargar"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-descargar.png" alt="btn descargar"/></div>
                </div> 
           <?php endforeach; ?>
          
            <!-- -->         
        </div>
        <!-- -->
    </div>
</section>