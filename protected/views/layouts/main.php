<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Bienvenido al Complejo Médico más completo del Ecuador"/>
        <meta name="keywords" content="hospital,metropolitano,menús,superiores, salud, hospital, emergencia, médicos, medicina"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

        <link rel="shortcut icon" href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/favicon.ico"/>
        <title>
            <?php
            if (isset($this->pageTitle)) {
                echo $this->pageTitle;
            } else {
                echo "HOSPITAL METROPOLITANO";
            }
            ?>
        </title>

        <link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/css-hospital.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/queries-hospital.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/fotorama.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/js/fotorama.js"></script>
        <script>
            $(document).ready(function () {
                $(".btn-mobil").click(function () {
                    $(".menu-tablets").slideToggle();
                });
                $('.menu-tablets li a').click(function () {
                    var elem = $(this).next(event);
                    if (elem.is('ul')) {
                        event.preventDefault();
                        $('#menu ul:visible').not(elem).slideUp();
                        elem.slideToggle();
                    }
                });
            });
        </script>
    </head>

    <body>
        <!-- HEADER - MENU -->
        <?php
        $departments = Department::model()->findAllbyattributes(array('status' => 'ACTIVE'));
        $search = new Doctor;
        $criterianews = new CDbCriteria;
        $criterianews->order = 'id DESC';
        $criterianews->limit = 2;
        $criterianews2 = new CDbCriteria;
        $criterianews2->order = 'RAND()';

        $news = News::model()->findByAttributes(array('status' => 'ACTIVE'), $criterianews2);
        $twonews = News::model()->findAllByAttributes(array('status' => 'ACTIVE'), $criterianews);
        $specialities = Speciality::model()->findAll(
                array('order' => 'id'));

// format models as $key=>$value with listData
        $list = CHtml::listData($specialities, 'id', 'name');
        $services = Service::model()->findAllbyAttributes(array('type' => 'SERVICE'));
        ?>
        <header id='head' class="h-metropolitano-int" >
            <section class="cont-menu">
                <div class="logo-hm"><a href='<?php echo Yii::app()->request->getBaseUrl(true); ?>'><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/logo-hm.png" alt="logo hospital metropolitano"/></a></div>
                <div class="btn-mobil"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-mobil.jpg" alt="btn mobile"/></div>
                <!-- -->
                <nav class="nav-metropolitano">
                    <ul class="nav-submenu">
                        <li><a href="#">Nosotros</a>
                            <ul class="nav-submenu1">
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'history')) ?>">Historia</a></li>
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'mission')) ?>">Misión y Visión</a></li>
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'crifas')) ?>">Hospital en Crifas</a></li>
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'conventions')) ?>">Convenios</a></li>
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'rights')) ?>">Derechos y Obligaciones</a></li>
                                <li><a href="<?php echo $this->createUrl('site/Authorities', array()) ?>">Autoridades</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Servicios</a>
                            <ul class="nav-submenu1">

<?php foreach ($services as $service): ?>
    <?php if ($service->modules) { ?>
                                        <li><a href="#"><?php echo ucwords(strtolower($service->name)) ?></a>
                                            <ul class="nav-submenu2">
                                        <?php foreach ($service->modules as $module): ?>    
                                                    <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/moduleview/<?php echo $module->id ?>"><?php echo ucwords(strtolower($module->name)) ?></a></li>
                                        <?php endforeach; ?>
                                            </ul>
                                        </li>
                                            <?php }else { ?>
                                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/view/<?php echo $service->id ?>"><?php echo ucwords(strtolower($service->name)) ?></a>

                                        </li>
    <?php } ?>
                                <?php endforeach; ?>
                            </ul>


                        </li>
                        <li><a href="#">Nuestros Médicos</a>
                            <ul class="nav-submenu1">
                                <li>Departamento de:</li>
<?php foreach ($departments as $department): ?>
    <?php foreach ($department->specialities as $speciality): ?>    
                                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/speciality/view/<?php echo $speciality->id ?>"><?php echo ucwords(strtolower($department->name)) ?></a>
        <?php break; ?>
    <?php endforeach; ?>	
                                        <ul class="nav-submenu2">
                                    <?php foreach ($department->specialities as $speciality): ?>    
                                                <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/speciality/view/<?php echo $speciality->id ?>"><?php echo ucwords(strtolower($speciality->name)) ?></a></li>
                                        <?php endforeach; ?>
                                        </ul>
                                    </li>
                                        <?php endforeach; ?>
                            </ul>	
                        </li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/view/id/8/education/1">Educación e Información</a></li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/event/view/id/1">Eventos</a></li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/news">Noticias</a></li>
                        <li><a href="http://laboratorio.hmetro.med.ec/">Bienestar</a></li>
                    </ul>
                </nav>
                <!-- -->
                <section class="menu-tablets">
                    <ul class="nav-submenu-mob">
                        <li><a href="#">Nosotros</a>
                            <ul class="nav-submenu1-mob">
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'history')) ?>">Historia</a></li>
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'mission')) ?>">Misión y Visión</a></li>
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'crifas')) ?>">Hospital en Crifas</a></li>
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'conventions')) ?>">Convenios</a></li>
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'rights')) ?>">Derechos y Obligaciones</a></li>
                                <li><a href="<?php echo $this->createUrl('site/Authorities', array()) ?>">Autoridades</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Servicios</a>
                            <ul class="nav-submenu1-mob">

