
<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
      <div class="submenu-interno">
        	<h1><?php echo Yii::t('doctors','especialidades_doctores'); ?></h1>
            <ul>
                <?php foreach($dataProvider->getData() as $z=> $doctor):
                    $n='speciality_'.$doctor->speciality->id.'_name'; ?>
                    <li><a id='speciality_<?php echo $doctor->speciality->id ?>' href='<?php echo Yii::app()->request->getBaseUrl(true); ?>/speciality/view/<?php echo $doctor->speciality->id ?>'><?php echo Yii::t('departments',$n); ?></a></li>
            	<?php endforeach; ?>
            </ul>
        </div>
        <!-- -->
        <div class="contenido-pag-internas">
        	<h1><?php echo Yii::t('doctors','doctores'); ?></h1>
          
           <?php foreach($dataProvider->getData() as $doctor): ?> 
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
                <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/doctor/view/<?php echo $doctor->id ?>" class="nombre-doctor"><?php echo $doctor->name ?></a>
            </div> 
            <?php endforeach; ?>
        
        </div>
        <!-- -->
    </div>
</section>