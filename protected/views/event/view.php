<section class="contenido-pagina">
	<div class="contenido-interno">
    	<!-- SUBMENU PAG INTERNAS -->
        <div class="submenu-interno">
        	<h1>Úlitmos Eventos</h1>
            <ul>
                <?php foreach($events as $event): ?>
                <?php if($event->id==$model->id){ ?>
                <li class="selected-opc"><?php echo strtoupper($event->title) ?></li>
                <?php }else{ ?>
            	<li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/event/view/id/<?php echo $event->id ?>"><?php echo strtoupper($event->title) ?></a></li>
                <?php } ?>
            	<?php endforeach; ?>
            </ul>
        </div>
        <!-- -->
        <div class="contenido-pag-internas">
        	<h1>Eventos Médicos</h1>
            <div class="event-img"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/events/<?php echo $event->picture ?>" alt="imagen evento"/></div>
            <div class="contenido-event">
            	<div class="tit-evento">
                	NOMBRE DEL EVENTO:
                    <span><?php echo strtoupper($model->title) ?>:</span>
                </div>
                <span class="font-tema">TEMA:</span>
                <span class="font-tit"><?php echo strtoupper($model->title) ?></span>
                <strong>LUGAR:</strong><?php echo strtoupper($model->place) ?><br/><br/>
                <strong>MODERADOR:</strong><?php echo strtoupper($model->expositor) ?><br/><br/>
                <strong>FECHA:</strong><?php echo $helper->time2str($model->register_date) ?><br/><br/>
                <strong>HORA:</strong> <?php echo date("H:i",strtotime($model->register_date)); ?> horas<br/><br/>
                <strong>EXPOSITOR:</strong> <?php echo strtoupper($model->expositor) ?>.
            </div>            
        </div>
        <!-- -->
    </div>
</section>