<?php foreach ($services as $service): ?>
    <?php if ($service->modules) { ?>
                                        <li><a href="#"><?php echo ucwords(strtolower($service->name)) ?></a>
                                            <ul class="nav-submenu2-mob">
        <?php foreach ($service->modules as $module): ?>    
                                                    <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/moduleview/<?php echo $module->id ?>"><?php echo ucwords(strtolower($module->name)) ?></a></li>
                                        <?php endforeach; ?>
                                            </ul>
                                        </li>
                                            <?php }else { ?>
                                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/view/<?php echo $service->id ?>"><?php echo ucwords(strtolower($service->name)) ?></a>

                                        </li>
    <?php } ?>
                                <?php endforeach; ?>
                            </ul>


                        </li>
                        <li><a href="#">Nuestros Médicos</a>
                            <ul class="nav-submenu1-mob">
                                <li>Departamento de:</li>
<?php foreach ($departments as $department): ?>
    <?php foreach ($department->specialities as $speciality): ?>    
                                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/speciality/view/<?php echo $speciality->id ?>"><?php echo ucwords(strtolower($department->name)) ?></a>
        <?php break; ?>
    <?php endforeach; ?>	
                                        <ul class="nav-submenu2-mob">
                                    <?php foreach ($department->specialities as $speciality): ?>    
                                                <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/speciality/view/<?php echo $speciality->id ?>"><?php echo ucwords(strtolower($speciality->name)) ?></a></li>
                                        <?php endforeach; ?>
                                        </ul>
                                    </li>
                                        <?php endforeach; ?>
                            </ul>	
                        </li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/view/id/8/education/1">Educación e Información</a></li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/event/view/id/1">Eventos</a></li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/news">Noticias</a></li>
                        <li><a href="http://laboratorio.hmetro.med.ec/">Bienestar</a></li>
                    </ul>
                </section>
                <!-- -->
                <div class="position-login">
                    <div class="pos-login" style="background: none;">
                        <!--                    <a href="#">LOGIN</a> / <a href="#">REGISTRATE</a>-->
                    </div>
                    <div class="pos-buscar" style="background: none;">
                     <!--    <input type="text" class="input-buscar"/>-->
                    </div>
                    <div id="new_p" class="pos-bnoticia" style='display: none;'>
                        <div class="noticia-principal" >
                            <h1><?php echo ucwords($news->title) ?></h1>
                            <span><?php echo strip_tags(substr($news->description, 0, 60)) ?>...</span>
                            <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/news/view/id/<?php echo $news->id ?>">LEER MÁS</a>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <!-- -->
<?php echo $content; ?>


        <section id="new_p" class="banner-promo" style="display:hidden;">
            <div class="info-promo">
                <div class="fotorama" data-width="100%" data-fit="cover" data-nav="none" data-transition="dissolve" data-loop="true" data-arrows="false" data-autoplay="7000">        	
                    <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/PUBLICIDADHOME.png" alt="banners metropolitano"/>
                </div>
            </div>
            <div class="info-promo2">
                <div class="tit-promo2"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/tit-promo2.jpg" alt="tit promo"/><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/banner-promo.jpg" alt="banner promocion"/></div>
            </div>
        </section>
        <!-- CIERRE -->
        <section class="cierre-web">
            <div class="cierre-tam">
                <!-- NOTICIAS -->
                <div class="noticias-home">
                    <h2>NOTICIAS</h2>
<?php foreach ($twonews as $new): ?>
                        <div class="cont-noticia">
                            <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/news/<?php echo $new->picture ?>" alt="imagen noticia"/>
                            <div class="cont-info-noticias">
                                <h2><?php echo strtoupper($new->title) ?></h2>
                                <p><?php echo substr($news->description, 0, 60) ?>...</p>
                                <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/news/view/id/<?php echo $new->id ?>">LEER MÁS</a>
                            </div>
                        </div>
<?php endforeach; ?>
                </div>
                <!-- BUSCADOR -->
                <div class="cont-buscador">
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'search-form',
    'action' => Yii::app()->createUrl('/site/search'),
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
    //'enctype' => 'multipart/form-data',
    ),
        ));
?>
                    <h2>BUSCAR</h2>
                    <h3>Médico</h3>
                    <?php echo $form->textField($search, 'name', array('maxlength' => 254, 'placeholder' => 'Nombre, Apellido')); ?>

                    <h3>Especialidad</h3>
                    <?php echo $form->dropDownList($search, 'speciality_id', $list, array('prompt' => 'Selecciona una especialidad')); ?>
                    <input type="image" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-buscar.jpg" class="btn-buscar"/>
<?php $this->endWidget(); ?>
                </div>
                <div class="cont-btns">
                    <ul>
                        <li><a href="http://laboratorio.hmetro.med.ec/" target="_blank"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-rexamenes.png" alt="icono"/><span>Resultado de Exámenes</span></a></li>
                        <li><a href="<?php echo $this->createUrl('site/calculator', array()) ?>"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-calculadora.png" alt="icono"/><span>Calculadora</span></a></li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/interview"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-serviciocliente.png" alt="icono"/><span>Entrevistas</span></a></li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/FirstAid/view/id/1"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-priauxilios.png" alt="icono"/><span>Primeros Auxilios</span></a></li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/magazine"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-recetas.png" alt="icono"/><span>Revista Latidos</span></a></li>
                        <li><a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-trabaja.png" alt="icono"/><span>Trabaja con Nosotros</span></a></li>
                    </ul>
                </div>
            </div>
        </section>


    </body>
</html>
