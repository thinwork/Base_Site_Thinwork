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

<script type="text/javascript">
function delete_id(id)
{

    window.location.href='apagardoc.php?delete_id='+id;
	

}
</script>

<?php


		$diret       = '' ;
		$files      = glob( $diret . '*' , GLOB_BRACE );  
		$listaarq   = '<center><table  border="1"  border-collapse: collapse;  >' ; 	   
		$listaarq   = $listaarq . '<tr>    <th>Tipo</th>    <th>Arquivo</th>  <th>&nbsp;Ver&nbsp;</th> <th>&nbsp;&nbsp;Excluir&nbsp;&nbsp;</th>  </tr>' ;
		
		foreach ($files as $file) { 
		
			$nomearq   = str_replace(  $diret  , '' , $file ) ;
			$ext       = preg_replace('/^.*\./', '', $file ) ;
			$tipodir   = substr( $nomearq , 0 , 3 ) ; 
			$nomearqV  = str_replace( $tipodir . ' ' , '' , $nomearq  ) ;
			
            If (( $ext <> 'php' )  && ( $ext <> 'log' ) && ( $ext <> 'txt' ))
			{	
			
			$wlink     = '<a href="' . $file . '">Visualizar</a>' ;
			
			$wlink_del = "<a href='javascript:delete_id(" . '"'.  $file . '"'. ")'>Apagar</a>" ;

			$listaarq = $listaarq . '<tr><td>&nbsp;' . $ext . '&nbsp;</td><td>&nbsp;' . htmlentities($nomearqV) . '&nbsp;</td><td>&nbsp;' . $wlink  . '&nbsp;</td>' . '<td>&nbsp;&nbsp;' . $wlink_del  . '</td>'   ; 
			
			} 
			
			
		} 
		
		$listaarq = $listaarq . '</center></table>' ;
		
		echo $listaarq ;

?>	