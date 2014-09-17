<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
        	<h1>Primeros Auxilios</h1>
            <ul>
                <?php foreach($firstaids as $firstaid): ?>
                <?php if($firstaid->id==$model->id){ ?>
                <li class="selected-opc"><?php echo ucwords(strtolower($firstaid->title)) ?></li>
                <?php }else{ ?>
                <li><a href="<?php echo $this->createUrl('FirstAid/view',array('id'=>$firstaid->id)) ?>"><?php echo ucwords(strtolower($firstaid->title)) ?></a></li>
                <?php } endforeach; ?>
            </ul>
        </div>
        <!-- -->
        <div class="contenido-pag-internas">
        	<h1><?php echo ucwords(strtolower($model->title)) ?></h1>
            <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/firstaid/<?php echo $model->picture ?>" alt="imagen hospital"/>
            <p class='content-int'>
               <?php echo $model->description ?> 
            </p>
        </div>
        <!-- -->
    </div>
</section>