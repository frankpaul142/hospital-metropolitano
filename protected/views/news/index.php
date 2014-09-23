<section class="contenido-pagina">
	<div class="contenido-interno">
    	<div class="tit-noticias"><span><?php echo Yii::t('news','title'); ?></span>
           <?php $this->widget('CLinkPager', array(
		'pages' => $pages,
		'maxButtonCount'=>4,
				
)) ?>
        </div>
   	  <!-- SUBMENU PAG INTERNAS -->
          <?php foreach($news as $new):
            $n='news_'.$new->id.'_title';
            $d='news_'.$new->id.'_description'; ?>
        <div class="noticia-seleccion">
        	<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/news/<?php echo $new->picture ?>" alt="img noticias"/>
            <div class="contenedor-noticias">
            	<h1><?php echo Yii::t('news',$n) ?></h1>
                
             <p><?php echo ucfirst(strtolower(strip_tags(substr(Yii::t('news',$d), 0, 90)))) ?>...</p>
                <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/news/view/id/<?php echo $new->id ?>"><?php echo Yii::t('news','leer'); ?></a>
            </div>
        </div>
          <?php endforeach; ?>
        <!-- -->
        
        <!-- -->
    </div>
</section>