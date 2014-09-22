<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
            <h1><?php echo Yii::t('menus','menu_nosotros'); ?></h1>
            <ul>
                <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'history')) ?>"><?php echo Yii::t('menus','submenu_historia'); ?></a></li>
                <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'mission')) ?>"><?php echo Yii::t('menus','submenu_mision'); ?></a></li>
                <li><a href="<?php echo $this->createUrl('site/numbers',array()) ?>"><?php echo Yii::t('menus','submenu_cifras'); ?></a></li>                       
                <li class="selected-opc"><?php echo Yii::t('menus','submenu_convenios'); ?></li>
                <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'rights')) ?>"><?php echo Yii::t('menus','submenu_derechos'); ?></a></li>
                <li><a href="<?php echo $this->createUrl('site/Authorities',array()) ?>"><?php echo Yii::t('menus','submenu_autoridades'); ?></a></li>
            </ul>
        </div>
        <!-- -->
        <div class="contenido-pag-internas">
        	<h1><?php echo Yii::t('menus','submenu_convenios'); ?></h1>
            <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/CONVENIOS.png" alt="imagen hospital"/>
            <?php echo Yii::t('conventions','text'); ?>
        </div>
        <!-- -->
    </div>
</section>