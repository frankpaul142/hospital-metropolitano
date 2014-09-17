<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
          
            <h1><?php echo $model->service->name ?></h1>
          
        	
            <ul>
            		  <?php foreach($model->service->modules as $z=> $module): ?>
                         
            	<?php if($module->id==$model->id){ ?>
                <li class="selected-opc"><?php echo ucwords(strtolower($module->name)); ?></li>
                <?php }else{ ?>
              
                <li><a id='module_<?php echo $module->id ?>' href='<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/moduleview/id/<?php echo $module->id ?>'><?php echo $module->name; ?></a></li>
                
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