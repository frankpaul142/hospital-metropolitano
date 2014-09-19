<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
        	<h1>Nosotros</h1>
            <ul>
            	<li ><a href="<?php echo $this->createUrl('site/page',array('view'=>'history')) ?>">HISTORIA</a></li>
                        <li class="selected-opc">MISIÓN Y VISIÓN</li>
                        <li ><a href="<?php echo $this->createUrl('site/page',array('view'=>'crifas')) ?>">HOSPITAL EN CIFRAS</a></li>
                        <li ><a href="<?php echo $this->createUrl('site/page',array('view'=>'conventions')) ?>">CONVENIOS</a></li>
                        <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'rights')) ?>">DERECHOS Y OBLIGACIONES</a></li>
                        <li><a href="<?php echo $this->createUrl('site/Authorities',array()) ?>">AUTORIDADES</a></li>
            </ul>
        </div>
        <!-- -->
        <div class="contenido-pag-internas">
        	<h1>MISIÓN Y VISIÓN</h1>
            <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/MISIONYVISION.png" alt="imagen hospital"/>
            <span>
            <strong>MISION:</strong><br/>
En el mejor hospital del Ecuador, cuidamos la vida de nuestros pacientes y luchamos día a día por mejorar su salud.<br/><br/>
<strong>VISIÓN:</strong><br/> 
Ser referente de excelencia en servicios de salud en Latinoamérica.<br/><br/>
<strong>VALORES INSTITUCIONALES</strong>
<ul><li>Respeto al ser humano</li>
<li>Integridad</li>
<li>Excelencia</li></ul><br/>
<strong>VALORES DE SERVICIO</strong>
<ul><li>Seguridad</li>
<li>Calidad</li>
<li>Eficiencia</li>
<li>Calidez</li></ul>
            </span>
        </div>
        <!-- -->
    </div>
</section>