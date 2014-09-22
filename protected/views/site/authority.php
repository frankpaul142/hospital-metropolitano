<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
        	<h1><?php echo Yii::t('menus','menu_nosotros'); ?></h1>
            <ul>
                <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'history')) ?>"><?php echo Yii::t('menus','submenu_historia'); ?></a></li>
                <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'mission')) ?>"><?php echo Yii::t('menus','submenu_mision'); ?></a></li>
                <li><a href="<?php echo $this->createUrl('site/numbers',array()) ?>"><?php echo Yii::t('menus','submenu_cifras'); ?></a></li>                       
                <li ><a href="<?php echo $this->createUrl('site/page',array('view'=>'conventions')) ?>"><?php echo Yii::t('menus','submenu_convenios'); ?></a></li>
                <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'rights')) ?>"><?php echo Yii::t('menus','submenu_derechos'); ?></a></li>
                <li class="selected-opc"><?php echo Yii::t('menus','submenu_autoridades'); ?></li>
            </ul>
        </div>
        <!-- -->
        <div class="contenido-pag-internas">
        	<h1><?php echo Yii::t('menus','submenu_autoridades'); ?></h1>
            <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/AUTORIDADES.png" alt="imagen hospital"/>
            <table width="100%" cellpadding="0" cellspacing="0">
            	
                <?php foreach($authorities as $authority): 
                $c='authority_'.$authority->id.'_charge'; ?>
                <tr>
                	<td class="border-tb"><?php echo $authority->name; ?></td>
                    <td class="border-tb"><?php echo Yii::t('authorities',$c); ?></td>
                     <td><a href="mailto:<?php echo $authority->email  ?>" class="btn-mails"><?php echo $authority->email ?></a></td>
                </tr>
               <?php endforeach; ?>
           
           </table>
        </div>
        <!-- -->
    </div>
</section>