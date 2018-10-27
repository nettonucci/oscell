<?php
   require_once '../conexao.php'; 

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
      $sql = "INSERT INTO clientes 
               (nome, cpf, telefone, celular, email, cep, rua, numero, bairro, cidade, estado)
        VALUES ('$nome', '$cpf', '$telefone', '$celular', '$email', '$cep', '$rua', '$numero', '$bairro', '$cidade', '$estado');";  
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
   header("location: clientes.php");
?> 