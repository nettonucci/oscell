<?php
   require_once '../conexao.php'; 

   $peca = trim($_POST['idpec']); 
   $qtd = trim($_POST['idQtd']); 
   $idos = trim($_POST['idos']);

   $con = open_conexao(); 
   //selectDb(); 
      //recuperar valor passado por get
   $id = trim($_REQUEST['idpec']);
       //buscar no banco de dados
   $rs = mysqli_query($con, "select * from estoque WHERE id=".$id);
   
   $row = mysqli_fetch_array($rs); 
   $qtdest = $row['quantidade'];
   $soma = $qtdest - $qtd;

 
   if (!empty($peca) && !empty($qtd) && !empty($idos)){
      $con = open_conexao();  
      $sql = "INSERT INTO ospeca 
               (idpeca, quantidadeos, idos)
        VALUES ('$peca', '$qtd', '$idos');";  
      $ins = mysqli_query($con, $sql); 

      $sql2 = "UPDATE estoque SET quantidade='$soma'
             WHERE id='$peca';";
      $upd = mysqli_query($con,$sql2); 

      if ($ins==FALSE)
        $msg= "Erro no cadastro de cliente<BR/>";
      else {
          $msg = "Foi inserido com sucesso";
          unset($nome, $cpf, $telefone, $celular, $email, $cep, $rua, $numero, $bairro, $cidade, $estado); 
      }
      close_conexao($con); 
      echo $msg;
   }
   header('location: editos.php?idos='.$idos);
?> 