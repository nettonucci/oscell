<?php
   require_once '../conexao.php'; 

   $id = trim($_POST['id']);
  
   if (!empty($id)){
      $con = open_conexao(); 
      $sql = "DELETE FROM estoque WHERE idd='$id';";

      $rem = mysqli_query($con,$sql); 
      close_conexao($con); 

      if ($rem==FALSE)
        $msg= "Erro na remoção de Peças<BR/>";
      else {
          $msg = "Foi removido ". mysqli_affected_rows() . " registro";
          unset($id); 
      }
      echo $msg;
   }
   header("location: estoque.php"); 
?> 