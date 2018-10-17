<?php
   require_once '../conexao.php'; 

   $desc = trim($_POST['idDes']); 
   $comp = trim($_POST['idComp']); 
   $vend = trim($_POST['idVend']); 
   $qtd = trim($_POST['idQtd']); 
   
 
   if (!empty($desc) && !empty($comp) && !empty($vend) && !empty($qtd)){
      $con = open_conexao();  
      $sql = "INSERT INTO estoque 
               (descricao, precocompra, precovenda, quantidade)
        VALUES ('$desc', '$comp', '$vend', '$qtd');";  
      $ins = mysqli_query($con, $sql); 

      if ($ins==FALSE)
        $msg= "Erro no cadastro de cliente<BR/>";
      else {
          $msg = "Foi inserido com sucesso";
          unset($desc, $comp, $vend, $qtd); 
      }
      close_conexao($con); 
      echo $msg;
   }
   header("location: estoque.php");
?> 