<?php
    /**
    * Sistema de gestión de personal
    * Version 1.0
    * @author Ing. Julio Avila
    */
class myLog {
    
    private $clase;	
    private $logging;
    private $path;	
    private $filescript;
    
    public function myLog($clase)	{

        $this->path  = "../logs/";
        $this->filescript = "SGP_LOGS_".date('dmY').".log";
        $this->clase  = $clase;
        $logging = true;
        $this->logging = $logging;
       
       if (empty($this->path)) {	
            Throw new Exception("Path es obligatorio");	
        }	
        
        if (!file_exists($this->path)) {
           Throw new Exception("El Path no existe");
        }
	
        if (!is_writeable($this->path)) {
            Throw new Exception("Sin permiso de escritura");	
        }
        
    }// end function
	
   protected function _save($line){	
        $file    = $this->path . '/' . $this->filescript;
        $fhandle = fopen($file, "a+");
        fwrite($fhandle, $line);	
        fclose($fhandle);	
    }//end function
	
    public function add($error){
        if ($this->logging) {
            $line=date("d-m-Y h:i:s ").$this->clase." - ".$error."\r\n";            
            $this->_save($line);	
        }
    }//end function	
}//end class
?>
