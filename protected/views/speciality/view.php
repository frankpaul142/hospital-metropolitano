<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
        	<h1><?php echo Yii::t('departments','department_'.$model->department->id.'_name') ?></h1>
            <ul>
                <?php foreach($model->department->specialities as $z=> $speciality):
                    $s='speciality_'.$speciality->id.'_name'; ?>
                	<?php if($speciality->id==$model->id){ ?>
                    <li class="selected-opc"><?php echo ucwords(strtolower(Yii::t('departments',$s))); ?></li>
                    <?php }else{ ?>
                    <li><a id='speciality_<?php echo $speciality->id ?>' href='<?php echo Yii::app()->request->getBaseUrl(true); ?>/speciality/view/<?php echo $speciality->id ?>'><?php echo Yii::t('departments',$s); ?></a></li>
               
            	<?php } endforeach; ?>
            </ul>
        </div>
        <!-- -->
        <div class="contenido-pag-internas">
        	<h1><?php echo Yii::t('departments','medicos'); ?></h1>
            <!-- DOCTORES -->
            <?php foreach($model->doctors as $doctor): ?>
            <div class="thumb-doctor">
            	<a class="img-doctores"  href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/doctor/view/<?php echo $doctor->id ?>">
                    <?php if($doctor->picture){ 
                        $picture = $doctor->picture;
                       
                        }else{
                            if($doctor->gender=="M"){
                           $picture= "dM.jpg"; 
                            }else{
                             $picture= "dF.jpg";    
                            }
                            
                        } ?>
                    <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/doctores/<?php echo $picture ?>" alt="img revista"/>
              
                </a>
                <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/doctor/view/<?php echo $doctor->id ?>" class="nombre-doctor"><?php echo ucwords(strtolower($doctor->name)) ?></a>
            </div> 
            <?php endforeach; ?>
            <!-- -->         
        </div>
        <!-- -->
    </div>
</section>