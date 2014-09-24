<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
        	public function actionCalculator(){
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
                    
		$this->render('calculator');
	}
       public function actionAuthorities(){
           
           $authorities = Authority::model()->findAll();
           $this->render('authority',array('authorities'=>$authorities));
       }

       public function actionNumbers(){
           
           $numbers = Numbers::model()->findAll();
           $this->render('numbers',array('numbers'=>$numbers));
       }
        
        public function actionSearch()
	{
            $model=new Doctor;
	 
            if(isset($_POST['Doctor']))   
        {
                $model->attributes=$_POST['Doctor'];
                $dataProvider=$model->search();
                
                if ($dataProvider->totalItemCount==1)
                        $this->redirect(array('view','id'=>$dataProvider->data[0]->id));
       

        $this->render(
                'search',
                array(
                                'model'=>$model,
                                'dataProvider'=>$dataProvider,
                        )
                );
         }

	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionSetLanguage()
    {
        if (isset($_POST['language']))
            Yii::app()->user->setState('applicationLanguage',$_POST['language']);
        $this->redirect($_POST['url']);
    }

    public function actionTranslate()
    {
        $sqlsm="";
        $sqlm="";
        $i=0;
        $authorities = Authority::model()->findAll();
        foreach ($authorities as $r) {
            $sqlsm.="insert into `SourceMessage` values (".$i.",'authorities','authority_".htmlentities($r->id, ENT_QUOTES,'UTF-8')."_charge');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($r->charge, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
        }
        echo $sqlsm;
        echo $sqlm;
        echo "<br/>";
        $numbers = Numbers::model()->findAll();
        $sqlsm="";
        $sqlm="";
        $i=34;
        foreach ($numbers as $s) {
            $sqlsm.="insert into `SourceMessage` values (".$i.",'numbers','numbers_".htmlentities($s->id, ENT_QUOTES,'UTF-8')."_field');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($s->field, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
        }
        echo $sqlsm;
        echo $sqlm;
        echo "<br/>";
        $services = Service::model()->findAll();
        $sqlsm="";
        $sqlm="";
        $i=68;
        foreach ($services as $s) {
            $sqlsm.="insert into `SourceMessage` values (".$i.",'services','services_".htmlentities($s->id, ENT_QUOTES,'UTF-8')."_name');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($s->name, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
            $sqlsm.="insert into `SourceMessage` values (".$i.",'services','services_".htmlentities($s->id, ENT_QUOTES,'UTF-8')."_description');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($s->description, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
        }
        echo $sqlsm;
        echo $sqlm;
        echo "<br/>";
        $modules = Module::model()->findAll();
        $sqlsm="";
        $sqlm="";
        foreach ($modules as $s) {
            $sqlsm.="insert into `SourceMessage` values (".$i.",'services','module_".htmlentities($s->id, ENT_QUOTES,'UTF-8')."_name');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($s->name, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
            $sqlsm.="insert into `SourceMessage` values (".$i.",'services','module_".htmlentities($s->id, ENT_QUOTES,'UTF-8')."_description');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($s->description, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
        }
        echo $sqlsm;
        echo $sqlm;
        echo "<br/>";
        $departments = Department::model()->findAll();
        $sqlsm="";
        $sqlm="";
        $i=157;
        foreach ($departments as $s) {
            $sqlsm.="insert into `SourceMessage` values (".$i.",'departments','department_".htmlentities($s->id, ENT_QUOTES,'UTF-8')."_name');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($s->name, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
        }
        echo $sqlsm;
        echo $sqlm;
        echo "<br/>";
        $specialities = Speciality::model()->findAll();
        $sqlsm="";
        $sqlm="";
        foreach ($specialities as $s) {
            $sqlsm.="insert into `SourceMessage` values (".$i.",'departments','speciality_".htmlentities($s->id, ENT_QUOTES,'UTF-8')."_name');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($s->name, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
        }
        echo $sqlsm;
        echo $sqlm;
        echo "<br/>";
        $news = News::model()->findAll();
        $sqlsm="";
        $sqlm="";
        $i=229;
        foreach ($news as $s) {
            $sqlsm.="insert into `SourceMessage` values (".$i.",'news','news_".htmlentities($s->id, ENT_QUOTES,'UTF-8')."_title');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($s->title, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
            $sqlsm.="insert into `SourceMessage` values (".$i.",'news','news_".htmlentities($s->id, ENT_QUOTES,'UTF-8')."_description');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($s->description, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
        }
        echo $sqlsm;
        echo $sqlm;
        echo "<br/>";
        $doctors = Doctor::model()->findAll();
        $sqlsm="";
        $sqlm="";
        $i=406;
        foreach ($doctors as $s) {
            $sqlsm.="insert into `SourceMessage` values (".$i.",'doctors','doctor_".htmlentities($s->id, ENT_QUOTES,'UTF-8')."_specialty');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($s->specialism, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
            $sqlsm.="insert into `SourceMessage` values (".$i.",'doctors','doctor_".htmlentities($s->id, ENT_QUOTES,'UTF-8')."_fellowship');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($s->fellowship, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
            $sqlsm.="insert into `SourceMessage` values (".$i.",'doctors','doctor_".htmlentities($s->id, ENT_QUOTES,'UTF-8')."_interests');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($s->interests, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
        }
        echo $sqlsm;
        echo $sqlm;
        echo "<br/>";
        $sqlm="";
        $con=mysqli_connect("166.63.0.204","webcont_dba","lN_Q*PR]FN[E","webcont_hm");
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$result = mysqli_query($con,"SELECT id_mdc, especialidad_mdc, fellowship_mdc, intereses_mdc FROM medicos");
		$j=406;
		while($row = mysqli_fetch_array($result)) {
		  $sqlm.="update `Message` set translation='".$row['fellowship_mdc']."' where id=".$j++." and language='en';<br>";
		  $sqlm.="update `Message` set translation='".$row['especialidad_mdc']."' where id=".$j++." and language='en';<br>";
		  $sqlm.="update `Message` set translation='".$row['intereses_mdc']."' where id=".$j++." and language='en';<br>";
		}
		mysqli_close($con);
		echo $sqlm;
		echo "<br/>";
        $firstaids = FirstAid::model()->findAll();
        $sqlsm="";
        $sqlm="";
        $i=1263;
        foreach ($firstaids as $s) {
            $sqlsm.="insert into `SourceMessage` values (".$i.",'firstaid','".htmlentities($s->id, ENT_QUOTES,'UTF-8')."_title');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($s->title, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
            $sqlsm.="insert into `SourceMessage` values (".$i.",'firstaid','".htmlentities($s->id, ENT_QUOTES,'UTF-8')."_description');<br>";
            $sqlm.="insert into `Message` values (".$i.",'es','".htmlentities($s->description, ENT_QUOTES,'UTF-8')."');<br>";
            $sqlm.="insert into `Message` values (".$i++.",'en','');<br>";
        }
        echo $sqlsm;
        echo $sqlm;
    }
}