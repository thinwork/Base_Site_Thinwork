
<?php 

// Tratamento para a Variavel  e configuracao do ambiente 
if (!isset($_SESSION)) session_start();  

mb_internal_encoding('UTF-8'); 

mb_http_output('UTF-8'); 

ob_start();

ini_set('display_errors',1);

date_default_timezone_set('America/Sao_Paulo');

setlocale(LC_ALL,'pt_BR');
   
error_reporting(E_ALL|E_STRICT);

ini_set('SMTP','localhost');

ini_set('sendmail_from', 'junior@thinwork.com.br');

ini_set('smtp_port','587');

if (!isset($_SESSION)) session_start();

?> 


<?php
class Authenticator {

  public static $username = "projeto";
  public static $password = "******";

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cloud | Thinwork - Tecnologia da Informação</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="content-language" content="pt-br" />
    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Thinwork">
    <META NAME="keywords" CONTENT=" Desenvolvedor ,docker, asp.net core , core , asp.net , c# ,Financial  , ERP, bymoney  , startcontroll , BI , B.I  , sql , sqlserver , oracle , php , mobile  , webapp contas a pagar , receber , nota fiscal , emitir , receituario ,
    Emprestimo , Empréstimo , Aplicação , Mutuo , Finame , POC , ACC , ACE, Leasing , Fluxo de Caixa , Fundo , CDB , Letra , BI , B.I. , CUBO , CUBE , cubo , cube , Business Intelligence , inteligência do negócio , Inteligência do Negócio , Business , Intelligence , intelligence , Business , Moedas , Cotação , moeda , cotação , Risco , CASH , cash , Cash Management , thinwork , Thinwork , ByMoney , bymoney, ThinCube , TWCM , Startcontroll , startcontroll , Orçamento , ERP, Nota Fiscal , Fiscal , Contabilidade , contabil">
    <meta name="author" content="Thinwork Tecnologia da Informação" />
    <meta name="subject" content="ti@thinwork.com.br" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store" />
    <meta http-equiv="Pragma" content="no-cache, no-store" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- CSS ===============================================================-->
    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- Flex Slider -->
    <link href="assets/css/flexslider.css" rel="stylesheet">
    <!-- Change color theme -->
    <link href="assets/css/style-switcher.css" rel="stylesheet">
    <!-- Template CSS -->
    <link href="assets/css/main.css" id="theme" rel="stylesheet">
    <!-- Animation -->
    <link href="assets/css/animate.min.css" rel="stylesheet">
    <!-- Slick Carousel -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Select Style -->
    <link href="assets/css/bootstrap-select.min.css" rel="stylesheet">
    <!-- magnific popup -->
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
    <!-- csc do site -->
    <link href="assets/css/main-garden.css" rel="stylesheet">
    <!-- *** ===============================================================-->

</head>

<body bgcolor="#FFFFFF" > 


    <!-- PRELOADER   ===============================================================-->
    <div id="preloader">
        <div class="cssload-container">
            <div class="cssload-double-torus"></div>
        </div>
    </div>

<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home &nbsp;<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ferramentas <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="#">PHP informações</a></li>
            <li><a href="#">MySql - PhPAdmin</a></li>
            <li><a href="#">Painel de Console do Servidor</a></li>
            <li class="divider"></li>
            <li><a href="arquivos">Area de Arquivos </a></li>
            <li class="divider"></li>
            <li><a href="#">Editor de Dados - Thinwork </a></li>     
            <li class="divider"></li>                   
            <li><a href="#">Gerador de CRUD - Thinwork </a></li>
          </ul>
        </li>          
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Soluções <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="#">DashBord</a></li>
            <li><a href="#">Report</a></li>
            <li><a href="#">View Guide</a></li>
          </ul>
        </li>  
      </ul>
    </div>
  </div>
</nav>

<div class="container" id="content" tabindex="-1">	

    <!-- HOME CONTENT  ===============================================================-->
    </br>
    <div class="row">
    <center>
		<h4>PROJETO - CLOUD</h4>
        <h3><?php echo gethostname()?></h3>
    </center>
    </div>

    <center>
       <?php 
	     date_default_timezone_set('America/Sao_Paulo');
	     $date = date('d-m-Y H:i');
     	 echo $date . '     - Versão Atual do Servidor PHP: ' .  phpversion();  ;
       ?>  
   </center>

    <!-- PRINCIPAL SERVICES -->
    <section>
            <div class="row">

                <div class="col-sm-6 col-md-4 text-center home-icons">
                    <i class="fa fa-code wow fadeInUp" data-wow-delay="60ms"></i>
                    <div>
                        <h4>Development</h4>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 text-center home-icons">
                    <i class="fa fa-cloud wow fadeInUp" data-wow-delay="40ms"></i>
                    <div>
                        <h4>Cloud</h4>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 text-center home-icons">
                    <i class="fa fa-line-chart wow fadeInUp" data-wow-delay="20ms"></i>
                    <div>
                        <h4>Data</h4>
                    </div>
                </div>

