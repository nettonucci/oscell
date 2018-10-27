<?php
   require_once '../conexao.php'; 

   $id = trim($_POST['id']);
   $desc = trim($_POST['idDesc']); 
   $comp = trim($_POST['idComp']); 
   $vend = trim($_POST['idVend']);
   $qtd = trim($_POST['idQtd']);

   if (!empty($id) && !empty($desc) && !empty($comp) && !empty($vend) && !empty($qtd)){
      $con = open_conexao(); 
      $sql = "UPDATE estoque SET descricao='$desc', precocompra='$comp', precovenda='$vend', quantidade='$qtd'
             WHERE id='$id';";

      $upd = mysqli_query($con,$sql); 
      close_conexao($con); 
      
      if ($upd==FALSE)
        $msg= "Erro na alteração de Peças<BR/>";
      else {
          $msg = "Foi alterado ". mysqli_affected_rows() . " registro";
          unset($id, $qtde, $val); 
      }
      echo $msg;
   }
   header("location: estoque.php"); 
?> 