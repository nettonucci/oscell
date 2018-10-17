<?php
   require_once '../conexao.php'; 

   $peca = trim($_POST['idpec']); 
   $qtd = trim($_POST['idQtd']); 
   $idos = trim($_POST['idos']);

 
   if (!empty($peca) && !empty($qtd) && !empty($idos)){
      $con = open_conexao();  
      $sql = "INSERT INTO ospeca 
               (idpeca, quantidadeos, idos)
        VALUES ('$peca', '$qtd', '$idos');";  
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
   header('location: os/editos.php?idos=' + .$idos);
?> 