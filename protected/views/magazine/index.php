<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
        	<h1>Nosotros</h1>
            <ul>
            	<li class="selected-opc">HISTORIA</li>
            	<li><a href="#">POSTGRADOS</a></li>
            	<li><a href="#">PREGRADOS</a></li>
            	<li><a href="#">EVENTOS MÉDICOS</a>
                	<ul class="submenu-interno2">
                    	<li><a href="#">Eventos Médicos</a></li>
                        <li><a href="#">Revista Látidos</a></li>
                        <li><a href="#">Entrevistas</a></li>
                    </ul>
                </li>
            	<li><a href="#">CONVENIOS</a></li>
            </ul>
        </div>
        <!-- -->
        <div class="contenido-pag-internas">
        	<h1>Revista Latidos</h1>
            <!-- REVISTA -->
            <?php foreach($dataProvider->data as $magazine): ?>
            <div class="thumb-revista">
            	<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/revista/revista.jpg" alt="img revista"/>
                <?php echo $magazine->name; ?> <br/>
                <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/magazine/<?php echo $magazine->dir ?>" target='_blank'>Ver</a>
                <div class="btn-descargar"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-descargar.png" alt="btn descargar"/></div>
            </div> 
           <?php endforeach; ?>
          
            <!-- -->         
        </div>
        <!-- -->
    </div>
</section>