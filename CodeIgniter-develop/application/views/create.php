<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>create record</title>
</head>
<body>
    <div class="container">  
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="<?php echo base_url('crud/insert'); ?>" id="search_form" name="insert_form" method="POST">
       
              <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text " class="form-control">
               
                <?php
                      if (isset($this->session->flashdata('errors')['name'])){
                          echo '<div class="alert alert-danger mt-2">';
                          echo $this->session->flashdata('errors')['name'];
                          echo "</div>";
                      }
                    ?>
              </div> 
              <div class="form-group">   
                <label for="roll_no">Roll NO</label>
                <input name="roll_no" type="number " class="form-control">
              </div>
         
      </form>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal"><a href="<?php echo base_url('crud'); ?>">Close</a></button>
        <button onclick="form_submit();" form="insert_form"  name="submit" value="add_entry" class="btn btn-primary">Save changes</button>
      </div>
    </div>
</div>
<?php echo validation_errors(); ?> 
</body>
</html>
<script type="text/javascript">
  function form_submit() {
    document.getElementById("search_form").submit();
   }    
  </script>