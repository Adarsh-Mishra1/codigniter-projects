<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    
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
                <form action="<?php echo base_url('product_create') ?>" name="ajax_form" id="ajax_form"  method="post" accept-charset="utf-8" >
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                        <option value="">Select</option>
                         <?php
                         foreach($category as $row){
                         ?>
                            <option value="<?php echo $row['category_id'] ?>"><?php echo $row['name'] ?></option>
                         
                         <?php
                         }
                         ?>
                        </select>
                    </div> 
                    <div class="form-group">   
                        <label for="subcategory">Sub-Category</label>
                        <select name="sub_category" id="subcategory" class="form-control">
                        <option value="">Select</option>
                        <?php
                         foreach($sub_category as $row1){
                         ?>
                             <option value="<?php echo $row1['sub_categ_id'] ?>"><?php echo $row1['name'] ?></option> 
                         
                        <?php
                         }
                        ?>
                        </select>
                    </div>   
                    <div class="form-group">
                        <label for="password">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Please enter Title">
                    </div>   
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Please enter Title">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="Please enter Title">
                    </div>
                    <div class="form-group">
                        <label for="description">Discount %</label>
                        <input type="text" name="discount" class="form-control" id="discount" placeholder="Please enter Discount" onblur="myDiscount()">
                    </div>
                    <div class="form-group">
                        <label for="description">Payable Amount</label>
                        <input type="text" name="payable_amount" class="form-control" id="payable_amount" placeholder="Please enter Title">
                    </div>

                        
                    <div class="form-group">
                        <button type="submit"  class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
if ($("#ajax_form").length > 0) {
    $("#ajax_form").validate({
        rules: {

            category: {
            required: true,
            }, 
            sub_category: {
            required: true,
            maxlength: 50,

            }, 
            title: {
            required: true,
            maxlength: 50,

            }, 
            description: {
            required: true,
            maxlength: 50,

            }, 
            sub_category: {
                required:true,
            }, 
            amount:{
                required:true,
            },
 
        },
        messages: {

           

        },
        submitHandler: function(form) {
    
        }
    })
}


</body>
</html>