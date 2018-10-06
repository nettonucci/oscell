<?php
   require_once 'conexao.php'; 

   $status = trim($_POST['idstatus']); 
   $idcliente = trim($_POST['idcli']); 
   $dataentrada = trim($_POST['iddataent']); 
   $equipamento = trim($_POST['iddesc']); 
   $defeito = trim($_POST['iddef']); 
   $obs = trim($_POST['idobs']); 

 
   if (!empty($status) && !empty($idcliente) && !empty($dataentrada) && !empty($equipamento) && !empty($defeito) && !empty($obs)){
      $con = open_conexao();  
      $sql = "INSERT INTO os 
               (status, idcliente, dataentrada, equipamento, defeito, obs)
        VALUES ('$status', '$idcliente', '$dataentrada', '$equipamento', '$defeito', '$obs');";  
      $ins = mysqli_query($con, $sql); 

      if ($ins==FALSE)
        $msg= "Erro no cadastro de cliente<BR/>";
      else {
          $msg = "Foi inserido com sucesso";
          unset($nome, $cpf, $telefone, $celular, $email, $cep, $rua, $numero, $bairro, $cidade, $estado); 
      }
      close_conexao($con); 
      echo $msg;
   }
   header("location: os.php");
?> 