            </div>
    </section>
    <!-- /section Principal Services -->


<BR>
<div class="alert alert-danger" role="alert">
<?php echo 'DOCUMENT ROOT:       ' .  $_SERVER['DOCUMENT_ROOT'] ; ?> 
</div>
<BR>
<div class="alert alert-info" role="alert"> Acentos = José Cão Ção ção você contábil é è ô Õ </div>

<?php
    echo "<pre>";
    print_r($_SERVER);
    echo "</pre>";
?>

<?php
    
	echo "<pre>";
	echo "<center>";
	echo "APACHE HEADERS";	
	echo "</center>";
	
    $headers = apache_request_headers();

    foreach ($headers as $header => $value) {
            echo "$header: $value <br />\n";
    }
	
    echo "</pre>";
	
?>


<?php
echo "<pre>";
echo '<center> PDO - ACESSO A BASE DE DADOS </center><br>'; 

foreach ( PDO::getAvailableDrivers() as $driver )
{
    echo $driver . '<br />';
}
echo "</pre>";

?>


<?php 
    echo "<pre>";
	echo '<center> Mostar session ativos </center><br>'; 
	
	foreach($_SESSION as $key=>$value) 
    { 
      print $key .  " = "  . $value .  "<br>" ; 
    }
    echo "</pre>";
?> 	


<?php
	echo "<pre>";
    echo '<center> MySQL PDO </center> <br> ' ;   
  
    try {
  
      $dbh = new PDO ( 'mysql:host=bi.thinwork.com.br;dbname=web_bi_projeto' , 'webbiprojeto' , 'webbiprojeto' );
    } catch (PDOException $e) {
      echo "Failed to get DB handle: " . $e->getMessage() . "\n";
      exit;
    }
    
    $sql = "SELECT * FROM web_bi_projeto.tbusuario ";
    
    $statement  = $dbh->query($sql);
    $results    = $statement->fetchAll(); 
  
    echo '{ "rows" : ';  
    echo json_encode($results) ;
    echo ' } ' ;  
    
    unset($dbh); 

    echo "</pre>";
    
  ?>

</div>
</div>

<BR>
<BR>
<BR>
<BR>

    <!-- FOOTER  ===============================================================-->
    <footer>
       <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="footer-widget col-sm-6 col-md-4">
                        <ul class="list-unstyled">
                            <li><i class="fa fa-map-marker"></i> Rua do Lavapes, 163 - CJ 32 , São Paulo </li>
                            <li class="number"><i class="fa fa-phone"></i> (+55) 11 3230-6322</li>
                            <li><i class="fa fa-envelope"></i> contato@thinwork.com.br</li>
                            <li><i class="fa fa-skype"></i> thinwork</li>
                        </ul>
                        <div class="visible-xs-block visible-sm-block pt20"></div>
                    </div>
                    <div class="col-sm-6 credits">
                        <p>&copy; Thinwork 2017-2018. All Rights Reserved.</p>
                        <p class="small">
                            <i class="fa fa-angle-right"></i> Designed por: <a href="www.thinwork.com.br" target="_blank">Thinwork</a>
                        </p>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                        <br>
                </div>
            </div>
        </div>        
        <a href="index.php#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
    </footer>




    <!-- JAVASCRIPT  ===============================================================-->
    <!-- JQuery -->
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Vanillabox -->
    <script src="assets/js/jquery.vanillabox-0.1.7.min.js"></script>
    <!-- Slick Carousel -->
    <script src="assets/js/slick.min.js"></script>
    <!-- Select Style -->
    <script src="assets/js/bootstrap-select.min.js"></script>
    <!-- Flexslider -->
    <script src="assets/js/jquery.flexslider-min.js"></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Placeholder for IE9 -->
    <script src="assets/js/jquery.placeholder.min.js"></script>
    <!-- Parallax -->
    <script src="assets/js/jquery.stellar.min.js"></script>
    <!-- Parallax -->
    <script src="assets/js/jquery.stellar.min.js"></script>
    <!-- Animation -->
    <script src="assets/js/wow.min.js"></script>

    <!-- Rss Alterado junior  -->
    <script src="assets/js/FeedEk.js"></script>

    <!-- Main funcoes do site todas aqui -->
    <script src="assets/js/main.js"></script>

    <script type="text/javascript">
        jQuery('#theme').attr('href', 'assets/css/main-garden.css');
        jQuery('.navbar-brand img').attr('src', 'assets/img/logo-garden.png');
    </script>

</body>

</html>
