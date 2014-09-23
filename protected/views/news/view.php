<section class="contenido-pagina">
	<div class="contenido-interno">
    	<div class="tit-noticias"><span><?php echo Yii::t('news','title'); ?></span></div>
   	  <!-- SUBMENU PAG INTERNAS -->
      <div class="cont-noticiainterna">
      	<div class="interno-noticias-izq">
      		<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/news/<?php echo $model->picture ?>" alt="img noticia interna"/>
            <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/news">&lt; <?php echo Yii::t('news','volver'); ?></a>
        </div>
        <div class="interno-noticias">
            <h1><?php echo strtoupper(Yii::t('news','news_'.$model->id.'_title')) ?></h1>
            <p>
                <?php echo Yii::t('news','news_'.$model->id.'_description') ?>
            </p>
        </div>
      </div>
      <!-- -->
    </div>
</section>