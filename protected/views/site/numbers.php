<section class="contenido-pagina">
    <div class="contenido-interno">
        <!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
            <h1><?php echo Yii::t('menus','menu_nosotros'); ?></h1>
            <ul>
                <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'history')) ?>"><?php echo Yii::t('menus','submenu_historia'); ?></a></li>
                <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'mission')) ?>"><?php echo Yii::t('menus','submenu_mision'); ?></a></li>
                <li class="selected-opc"><?php echo Yii::t('menus','submenu_cifras'); ?></li>                       
                <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'conventions')) ?>"><?php echo Yii::t('menus','submenu_convenios'); ?></a></li>
                <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'rights')) ?>"><?php echo Yii::t('menus','submenu_derechos'); ?></a></li>
                <li><a href="<?php echo $this->createUrl('site/Authorities',array()) ?>"><?php echo Yii::t('menus','submenu_autoridades'); ?></a></li>
            </ul>
        </div>
        <div class="contenido-pag-internas">
            <h1><?php echo Yii::t('menus','submenu_cifras'); ?></h1>
            <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/HOSPITALENCUFRAS.png" /><br/><br/>
            <?php foreach ($numbers as $i => $number) {
                $f='numbers_'.$number->id.'_field';
                if ($number->title=='Yes') {
                    if ($i!=0) { ?>
                        </tbody>
                        </table>
                        <br />
                    <?php } ?>
                    <table cellspacing="0" cellpadding="0">
                        <colgroup>
                            <col width="610">
                            <col width="232">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td width="610"><strong><?php echo Yii::t('numbers',$f); ?></strong></td>
                                <td align="right"><?php echo $number->number; ?></td>
                            </tr>
                <?php } else { ?>
                            <tr>
                                <td><?php echo Yii::t('numbers',$f); ?></td>
                                <td align="right"><?php echo $number->number; ?></td>
                            </tr>
                <?php }
            } ?>
            </tbody>
            </table>
            <br/><br/>
        </div>
    </div>
</section>