<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
            <h1><?php echo Yii::t('menus','menu_nosotros'); ?></h1>
            <ul>
                <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'history')) ?>"><?php echo Yii::t('menus','submenu_historia'); ?></a></li>
                <li class="selected-opc"><?php echo Yii::t('menus','submenu_mision'); ?></li>
                <li><a href="<?php echo $this->createUrl('site/numbers',array()) ?>"><?php echo Yii::t('menus','submenu_cifras'); ?></a></li>                       
                <li ><a href="<?php echo $this->createUrl('site/page',array('view'=>'conventions')) ?>"><?php echo Yii::t('menus','submenu_convenios'); ?></a></li>
                <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'rights')) ?>"><?php echo Yii::t('menus','submenu_derechos'); ?></a></li>
                <li><a href="<?php echo $this->createUrl('site/Authorities',array()) ?>"><?php echo Yii::t('menus','submenu_autoridades'); ?></a></li>
            </ul>
        </div>
        <!-- -->
        <div class="contenido-pag-internas">
        	<h1><?php echo Yii::t('menus','submenu_mision'); ?></h1>
            <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/MISIONYVISION.png" alt="imagen hospital"/>
            <span>
                <strong><?php echo Yii::t('mission','mision_title'); ?></strong><br/>
                <?php echo Yii::t('mission','mision_text'); ?><br/><br/>
                <strong><?php echo Yii::t('mission','vision_title'); ?></strong><br/> 
                <?php echo Yii::t('mission','vision_text'); ?>
            </span>
        </div>
        <!-- -->
    </div>
</section>