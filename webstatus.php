<?php session_start();?> 

<?php
  include_once "funcs/thinwork.php";
?> 


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
<head>

	<title>e-Controll - WEBSTATUS - Apoio a Gestão de Empresarial - Thinwork</title>
    <meta http-equiv="content-language" content="pt-br" />
    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
    <meta name="robots" content="index, follow" />
	<meta name="language" content="pt-br" />
	<meta name="author" content="Thinwork Tecnologia da Informação" />
	<meta name="subject" content="ti@thinwork.com.br" />	
	<meta http-equiv="imagetoolbar" content="no" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store" />
    <meta http-equiv="Pragma" content="no-cache, no-store" />	

	<!-- Incluindo bibliotecas ExtJs -->
    <link   rel="stylesheet"        type="text/css"  href="libs/extjs/resources/css/ext-all-gray.css" />
	<script type="text/javascript"                   src="libs/extjs/bootstrap.js"></script>	
    <script type="text/javascript"                   src="libs/extjs/locale/ext-lang-pt_BR.js"></script>  
	
			
		
</head>

<body bgcolor="#FFFFFF" > 
  


<?php echo '============ STATUS DO SERVIDOR - eCONTROLL ==================  <br><br>';  ?> 

<?php echo 'Versão Atual do PHP: ' .  phpversion(); ?> 



<?php

echo '<br><br> ============ PDO - ACESSO A BASE DE DADOS ==================<br><br> '; 

foreach ( PDO::getAvailableDrivers() as $driver )
{
    echo $driver . '<br />';
}
echo '<br><br>';

?>


<?php
	
	echo '<br> ============ SQL SERVER NATIVO ========== <br> ' ;   

	try {
		$dbh = new PDO("sqlsrv:server=cortexsqlserver.cloudapp.net ; Database=CXM", "CORTEXMEDICAL", "Bussunda0)");
		echo '<br>Connected to database<br><br><br />';
		
		
		}   
	catch (PDOException $e)
		{
		echo $e->getMessage();
		}

?>

<?php 


	echo '<br><br> ============ Mostar session ativos ==========<br><br> '; 
	
	foreach($_SESSION as $key=>$value) 
    { 
      print $key .  " = "  . $value .  "<br>" ; 
    }

?> 	



<?php

	echo '<br><br> ============ BASE FIREBIRD LOCAL ==================<br><br> '; 
	try {
		$dbh = new PDO("firebird:dbname=10.15.0.101:D:\StartControll\Database\ant_CONTROLL.GDB", "sysdba", "sysdba");
	
		echo '<br>Connected to database<br><br><br />';
		
    /*** The SQL SELECT statement ***/
    $sql = "SELECT * FROM ATATATIV";

    $stmt = $dbh->query($sql);
		
    foreach ($dbh->query($sql) as $row)
        {
        print $row['ATCDCODI'] .' - '. $row['ATDSNOME'] . '<br />';
        }
		
		}   
	catch (PDOException $e)
		{
		echo $e->getMessage();
		}

	echo '<br><br>';	

  $statement  = $dbh->query($sql);
  $results    = $statement->fetchAll(); 

  echo '{ "rows" : ';  
  echo json_encode($results) ;
  echo ' } ' ;
	
	
?>	



	

	
	
	
<?php

	echo '<br><br> ============ BASE FIREBIRD TRAMA ==================<br><br> '; 
	
	try {
		$dbh = new PDO("firebird:dbname=10.15.0.101:D:\StartControll\Database\ant_CONTROLL.GDB", "sysdba", "sysdba");
	
		echo '<br>Connected to database<br><br><br />';
		
    $sql = "SELECT * FROM USUSUARI WHERE USCDCODI = 'MASTER'";

    $stmt = $dbh->query($sql);
		
    foreach ($dbh->query($sql) as $row)
        {
		
		$p_senha_des = Descriptografa( $row['USNMSENH'] ) ;
		
        print $row['USCDCODI'] .' - '. $row['USDSNOME'] . '<br />';
        }
		
		}   
	catch (PDOException $e)
		{
		echo $e->getMessage();
		}

	echo '<br><br>';	
	
?> 		
	


	
	
<?php

	echo '<br><br> ============ status dos servidores ==================<br><br> '; 


			$ip   = "www.thinwork.com.br";   // IP do seu servidor. 
			$port = "80";                  // Porta que seu servidor usa. 
			@$fp  = fsockopen ($ip , $port , $errno, $errstr, 1); 
			if (!$fp) { 
			              echo '<font color="#FF0000"><b>  ' . $ip  . '- Offline </b></font><br>'; 
			} else { 
			              echo '<font color="#008000"><b>  ' . $ip  . '- Online  </b></font><br>'; 
			} 

			$ip   = "www.thinwork.com.br";   // IP do seu servidor. 
			$port = "80";                  // Porta que seu servidor usa. 
			@$fp  = fsockopen ($ip , $port , $errno, $errstr, 1); 
			if (!$fp) { 
			              echo '<font color="#FF0000"><b>  ' . $ip  . '- Offline </b></font><br>'; 
			} else { 
			              echo '<font color="#008000"><b>  ' . $ip  . '- Online  </b></font><br>'; 
			} 

			$ip   = "www.thinwork.com.br";   // IP do seu servidor. 
			$port = "80";                      // Porta que seu servidor usa. 
			@$fp  = fsockopen ($ip , $port , $errno, $errstr, 1); 
			if (!$fp) { 
			              echo '<font color="#FF0000"><b>  ' . $ip  . '- Offline </b></font><br>'; 
			} else { 
			              echo '<font color="#008000"><b>  ' . $ip  . '- Online  </b></font><br>'; 
			} 

    echo '<br><br>'; 
			
?>


<?php
    // Mostar a senha
    //echo $p_senha_des
?>


</body>

</html>

