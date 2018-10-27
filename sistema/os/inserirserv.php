<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

 <!-- Modal body -->
 <form data-toggle="validator" method="post" action="ValInsServ.php">
 <div class="modal-body">
 <div class="col-sm-4">
                      <label>Serviço realizado</label>
                      <input type="text" class="form-control" name="servico">
                    </div>
                    <br>
                    <div class="col-sm-4">
                      <label>Valor</label>
                      <input type="text" class="form-control" name="valor">
                    </div>
                    <br>

                    <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-outline-success" value="Inserir"/>
        </div>
        </div>
                          </form>

        

</body>
</html>
