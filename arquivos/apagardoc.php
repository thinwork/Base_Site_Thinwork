<?php
class Authenticator {

  public static $username = "projeto";
  public static $password = "p#montes2018";

  public static function check() {
    if (
      isset($_SERVER['PHP_AUTH_USER']) &&
      isset($_SERVER['PHP_AUTH_PW']) &&
      $_SERVER['PHP_AUTH_USER'] == self::$username &&
      $_SERVER['PHP_AUTH_PW'] == self::$password
    ) {
      return true;
    } else {
      header('WWW-Authenticate: Basic realm="Please login."');
      header('HTTP/1.0 401 Unauthorized');
      die("Usuário ou senha incorretos!");
    }
  }

}

if(Authenticator::check()){
  $pagina = "content.html";
  if(isset($_POST)){
    if(isset($_POST["conteudo"])){
      $fopen = fopen($pagina,"w+");
      fwrite($fopen,$_POST["conteudo"]);
      fclose($fopen);
    }
  }
}
else return null;
?>

<?php

    	function Logger($msg){
 
			$data      = date("d-m-y");
			$hora      = date("H:i:s");
			$ip        = $_SERVER['REMOTE_ADDR'];
			$arquivo   = "log_apaga_doc.log";                  // Nome do arquivo:  
            $quebra    = chr(13).chr(10);                      // essa � a quebra de linha
			$texto     = "[$data]-[$hora]-[$ip]-> $msg \n";    // Texto a ser impresso no log:
			$manipular = fopen("$arquivo", "a+b");
			fwrite($manipular, $texto);
			fclose($manipular);
						
 	    }  

		
  $filename = $_GET['delete_id']; //get the filename

  unlink( $filename ); //delete it

  Logger( 'Arquivo Apagado = ' . $filename ) ;
    
?>	

