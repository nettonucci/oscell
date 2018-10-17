<?php
   require_once '../conexao.php'; 

   $id = trim($_POST['id']);
   $nome = trim($_POST['idNome']); 
   $cpf = trim($_POST['idCpf']); 
   $telefone = trim($_POST['idTel']); 
   $celular = trim($_POST['idCel']); 
   $email = trim($_POST['idEmail']); 
   $cep = trim($_POST['idCep']); 
   $rua = trim($_POST['idRua']);
   $numero = trim($_POST['idNum']); 
   $bairro = trim($_POST['idBai']); 
   $cidade = trim($_POST['idCid']); 
   $estado = trim($_POST['idEst']); 

   if (!empty($nome) && !empty($cpf) && !empty($telefone) && !empty($celular) && !empty($email) && !empty($cep) && !empty($rua) && !empty($numero) && !empty($bairro) && !empty($cidade) && !empty($estado)){
    $con = open_conexao(); 
      $sql = "UPDATE clientes SET nome='$nome', cpf='$cpf', telefone='$telefone', celular='$celular', email='$email', cep='$cep', rua='$rua', numero='$numero', bairro='$bairro', cidade='$cidade', estado='$estado'
             WHERE id='$id';";

      $upd = mysqli_query($con,$sql); 
      close_conexao($con); 
      
      if ($upd==FALSE)
        $msg= "Erro na alteração de Cliente<BR/>";
      else {
          $msg = "Foi alterado ". mysqli_affected_rows() . " registro";
          unset($id, $qtde, $val); 
      }
      echo $msg;
   }
   header("location: clientes.php"); 
?> 