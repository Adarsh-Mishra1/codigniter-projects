<?php
    //print_r($products);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.validate.min.js"></script>	
</head>
<body>
<script>
     function myDiscount() {
			var amount = $( '#amount' ).val();
			var discount = $( "#discount" ).val();
			if ( discount.search( '%' ) == -1 ) {
				var total1 = discount;
				total = amount - total1;
			} else {
				discount = discount.replace( "%", "" );
				total1 = Math.round( ( amount * discount ) / 100 );
				total = amount - total1;
			}
            //$( "#payable_amount" ).val( total1 );
			$( "#payable_amount" ).val( total );
        }     
</script>
    <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
        <span class="d-none alert alert-success mb-3" id="res_message"></span>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7" style="border:2px solid; padding:2%;">
                <form action="<?php echo base_url('product_update') ?>"  method="post" id="editProductForm" accept-charset="utf-8" >
                    <div class="form-group">
                        <input type="hidden" value="<?= @$products['0']['product_id']; ?>" name="id" >
                        <input type="hidden" value="<?= @$products['0']['user_id']; ?>" name="user_id" >
                        
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                        <?php
                         foreach($category as $row){
                            if($row['category_id']==$products['0']['category']){
                         ?>
                            <option value="<?php echo $row['category_id']; ?>" selected><?php echo $row['name'] ?></option>
                         
                        <?php
                            }else{
                             ?>
                             
                             <option value="<?php echo $row['category_id']; ?>" ><?php echo $row['name'] ?></option>
                             
                             <?php

                            }                        
                         }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">    
                        <label for="subcategory">Sub-Category</label>
                        <select name="sub_category" id="subcategory" class="form-control">
                        <?php
                         foreach($sub_category as $row1){
                            if($row1['sub_categ_id']==$products['0']['sub_category']){
                         ?>
                            <option value="<?php echo $row1['sub_categ_id']; ?>" selected><?php echo $row1['name'] ?></option>
                         
                        <?php
                            }else{
                             ?>
                             
                             <option value="<?php echo $row1['sub_categ_id']; ?>" ><?php echo $row1['name'] ?></option>
                             
                             <?php

                            }                        
                         }
                        ?>
                        </select>
                    </div>   
                    <div class="form-group">
                        <label for="password">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="<?= @$products['0']['title']; ?>" placeholder="Please enter Title">
                    </div>   
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description" value="<?= @$products['0']['description']; ?>" placeholder="Please enter Title">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" class="form-control" id="amount" value="<?= @$products['0']['amount']; ?>" placeholder="Please enter amount">
                    </div>
                    <div class="form-group">
                        <label for="description">Discount %</label>
                        <input type="text" name="discount" class="form-control" id="discount" value="<?= @$products['0']['discount']; ?>" placeholder="Please enter Discount" onblur="myDiscount()">
                    </div>
                    <div class="form-group">
                        <label for="description">Payable Amount</label>
                        <input type="text" name="payable_amount" class="form-control" id="payable_amount" value="<?= @$products['0']['payable_amount']; ?>" placeholder="Please enter Title">
                    </div>

                        
                    <div class="form-group">
                        <button type="submit"  class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
</html>
<script>
$("#editProductForm").validate({
		//alert('fine');
		rules: {
			category: {
				required: true,
			},
			sub_category: {
				required: true,
			},
			title: {
				required: true,
                minlength:3,
				maxlength:50,
			},
			
			description: {
				required: true,
                minlength:3,
				maxlength:150,
			},
			amount: {
                required: true,				
				number:true,
			},
			discount: {
				required: true,
				required: true,				
				
			},
			
			
			
		},
		messages: {
			
			title: {
				required: "Please Enter title",
				minlength:"Minimum 3 characters ",
				maxlength:"Maximum 50 characters",
			},
			description: {
				required: "Enter Description ",
				minlength:"Minimum 3 characters ",
				maxlength:"Maximum 150 characters",
				
			},
			
			amount: {
				required: "Enter amount ",
				number:"Please enter Valid Number"
			},
			
			
			discount: {
				required: "Enter Discount ",				
				
			},
           
			
        												
		},
		submitHandler: function (form) {
			//alert('ok');
			form.submit();
        }    
});

</script>