<?php
       
      $siti = isset($_POST['name']) ? $_POST['name']:  '';     
      $siti = preg_replace ("/[^a-zA-Z]/","", $siti ); // очистить почту  числа   
      if (isset($siti)) {        
            switch ($siti) {
            case "Moskva":
                $name_echo = "(495) 975-93-55 <br /> <span class='dotted font60'>1Москва</span>";
                break;
            case "Piter":
                $name_echo =  "(812) 429-71-14 <br /> <span class='dotted font60'>2Санкт-Петербург</span>";
                break;
            case "Novosib":
                $name_echo = "(383) 380-22-00 <br /> <span class='dotted font60'>3Новосибирск</span>";
                break;
             default:
               $name_echo = "(383) 380-22-00 <br /> <span class='dotted font60'>5Новосибирск</span>";
        }
            //Поставить куки
            setcookie("ipGeoCookie", rawUrlEncode($name_echo) , time()+(60*60*24*365), "/");                
            echo $name_echo;
            die(); 
      } 
//Удалить КУКИ
//setcookie("ipGeoCookie", '', time()-(60*60*24*365), "/"); die(); 

if (isset($_COOKIE['ipGeoCookie'])) {
    echo $_COOKIE['ipGeoCookie'];    
    die();     
} 

require_once("ipgeobase.php");
$gb = new IPGeoBase();

/*
array(7) {
  ["range"]=>
  string(27) "46.46.128.0 - 46.46.169.255"
  ["cc"]=>
  string(2) "RU"
  ["city"]=>
  string(6) "Москва"
  ["region"]=>
  string(6) "Москва"
  ["district"]=>
  string(29) "Центральный федеральный округ"
  ["lat"]=>
  string(9) "55.755787"
  ["lng"]=>
  string(9) "37.617634"
}

$data = $gb->getRecord('89.113.72.0'); //Питер
$data = $gb->getRecord('37.193.135.88'); //Новосибирс
$data = $gb->getRecord('46.46.128.0'); //Москва
*/

 $ip=$_SERVER['REMOTE_ADDR']; 
 $data = $gb->getRecord($ip);

  //$data = $gb->getRecord('89.113.72.0'); //Питер
  

 $name =$data["district"];
 switch ($name) {
    case "Центральный федеральный округ":
        $name_echo = "(495) 975-93-55 <br /> <span class='dotted font60'>55Москва</span>";
        break;
    case "Северо-Западный федеральный округ":
        $name_echo =  "(812) 429-71-14 <br /> <span class='dotted font60'>66Санкт-Петербург</span>";
        break;
    case "Сибирский федеральный округ":
        $name_echo = "(383) 380-22-00 <br /> <span class='dotted font60'>7Новосибирск</span>";
        break;
     default:
       $name_echo = "(383) 380-22-00 <br /> <span class='dotted font60'>8Новосибирск</span>";     
        
}

//Поставить куки
setcookie("ipGeoCookie", rawUrlEncode($name_echo) , time()+(60*60*24*365), "/");
echo $name_echo;




?>
 
 
 
 
 

