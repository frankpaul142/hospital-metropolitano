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
                $('.lenguaje-btn').click(function() {
                    console.log($(this).attr('id'));
                    var form = $('<form action="<?php echo Yii::app()->request->getBaseUrl(true); ?>/site/setLanguage" method="post">' +
                        '<input type="hidden" name="language" value="' + $(this).attr('id') + '" />' +
                        '<input type="hidden" name="url" value="' + document.URL + '" />' +
                        '</form>');
                    $(form).submit();
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
        $currentLang = Yii::app()->language;
        ?>
        <header id='head' class="h-metropolitano-int" >
        	<div class="lenguages-t">
            	<a <?php if($currentLang!='es') echo 'href="#"' ?>>
                    <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/esp.gif" id="es" class="lenguaje-btn<?php if($currentLang=='es') echo ' idioma-selected'; ?>" />
                </a>
                <a <?php if($currentLang!='en') echo 'href="#"' ?>>
                    <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/eng.gif" id="en" class="lenguaje-btn<?php if($currentLang=='en') echo ' idioma-selected'; ?>" />
                </a>
            </div>
            <section class="cont-menu">
                <div class="logo-hm"><a href='<?php echo Yii::app()->request->getBaseUrl(true); ?>'><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/logo-hm.png" alt="logo hospital metropolitano"/></a></div>
                <div class="btn-mobil"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-mobil.jpg" alt="btn mobile"/></div>
                <!-- -->
                <nav class="nav-metropolitano">
                    <ul class="nav-submenu">
                        <li><a href="#"><?php echo Yii::t('menus','menu_nosotros'); ?></a>
                            <ul class="nav-submenu1">
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'history')) ?>"><?php echo Yii::t('menus','submenu_historia'); ?></a></li>
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'mission')) ?>"><?php echo Yii::t('menus','submenu_mision'); ?></a></li>
                                <li><a href="<?php echo $this->createUrl('site/numbers', array()) ?>"><?php echo Yii::t('menus','submenu_cifras'); ?></a></li>
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'conventions')) ?>"><?php echo Yii::t('menus','submenu_convenios'); ?></a></li>
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'rights')) ?>"><?php echo Yii::t('menus','submenu_derechos'); ?></a></li>
                                <li><a href="<?php echo $this->createUrl('site/Authorities', array()) ?>"><?php echo Yii::t('menus','submenu_autoridades'); ?></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><?php echo Yii::t('menus','menu_servicios'); ?></a>
                            <ul class="nav-submenu1">

                            <?php foreach ($services as $service):
                                $n='services_'.$service->id.'_name'; ?>
                                <?php if ($service->modules) { ?>
                                    <li><a href="#"><?php echo ucwords(strtolower(Yii::t('services',$n))) ?></a>
                                        <ul class="nav-submenu2">
                                        <?php foreach ($service->modules as $module):
                                            $m='module_'.$module->id.'_name'; ?>
                                            <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/moduleview/<?php echo $module->id ?>"><?php echo ucwords(strtolower(Yii::t('services',$m))) ?></a></li>
                                        <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php }else { ?>
                                    <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/view/<?php echo $service->id ?>"><?php echo ucwords(strtolower(Yii::t('services',$n))) ?></a></li>
                                <?php } ?>
                            <?php endforeach; ?>
                            </ul>


                        </li>
                        <li><a href="#"><?php echo Yii::t('menus','menu_medicos'); ?></a>
                            <ul class="nav-submenu1">
                                <li><?php echo Yii::t('departments','title') ?></li>
                                <?php foreach ($departments as $department):
                                    $n='department_'.$department->id.'_name'; ?>
                                    <li>
                                        <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/speciality/view/<?php echo $department->specialities[0]->id ?>"><?php echo ucwords(strtolower(Yii::t('departments',$n))) ?></a>	
                                        <ul class="nav-submenu2">
                                        <?php foreach ($department->specialities as $speciality):
                                            $s='speciality_'.$speciality->id.'_name'; ?>
                                            <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/speciality/view/<?php echo $speciality->id ?>"><?php echo ucwords(strtolower(Yii::t('departments',$s))) ?></a></li>
                                        <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endforeach; ?>
                            </ul>	
                        </li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/view/id/8/education/1"><?php echo Yii::t('menus','menu_educacion'); ?></a></li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/event/view/id/1"><?php echo Yii::t('menus','menu_eventos'); ?></a></li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/news"><?php echo Yii::t('menus','menu_noticias'); ?></a></li>
                        <li><a href="http://laboratorio.hmetro.med.ec/"><?php echo Yii::t('menus','menu_bienestar'); ?></a></li>
                    </ul>
                </nav>
                <!-- -->
                <section class="menu-tablets">
                    <ul class="nav-submenu-mob">
                        <li><a href="#"><?php echo Yii::t('menus','menu_nosotros'); ?></a>
                            <ul class="nav-submenu1-mob">
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'history')) ?>"><?php echo Yii::t('menus','submenu_historia'); ?></a></li>
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'mission')) ?>"><?php echo Yii::t('menus','submenu_mision'); ?></a></li>
                                <li><a href="<?php echo $this->createUrl('site/numbers', array()) ?>"><?php echo Yii::t('menus','submenu_cifras'); ?></a></li>
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'conventions')) ?>"><?php echo Yii::t('menus','submenu_convenios'); ?></a></li>
                                <li><a href="<?php echo $this->createUrl('site/page', array('view' => 'rights')) ?>"><?php echo Yii::t('menus','submenu_derechos'); ?></a></li>
                                <li><a href="<?php echo $this->createUrl('site/Authorities', array()) ?>"><?php echo Yii::t('menus','submenu_autoridades'); ?></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><?php echo Yii::t('menus','menu_servicios'); ?></a>
                            <ul class="nav-submenu1-mob">
                            <?php foreach ($services as $service):
                                $n='services_'.$service->id.'_name'; ?>
                                <?php if ($service->modules) { ?>
                                    <li><a href="#"><?php echo ucwords(strtolower(Yii::t('services',$n))) ?></a>
                                        <ul class="nav-submenu2-mob">
                                        <?php foreach ($service->modules as $module):
                                            $m='module_'.$module->id.'_name'; ?>
                                            <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/moduleview/<?php echo $module->id ?>"><?php echo ucwords(strtolower(Yii::t('services',$m))) ?></a></li>
                                        <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php }else { ?>
                                    <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/view/<?php echo $service->id ?>"><?php echo ucwords(strtolower(Yii::t('services',$n))) ?></a></li>
                                <?php } ?>
                            <?php endforeach; ?>
                            </ul>

                        </li>
                        <li><a href="#"><?php echo Yii::t('menus','menu_medicos'); ?></a>
                            <ul class="nav-submenu1-mob">
                                <li><?php echo Yii::t('departments','title') ?></li>
                                <?php foreach ($departments as $department):
                                    $n='department_'.$department->id.'_name'; ?>
                                    <li>
                                        <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/speciality/view/<?php echo $department->specialities[0]->id ?>"><?php echo ucwords(strtolower(Yii::t('departments',$n))) ?></a>   
                                        <ul class="nav-submenu2-mob">
                                        <?php foreach ($department->specialities as $speciality):
                                            $s='speciality_'.$speciality->id.'_name'; ?>
                                            <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/speciality/view/<?php echo $speciality->id ?>"><?php echo ucwords(strtolower(Yii::t('departments',$s))) ?></a></li>
                                        <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endforeach; ?>
                            </ul>	
                        </li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/service/view/id/8/education/1"><?php echo Yii::t('menus','menu_educacion'); ?></a></li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/event/view/id/1"><?php echo Yii::t('menus','menu_eventos'); ?></a></li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/news"><?php echo Yii::t('menus','menu_noticias'); ?></a></li>
                        <li><a href="http://laboratorio.hmetro.med.ec/"><?php echo Yii::t('menus','menu_bienestar'); ?></a></li>
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
                            <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/news/view/id/<?php echo $news->id ?>"><?php echo Yii::t('news','leer'); ?></a>
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
                    <h2><?php echo Yii::t('news','title'); ?></h2>
                    <?php foreach ($twonews as $new):
                        $n='news_'.$new->id.'_title'; ?>
                        <div class="cont-noticia">
                            <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/news/<?php echo $new->picture ?>" alt="imagen noticia" />
                            <div class="cont-info-noticias">
                                <h2><?php echo strtoupper(Yii::t('news',$n)); ?></h2>
                                <p><?php echo strip_tags(substr(Yii::t('news','news_'.$new->id.'_description'), 0, 60)); ?>...</p>
                                <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/news/view/id/<?php echo $new->id ?>"><?php echo Yii::t('news','leer'); ?></a>
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
                    <h2><?php echo Yii::t('general','buscar'); ?></h2>
                    <h3><?php echo Yii::t('doctors','medico'); ?></h3>
                    <?php echo $form->textField($search, 'name', array('maxlength' => 254, 'placeholder' => 'Nombre, Apellido')); ?>

                    <h3><?php echo Yii::t('doctors','especialidad'); ?></h3>
                    <?php echo $form->dropDownList($search, 'speciality_id', $list, array('prompt' => 'Selecciona una especialidad')); ?>
                    <input type="image" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-buscar.jpg" class="btn-buscar"/>
<?php $this->endWidget(); ?>
                </div>
                <div class="cont-btns">
                    <ul>
                        <li><a href="http://laboratorio.hmetro.med.ec/" target="_blank"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-rexamenes.png" alt="icono"/><span><?php echo Yii::t('general','resultados_examenes'); ?></span></a></li>
                        <li><a href="<?php echo $this->createUrl('site/calculator', array()) ?>"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-calculadora.png" alt="icono"/><span><?php echo Yii::t('general','calculadora'); ?></span></a></li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/interview"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-serviciocliente.png" alt="icono"/><span><?php echo Yii::t('general','entrevistas'); ?></span></a></li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/FirstAid/view/id/1"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-priauxilios.png" alt="icono"/><span><?php echo Yii::t('general','primeros_auxilios'); ?></span></a></li>
                        <li><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/magazine"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-recetas.png" alt="icono"/><span><?php echo Yii::t('general','revista'); ?></span></a></li>
                        <li><a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/ico-trabaja.png" alt="icono"/><span><?php echo Yii::t('general','trabaja_con_nosotros'); ?></span></a></li>
                    </ul>
                </div>
            </div>
        </section>


    </body>
</html>
