<section class="contenido-pagina">
    <div class="contenido-interno">
<?php foreach($dataProvider->data as $interview): ?>
     <div class="thumb-doctor" style="width: auto;height: auto;float: left;min-height:0px;">
         <span><?php echo $interview->title ?></span><br>
         <span><?php echo $helper->time2str($interview->registration_date) ?></span><br>
         <span>Entrevistado:</span> <span><?php echo $interview->interviewee ?></span><br>
 <audio controls>
 
  <source src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/media/interview/<?php echo $interview->media ?>" type="audio/mpeg">
Tu explorador no soporta reproducción de audio con HTML5. Porfavor actualizalo.
</audio> 
     </div>
<?php endforeach; ?>    
    </div>
</section>

