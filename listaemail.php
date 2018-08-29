<?php

  if(isset( $_POST['email'] )) {

      $data = $_POST['email'].',' ;

      $ret = file_put_contents( __DIR__ . '/listaemail.txt'  ,  $data  , FILE_APPEND | LOCK_EX ) ;

      if($ret === false) {
        echo "Erro em Gravar o Arquivo !" ;
      }
      else 
      {
        echo "Email Gravado !" ;
      }

  }
  else 
  {
       echo "Email não informado !" ;
  }


?>