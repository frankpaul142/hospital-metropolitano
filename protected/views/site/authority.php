<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
        	<h1>Nosotros</h1>
            <ul>
            <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'history')) ?>">HISTORIA</a></li>
                        <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'mission')) ?>">MISIÓN Y VISIÓN</a></li>
                        <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'crifas')) ?>">HOSPITAL EN CRIFAS</a></li>                       
                        <li ><a href="<?php echo $this->createUrl('site/page',array('view'=>'conventions')) ?>">CONVENIOS</a></li>
                        <li><a href="<?php echo $this->createUrl('site/page',array('view'=>'rights')) ?>">DERECHOS Y OBLIGACIONES</a></li>
                         <li class="selected-opc">AUTORIDADES</li>
            </ul>
        </div>
        <!-- -->
        <div class="contenido-pag-internas">
        	<h1>AUTORIDADES</h1>
            <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/img-autoridades.jpg" alt="imagen hospital"/>
            <table width="100%" cellpadding="0" cellspacing="0">
            	
                <?php foreach($authorities as $authority): ?>
                <tr>
                	<td class="border-tb"><?php echo $authority->name; ?></td>
                    <td class="border-tb"><?php echo $authority->charge ?></td>
                     <td><a href="mailto:<?php echo $authority->email  ?>" class="btn-mails"><?php echo $authority->email ?></a></td>
                </tr>
               <?php endforeach; ?>
           
           </table>
        </div>
        <!-- -->
    </div>
</section>