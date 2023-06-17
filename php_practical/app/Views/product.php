<?php
    //print_r($user_profile);
    
    // echo "<br>";
    // echo $profile['email'];

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
	<title>Product</title>
</head>
<body>
	<!-- Image and text -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzU-9mtmmX0Rf9ip_7jaO8x0zIRubCyrRME23jRVts&s" alt="" height="50px">Hello
    <?= @$user_profile['username']; ?>
  </a>
  <a class="navbar-brand" href="<?php echo base_url('logout'); ?>">
   Logout
    
  </a>
</nav>	
	<section>
    <div class="container">
      <div class="row pt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <a class="btn btn-block btn-sm btn-warning" data-toggle="modal" href="<?php echo base_url('add-edit'); ?>">
              <i class="fa fa-plus-square" style="font-size: 40px;" id="icone_grande"></i>
              <span class="texto_grande"><h4> ADD PRODUCT</h4></span></a>
        </div>        

      </div>         
    </div>      
  <div class="container pt-5">
     <!-- Table starts here -->
     <table class="table table-bordered table-striped table-hover ">
        <thead>
          <tr>
            <th scope="col">S.NO</th>                       
            <th scope="col">Title</th>                                   
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Subcategory </th>            
            <th scope="col">Amount </th>            
            <th scope="col">Discount </th>            
            <th scope="col">Payable Amount</th>            
            <th scope="col" style="text-align: center;" colspan="2">Action</th>            
          </tr>
        </thead>
        <tbody>           
          
			<?php
			$sno=1;
		  	foreach($products as $row){			             
				echo '
			<tr>
				</td>
				<td>'.$sno.'</td>
				<td>'.$row['title'].'</td>
				<td>'.$row['description'].'</td>';
          foreach($category as $row1){
            if($row1['category_id']==$row['category']){
              echo '<td>'.$row1['name'].'</td>';	
            }
          }
         foreach($sub_category as $row2){
            if($row2['sub_categ_id']==$row['sub_category']){
              echo '<td>'.$row2['name'].'</td>';	
            }
          } 
        echo '											
				<td>'.$row['amount'].'</td>				
				<td>'.$row['discount'].'</td>				
				<td>'.$row['payable_amount'].'</td>				
			          
        ';
			$sno++;
        
        
			?>
			<td>
				<a class="btn btn-outline-secondary btn-sm" href="<?= site_url('product_update_form/').$row['product_id']; ?>"><i class="zmdi zmdi-edit"></i> Edit</a>
			</td>
			<td>
				<a href="<?= site_url('delete/').$row['product_id']; ?>" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row['product_id']; ?>"><i class="fas fa-trash"></i> Delete</a>
			</td>
			<?php } ?>
          </tr>                   
        </tbody>
      </table>      
  </div> 
</section>           
</body>
</html>

