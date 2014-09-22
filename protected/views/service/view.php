<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
            <?php if($model->type=='EDUCATION'){ ?>
                <h1><?php echo Yii::t('menus','menu_educacion'); ?></h1>
            <?php }else{ ?>
                <h1><?php echo Yii::t('menus','menu_servicios'); ?></h1>
            <?php } ?>
        	
            <ul>
                <?php foreach($services as $z=> $service):
                    $n='services_'.$service->id.'_name'; ?>
                    <?php if($service->id==$model->id){ ?>
                        <li class="selected-opc"><?php echo ucwords(strtolower(Yii::t('services',$n))); ?></li>
                    <?php }else{ ?>
                        <?php if($type=='EDUCATION'){ ?>
                            <li><a id='service_<?php echo $service->id ?>' href='<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/view/id/<?php echo $service->id ?>/education/1'><?php echo Yii::t('services',$n); ?></a></li>
                        <?php }else{ ?>
                            <li><a id='service_<?php echo $service->id ?>' href='<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/view/id/<?php echo $service->id ?>'><?php echo Yii::t('services',$n); ?></a></li>
                    <?php } ?>
            	<?php } endforeach; ?>
            </ul>
        </div>
        <!-- -->
        <div class="contenido-pag-internas">
        	<h1><?php echo Yii::t('services','services_'.$model->id.'_name'); ?></h1>
            <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/service/<?php echo $model->picture ?>" alt="imagen hospital"/>
            <span>
          <?php echo Yii::t('services','services_'.$model->id.'_description'); ?>
            </span>
        </div>
        <!-- -->
    </div>
</section>