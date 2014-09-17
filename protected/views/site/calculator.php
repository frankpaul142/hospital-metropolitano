<section class="contenido-pagina">
	<div class="contenido-interno">
    	<div class="up-calculadora">
        	<h1>CALCULADORA</h1>
            <ul>
            	<li><a href="javascript:void(0);" id="btn-controlepeso">CONTROLE SU PESO</a></li>
                <li><a href="javascript:void(0);" id="btn-embarazo">EMBARAZO</a></li>
            </ul>
        </div>
        <div id="cont-peso">
            <h1>Cálculo del índice de masa corporal</h1>
            <p class="p-calculadora">Compruebe si su peso es el apropiado para su edad, sexo, peso y altura.</p>
            <div class="partder-calculadora">
                <h3>Su peso en kg (utilice . para los decimales):</h3>
                <input type="text" placeholder="Su peso (kg)" />
                <h3>Su altura en metros (utilice . para los decimales):</h3>
                <input type="text" placeholder="Su altura (m)" />
                <h3>Su sexo:</h3>
                <select>
                    <option>Masculino</option>
                    <option>Femenino</option>
                </select>
                <input type="submit" value="Calcular IMC y Peso Ideal" class="btn-buscar"/>
                <p class="p-calculadora2">
                    <strong>Importante:</strong><br/>
                    - Debe pesarse con la menor ropa posible, sin zapatos y antes de comer.<br/>
                    - La altura debe tomarse con la espalda totalmente recta y la planta de los pies perfectamente apoyada sobre el suelo.
                </p>
            </div>
            <div class="partizq-calculadora">
                <h1>RESULTADO</h1>
                <p><strong>Su Índice de masa corporal:</strong> 21.67</p>
                <p><strong>Interpretación:</strong> Normal</p>
                <p><strong>Su Peso Ideal:</strong> Entre 54.45 y 68.06 kg</p>
            </div>
        </div>
        <div id="cont-embarazo">
            <h1>Calculadora de Embarazo</h1>
            <p class="p-calculadora">Compruebe cuando ocurrió la concepción. Seleccione la fecha del primer día de
su último periodo menstrual:</p>
            <div class="partder-calculadora2">
                		                <?php

                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'calendar',
                        'flat'=>true,//remove to hide the datepicker
                         
                        'options' => array(
                   // also opens with a button
                        'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
                             'showAnim'=>'slide',
         
        // can seelect dates in other months
                    'changeYear' => true,           // can change year
                    'changeMonth' => true,          // can change month
                    'yearRange' => '1900:2014',     // range of year
                    'minDate' => '1900-01-01',      // minimum date
                    'maxDate' => date('Y-d-m'),      // maximum date
                    'showButtonPanel' => false,      // show button panel
                     'onSelect'=>'js:function() {$("#date_picked").html($(this).val());}',
                ),
     
                'language' => 'es',
                'htmlOptions' => array(
                    'size' => '10',         // textField size
                    'maxlength' => '10',
                    'class'=>'datos-reg',
                    'readonly'=>'readonly'// textField maxlength
    ),
                ));
                        ?>
                <P ><strong>Se seleccionó la fecha:</strong><label id="date_picked"></label></P>
            </div>
            <div class="partizq-calculadora">
                <h1>RESULTADO</h1>
                <p><strong>La concepción probablemente ocurrió alrededor de:</strong> 23 de Septiembre de 2014
(Aproximadamente dos semanas después del inicio de su último periodo menstrual)</p>
				<p><strong>El periodo de mayor riesgos para defectos del nacimiento:</strong> 14 de Octubre de 2014 a 18 de Noviembre de 2014</p>
				<p>Cinco a diez semanas de gestación (el número de semanas desde su último periodo menstrual)</p>
                <p><strong>Edad del Bebé:</strong></p>
                <p>
                <strong>5 semanas de embarazo:</strong> 14 de Octubre de 2014<br/>
                <strong>10 semanas de embarazo:</strong> 18 de Noviembre de 2014<br/>
                <strong>11-14 semanas de embarazo:</strong> 2 de Diciembre de 2014<br/>
                <strong> 23 semanas de embarazo:</strong> 17 de Febrero de 2015<br/>
                <strong>27 semanas de embarazo:</strong> 17 de Marzo de 2015<br/>
                <strong>40 semanas de embarazo:</strong> 16 de Junio de 2015
                </p>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {

	/* CALCULADORA */
	$("#btn-controlepeso").click(function(){
		$("#cont-embarazo").hide();
		$("#cont-peso").fadeIn();
		});
	$("#btn-embarazo").click(function(){
		$("#cont-peso").hide();
		$("#cont-embarazo").fadeIn();
		});	

});
</script>