<section class="contenido-pagina">
	<div class="contenido-interno">
        <div class="foto-doctores"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/doctores/<?php echo $model->picture ?>"/></div>
        <div class="info-doctor">
            <h1><?php echo Yii::t('departments','speciality_'.$model->speciality->id.'_name') ?></h1>
            <h2><?php echo $model->name ?></h2>
              <ul>
                  <li><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-doc1.png" alt="ico doctor"/><span><?php echo $model->address ?></span></li>
                  <li><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-doc2.png" alt="ico doctor"/><span><?php echo $model->phone ?> - <?php echo $model->cellphone ?></span></li>
                  <li><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-doc3.png" alt="ico doctor"/><a href="mailto:<?php echo $model->email ?>"><?php echo $model->email ?></a></li>
              </ul>
              &nbsp;
              <br/>
               <span class="tit-celeste"><?php echo Yii::t('doctors','titulado'); ?></span><br/>
                <?php echo strtoupper($model->title) ?><br/><br/>
                <span class="tit-celeste"><?php echo Yii::t('doctors','especialidades'); ?></span><br/>
                <?php echo strtoupper($model->specialism) ?><br/><br/>
                <span class="tit-celeste"><?php echo Yii::t('doctors','fellowship'); ?></span><br/>
                <?php echo strtoupper($model->fellowship) ?>.<br/><br/>
                <span class="tit-celeste"><?php echo Yii::t('doctors','intereses'); ?></span><br/>
                <?php echo strtoupper($model->interests) ?>.
                <br/><br/>
                <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/speciality/view/id/<?php echo $model->speciality->id ?>" class="btn-volver"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-volver.png" alt="btn-volver"/></a>
            </div>
        	<!-- VIDEO DOCTORES -->
        	<div class="cont-video-doctores">
            <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/doctores/video.png" alt="video"/>
            <a href="#" id="btn-cerrar"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-cerrar.png" alt="cerrar"/></a>
            </div>
    </div>
</section>