<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Edit</title>
</head>
<body style="background-color:aquamarine;">
    <!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Edit</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action ="<?php echo base_url('/crud/update/'.$output->sno); ?>" method="POST">
            <div class="form-group">
              <input name="name" type="text"  value="<?php echo $output->name ?>" class="form-control input-lg" placeholder="Name">
            </div>
            <div class="form-group">
              <input name="roll_no" value="<?php echo $output->roll_no ?>" type="number" class="form-control input-lg" placeholder="roll no">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Edit</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-1accordion2">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    	  </div>	
      </div>
  </div>
  </div>
</div>
       
</body>
</html>