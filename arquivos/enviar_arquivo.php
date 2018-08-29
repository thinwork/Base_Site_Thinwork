
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



<!DOCTYPE html>
<html lang="pt-br">
	
	<head>
		<meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
	</head>
	
<style>		
   .textlabel {font-size:25px; font-family:Verdana; }
</style>


	<body>
        
<br>   

<div id="barra">
   <a href="../index.php">Volta a Pagina Principal</a>
</div>

<?php

    date_default_timezone_set('America/Sao_Paulo') ;

    setlocale(LC_ALL,'pt_BR') ;
   
    error_reporting(E_ALL|E_STRICT) ;


    	function Logger($msg){
 
			$data      = date("d-m-y");
			$hora      = date("H:i:s");
			$ip        = $_SERVER['REMOTE_ADDR'];
			$arquivo   = "log_gravar_doc.log";                  // Nome do arquivo:  
            $quebra    = chr(13).chr(10);                      // essa é a quebra de linha
			$texto     = "[$data]-[$hora]-[$ip]-> $msg \n";    // Texto a ser impresso no log:
			$manipular = fopen("$arquivo", "a+b");
			fwrite($manipular, $texto);
			fclose($manipular);
						
 	    }  	

    try {
			
	

		    if ( isset($_POST["submit"]) )
			{
				
				$tmpfile   = $_FILES["parquivo"]["tmp_name"];   
				$filename  = $_FILES["parquivo"]["name"];      
                                
                move_uploaded_file( $tmpfile , $filename ); //Fazer upload do arquivo

				Logger( 'Arquivo Enviado = ' . $filename ) ;
				
  			    print_r( ' <center><font size="3" color="red"> ' .  $filename  . '</font></center> ' ); 			
				
				unset($_POST);
				
                unset($_REQUEST);
				
			}   
			
					
    } 
	catch (SoapFault $e) 
	{
          print($client->__getLastResponse());
    }			
	  
?>

<script type="text/javascript">


function MascaraCNPJ(cnpj){
        if(mascaraInteiro(cnpj)==false){
                event.returnValue = false;
        }       
        return formataCampo(cnpj, '00.000.000/0000-00', event);
}

//adiciona mascara de cep
function MascaraCep(cep){
                if(mascaraInteiro(cep)==false){
                event.returnValue = false;
        }       
        return formataCampo(cep, '00.000-000', event);
}

//adiciona mascara de data
function MascaraData(data){
        if(mascaraInteiro(data)==false){
                event.returnValue = false;
        }       
        return formataCampo(data, '00/00/0000', event);
}

//adiciona mascara ao telefone
function MascaraTelefone(tel){  
        if(mascaraInteiro(tel)==false){
                event.returnValue = false;
        }       
        return formataCampo(tel, '(00) 0000-0000', event);
}

//adiciona mascara ao CPF
function MascaraCPF(cpf){
        if(mascaraInteiro(cpf)==false){
                event.returnValue = false;
        }       
        return formataCampo(cpf, '000.000.000-00', event);
}

//valida telefone
function ValidaTelefone(tel){
        exp = /\(\d{2}\)\ \d{4}\-\d{4}/
        if(!exp.test(tel.value))
                alert('Numero de Telefone Invalido!');
}

//valida CEP
function ValidaCep(cep){
        exp = /\d{2}\.\d{3}\-\d{3}/
        if(!exp.test(cep.value))
                alert('Numero de Cep Invalido!');               
}

//valida data
function ValidaData(data){
        exp = /\d{2}\/\d{2}\/\d{4}/
        if(!exp.test(data.value))
                alert('Data Invalida!');                        
}

//valida o CPF digitado
function ValidarCPF(Objcpf){
        var cpf = Objcpf.value;
        exp = /\.|\-/g
        cpf = cpf.toString().replace( exp, "" ); 
        var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
        var soma1=0, soma2=0;
        var vlr =11;

        for(i=0;i<9;i++){
                soma1+=eval(cpf.charAt(i)*(vlr-1));
                soma2+=eval(cpf.charAt(i)*vlr);
                vlr--;
        }       
        soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
        soma2=(((soma2+(2*soma1))*10)%11);

        var digitoGerado=(soma1*10)+soma2;
		
        if(digitoGerado!=digitoDigitado)  alert('CPF Invalido!');         

		/// Listar arquivos do mesmo CPF  
		$('#larq').attr('src', "ajaxarquivo.php?cpf=" + cpf );
		
}

//valida numero inteiro com mascara
function mascaraInteiro(){
        if (event.keyCode < 48 || event.keyCode > 57){
                event.returnValue = false;
                return false;
        }
        return true;
}

//valida o CNPJ digitado
function ValidarCNPJ(ObjCnpj){
        var cnpj = ObjCnpj.value;
        var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
        var dig1= new Number;
        var dig2= new Number;

        exp = /\.|\-|\//g
        cnpj = cnpj.toString().replace( exp, "" ); 
        var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));

        for(i = 0; i<valida.length; i++){
                dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);  
                dig2 += cnpj.charAt(i)*valida[i];       
        }
        dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
        dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));

        if(((dig1*10)+dig2) != digito)  
                alert('CNPJ Invalido!');

}

//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 
        var boleanoMascara; 

        var Digitato = evento.keyCode;
        exp = /\-|\.|\/|\(|\)| /g
        campoSoNumeros = campo.value.toString().replace( exp, "" ); 

        var posicaoCampo = 0;    
        var NovoValorCampo="";
        var TamanhoMascara = campoSoNumeros.length;; 

        if (Digitato != 8) { // backspace 
                for(i=0; i<= TamanhoMascara; i++) { 
                        boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                                || (Mascara.charAt(i) == "/")) 
                        boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                        if (boleanoMascara) { 
                                NovoValorCampo += Mascara.charAt(i); 
                                  TamanhoMascara++;
                        }else { 
                                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                                posicaoCampo++; 
                          }              
                  }      
                campo.value = NovoValorCampo;
                  return true; 
        }else { 
                return true; 
        }
}

function reload() {
 
location.reload();
 
}
 
document.querySelector("button").addEventListener("click", reload);

	
</script>

        <br><br>
		<center>
		<label class="textlabel" >
            Projeto B.I - Documentos  
        </label>		
<form name="form_bpn" method="post" action="" enctype="multipart/form-data">

    <br>
    <br><br><label for="male">Arquivo</label>  <input type="file"   required="required"   name="parquivo">
	<br>
    <br><br>                                   <input type="submit" name="submit" value="Enviar Arquivo">
	
</form>
</center>


	 <br><br>
	 <center>
          <iframe id="larq" src="about:blank" width="900" height="550" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" ></iframe>
	 </center>
	 
	
	<script>
		$('#larq').attr('src', "ajaxarquivo.php" );
	</script>	
 
	 
	</body>
	
</html>
