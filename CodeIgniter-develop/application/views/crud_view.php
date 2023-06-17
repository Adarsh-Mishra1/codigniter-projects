<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Codeigniter CRUD Application With Example - Tutsmake.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
        .mt40{
            margin-top: 40px;
        }
    </style>
</head>
<body>
    
<div class="container">
    <div class="row mt40">
   <div class="col-md-10">
    <h2>Codeigniter Basic Crud Example - Self Make</h2>
   </div>
   <div class="col-md-2">
      <form action="<?php echo base_url('crud/create/'); ?>" method="post">
      <button type="buttonl" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      </form>
      Add
    </button>   </div>
   <br><br>
 
    <table class="table table-bordered">
       <thead>
          <tr>
             <th>Sno</th>
             <th>Name</th>
             <th>Roll NO</th>
             <td colspan="2">Action</td>
          </tr>
       </thead>
       <tbody>
          
        <?php if($product_details): ?>
          <?php foreach($product_details as $data): ?> 
          <tr>
             <td><?php echo $data->sno ;?></td>
             <td><?php echo $data->name ?></td>
             <td><?php echo $data->roll_no ?></td>
             <td>
                <a href="<?php echo base_url('crud/edit/'.$data->sno) ?>" class="btn btn-primary">Edit</a></td> 
              <td>
                <form action="<?php echo base_url('crud/delete/').$data->sno; ?>" method="post">
                  <button class="btn btn-danger" >Delete</button> 
                </form>
            </td>
          </tr>
          <?php endforeach; ?>
         <?php  endif; ?> 
        
       </tbody>
    </table>
    
</div>
</div>
    <!-- Button trigger modal -->


<!-- Modal -->

</body>
</html>


<script type="text/javascript">
  function form_submit() {
    document.getElementById("search_form").submit();
   }    
  </script>