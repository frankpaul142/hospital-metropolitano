<section class="contenido-pagina">
	<div class="contenido-interno">
    	<div class="tit-noticias"><span>NOTICIAS</span></div>
   	  <!-- SUBMENU PAG INTERNAS -->
      <div class="cont-noticiainterna">
      	<div class="interno-noticias-izq">
      		<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/news/<?php echo $model->picture ?>" alt="img noticia interna"/>
            <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/news">&lt; VOLVER</a>
        </div>
        <div class="interno-noticias">
            <h1><?php echo strtoupper($model->title) ?></h1>
            <p>
                <?php echo $model->description ?>
            </p>
        </div>
      </div>
      <!-- -->
    </div>
</section>