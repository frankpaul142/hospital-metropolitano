<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
                <?php if($model->type=='EDUCATION'){ ?>
            <h1>Educación e Información</h1>
                <?php }else{ ?>
            <h1>Servicios</h1>
                <?php } ?>
        	
            <ul>
            		  <?php foreach($services as $z=> $service): ?>
                         
            	<?php if($service->id==$model->id){ ?>
                <li class="selected-opc"><?php echo ucwords(strtolower($service->name)); ?></li>
                <?php }else{ ?>
                <?php if($type=='EDUCATION'){ ?>
                <li><a id='service_<?php echo $service->id ?>' href='<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/view/id/<?php echo $service->id ?>/education/1'><?php echo $service->name; ?></a></li>
                <?php }else{ ?>
                
                <li><a id='service_<?php echo $service->id ?>' href='<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/view/id/<?php echo $service->id ?>'><?php echo $service->name; ?></a></li>
               
                <?php } ?>
            	<?php } endforeach; ?>
            </ul>
        </div>
        <!-- -->
        <div class="contenido-pag-internas">
        	<h1><?php echo $model->name; ?></h1>
            <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/service/<?php echo $model->picture ?>" alt="imagen hospital"/>
            <span>
          <?php  echo $model->description ?>
            </span>
        </div>
        <!-- -->
    </div>
</section>