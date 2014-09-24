<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
        	<h1><?php echo Yii::t('firstaid','title'); ?></h1>
            <ul>
                <?php foreach($firstaids as $firstaid):
                    $n=$firstaid->id.'_title';
                    if($firstaid->id==$model->id){ ?>
                        <li class="selected-opc"><?php echo ucwords(strtolower(Yii::t('firstaid',$n))) ?></li>
                    <?php }else{ ?>
                    <li><a href="<?php echo $this->createUrl('FirstAid/view',array('id'=>$firstaid->id)) ?>"><?php echo ucwords(strtolower(Yii::t('firstaid',$n))) ?></a></li>
                <?php } endforeach; ?>
            </ul>
        </div>
        <!-- -->
        <div class="contenido-pag-internas">
        	<h1><?php echo ucwords(strtolower(Yii::t('firstaid',$model->id.'_title'))) ?></h1>
            <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/firstaid/<?php echo $model->picture ?>" alt="imagen hospital"/>
            <p class='content-int'>
               <?php echo Yii::t('firstaid',$model->id.'_description') ?> 
            </p>
        </div>
        <!-- -->
    </div>
</section>