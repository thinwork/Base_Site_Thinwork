<?php

	/// START APLICAO PARA CONFIGURAR SESSAO   
	/// ARQUIVO PARA ACESSAR A BASE DE DADOS  
	include "configdb.php" ;   
    
	//initilize the page
	require_once("inc/init.php");	
	
?>

<?php
   $e_mail = $_POST['email'];
   $e_paciente = $_SESSION['PACIENTE'];
   $e_medico = $_SESSION['MEDICO'];
   $e_tipodoc = $_SESSION['TIPODOC'];
   $_SESSION['N'] = 1;//$_POST['N'] ;
   $_SESSION['E'] = 1;//$_POST['E'] ;
   $_SESSION['T'] = 1;//$_POST['T'] ;
   $_SESSION['S'] = 1;//$_POST['S'] ;
 
   header('Content-Type: text/html; charset=UTF-8');
	
?>

<?php

    require("lib/phpmailer/class.phpmailer.php");
	require("lib/phpmailer/class.smtp.php");

    $mail = new PHPMailer(true);

	$mail->IsSMTP();                                        // Define que a mensagem será SMTP
    $mail->Host        = "smtp.office365.com"            ; // Endereço do servidor SMTP
	$mail->SMTPSecure  = 'tls';
    $mail->SMTPAuth    = true                            ; // Autenticação
    $mail->Username    = 'tecnologia@cortexmedical.net'  ; // Usuário do servidor SMTP
    $mail->Password    = 'p#filhos03'                    ; // Senha da caixa postal utilizada

    $mail->From        = 'tecnologia@cortexmedical.net'     ; 
    $mail->FromName    = "Tecnologia da Informação - ( CORTEXMEDICAL )" ;

	$mail->AddAddress($e_mail);

	$mail->SetLanguage("br");

    $mail->IsHTML(true);                     // Define que o e-mail será enviado como HTML
    $mail->CharSet = 'UTF-8';
	
    $mail->Subject     = "Solicitação pelo Site - CORTEXMEDICAL";   // Assunto da mensagem
		
	$message = '<br>'                                     	  .  
	           ' Prezado(a) Sr(a) '.$e_paciente.'<br><br>'	  . 
	           ' O(A) Dr(a) '.$e_medico.' emitiu um(a) '.$e_tipodoc.' em seu nome. Para visualiza-lo(a), utilize o link abaixo.'.			   
			   '<br><br><br>' .
			   'Acesse o(a) '.$e_tipodoc.': '.'<a>'.$_SESSION['LINK_DOC'].'</a>' .
			   '<br><br>'.
			   'Att.'.
			   '<br><br>'.
			   'Cortex Medical'.
			   '<br><br>'.
			   '<img src="./img/rodapemail.png"/>';				   
	
	$mail->MsgHTML($message);
	
	$enviado = $mail->Send();
	
	$mail->ClearAllRecipients();
	
    $mail->ClearAttachments();

	if ($enviado) {
		echo "E-mail enviado com sucesso!" ;
	} else {
		echo "Não foi possível enviar o e-mail." ;
        echo "Informações do erro: " . $mail->ErrorInfo ;
    }
	
	if($e_tipodoc=="RECEITA"){
		header( 'Location: emailDocRec.php' ) ;	
	}else {
		header( 'Location: emailDoc.php' ) ;
	}
	
?>