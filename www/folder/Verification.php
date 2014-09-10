<?php


class Verification 
{
    public $rezylt;
    
    public function newValue ($a, $b)
    {   
        $this->valid($a, $b);
        return $this->rezylt;
    } 
    
   
    public function __construct($var, $vol)
	{
		$this->valid($var, $vol);        
    }
    
    public function __toString()
    {           
        return $this->rezylt;
    }
    
    
    
    private function valid($var, $vol)
	{
		if ($vol == 'num' ) {
		  $var = preg_replace ("/[^0-9]/","", $var );
         
          } // очистить  только числа 
        if ($vol == 'email' ) {
            $var = preg_replace ("/[^a-zA-Z0-9@\._-]/","", $var ); // очистить почту 
           
            }
        if ($vol == 'text' ) {
            $var = preg_replace ("/[^a-zA-ZйцукенгшщзхъэждлорпавыфячсмитьбюЮБЬТИМСЧЯФЫВАПРОЛДЖЭЪХЗЩШГНЕКУЦЙёЁ0-9№@\._-]/","", $var ); // очистить почту 
            
            }
        if ($vol == 'text2' ) {
            $var = preg_replace ("/[^a-zA-ZйцукенгшщзхъэждлорпавыфячсмитьбюЮБЬТИМСЧЯФЫВАПРОЛДЖЭЪХЗЩШГНЕКУЦЙёЁ0-9№@\.,?_ -]/","", $var ); // очистить почту 
            
            }
        if ($vol == 'tel' ) {
            $var = preg_replace ("/[^0-9-+()]/","", $var ); // очистить почту            
            }
            
        if ($vol == 'pass' ) {
            $var = preg_replace ("/[^a-zA-Z0-9]/","", $var ); // очистить почту      
            $var = trim(str_replace("`",'',str_replace("\n",'',str_replace("|",'',htmlspecialchars($var))))); // Убираем все ЛЕВЫЕ символы которые могут ввести
            $var = preg_replace("[^a-zA-Z0-9]","",$var); // Дополнительно фильтруем
            $var=md5($var);
     
            }
            
           $this->rezylt = $var;   
                
	} 

}

