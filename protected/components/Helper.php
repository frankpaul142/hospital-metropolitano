<?php
class Helper  {
     function time2str($date)
    {
//        $original_date = $date;
//        $param_date = new DateTime($date);
//        $dsadasd = date("j, n, Y", strtotime($date));
//        $date = getdate(strtotime($date));
//        return $date['mday'].'/'.$date['mon'].'/'.substr($date['year'], 2, 2).' a la(s): '.substr($original_date, -8,5);
        $dia="";
        $mes="";
          switch (date("l", strtotime($date))) {
            case "Monday":
                $dia="Lunes";
                break;
            case "Tuesday":
                $dia="Martes";
                break;
            case "Wednesday":
                $dia="Miércoles";
                break;
            case "Thursday":
                $dia="Jueves";
                break;
            case "Friday":
                $dia="Viernes";
                break;
            case "Saturday":
                $dia="Sábado";
                break;
            case "Sunday":
                $dia="Domingo";
                break;
        }
        switch (date("F", strtotime($date))) {
            case "January":
                $mes="Enero";
                break;
            case "February":
                $mes="Febrero";
                break;
            case "March":
                $mes="Marzo";
                break;
            case "April":
                $mes="Abril";
                break;
            case "May":
                $mes="Mayo";
                break;
            case "June":
                $mes="Junio";
                break;
            case "July":
                $mes="Julio";
                break;
            case "August":
                $mes="Agosto";
                break;
            case "September":
                $mes="Septiembre";
                break;
            case "October":
                $mes="Octubre";
                break;
            case "November":
                $mes="Noviembre";
                break;
            case "December":
                $mes="Diciembre";
                break;
        }
        return date("d", strtotime($date)).' de '.$mes.' del '.date("Y", strtotime($date));
    }
     function time2str2($date,$para)
    {
//        $original_date = $date;
//        $param_date = new DateTime($date);
//        $dsadasd = date("j, n, Y", strtotime($date));
//        $date = getdate(strtotime($date));
//        return $date['mday'].'/'.$date['mon'].'/'.substr($date['year'], 2, 2).' a la(s): '.substr($original_date, -8,5);
        $dia="";
        $mes="";
          switch (date("l", strtotime($date))) {
            case "Monday":
                $dia="Lunes";
                break;
            case "Tuesday":
                $dia="Martes";
                break;
            case "Wednesday":
                $dia="Miércoles";
                break;
            case "Thursday":
                $dia="Jueves";
                break;
            case "Friday":
                $dia="Viernes";
                break;
            case "Saturday":
                $dia="Sábado";
                break;
            case "Sunday":
                $dia="Domingo";
                break;
        }
        switch (date("F", strtotime($date))) {
            case "January":
                $mes="Enero";
                break;
            case "February":
                $mes="Febrero";
                break;
            case "March":
                $mes="Marzo";
                break;
            case "April":
                $mes="Abril";
                break;
            case "May":
                $mes="Mayo";
                break;
            case "June":
                $mes="Junio";
                break;
            case "July":
                $mes="Julio";
                break;
            case "August":
                $mes="Agosto";
                break;
            case "September":
                $mes="Septiembre";
                break;
            case "October":
                $mes="Octubre";
                break;
            case "November":
                $mes="Noviembre";
                break;
            case "December":
                $mes="Diciembre";
                break;
        }
        if($para==0)
        return date("d", strtotime($date)).'-'.$mes.'-'.date("Y", strtotime($date));
        else
        {
            if($para==1)
                return date("H", strtotime($date)).'h'.date("i", strtotime($date));
        }
    }
        
    function build_sorter($clave,$clave2) {
    return function ($a, $b) use ($clave,$clave2) {
       if($a[$clave]==$b[$clave]){
   
        return $a[$clave2] < $b[$clave2]?1:-1;   
           
       } 
    return $a[$clave] < $b[$clave]?1:-1;
    };
}
    
function str_min($text,$n){
    
    return (strlen($text) > $n) ? substr($text, 0, $n).'...'  : $text;
  
}

function img_facebook($img){
    
  $z=  substr($img,0,4);
  if($z=='http'){
      return '1';
  }
  else{
      return '0'; 
  }
    
}
 function RandomString($length,$uc=FALSE,$n=FALSE,$sc=FALSE)
{
    $source = 'abcdef1234567890';
    if($uc==1) $source .= 'ABCDEF';
    if($n==1) $source .= '1234567890';
    if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
    if($length>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++){
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
 
    }
    return $rstr;
}
// conectar sqlsrv
function connectsrv(){
$serverName = "201.218.12.182"; //serverName\instanceName
$connectionInfo = array( "Database"=>"fpsp_prueba", "UID"=>"sysclik", "PWD"=>"20141128IND*#");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
return $conn;

}
//conectar mssql
function connectmssql(){
$serverName = "201.218.12.182"; //serverName\instanceName
$connectionInfo = array( "Database"=>"fpsp_prueba", "UID"=>"sysclik", "PWD"=>"20141128IND*#");
$conn = mssql_connect( $serverName, 'sysclik','20141128IND*#');
$co=mssql_select_db('fpsp_prueba', $conn);

return $co;

}
}
?>
