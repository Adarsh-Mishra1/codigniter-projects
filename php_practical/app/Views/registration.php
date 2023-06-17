
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
</head>
<body>
<div class="container">
<br>
<?= \Config\Services::validation()->listErrors(); ?>
<span class="d-none alert alert-success mb-3" id="res_message"></span>
<div class="row">
<div class="col-md-9">
<form action="javascript:void(0)"  name="ajax_form" id="ajax_form" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="formGroupExampleInput">Name</label>
<input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter name">
</div> 
<div class="form-group">
<label for="email">Email </label>
<input type="text" name="email" class="form-control" id="email" placeholder="Please enter email id">
</div>   

<div class="form-group">
<label for="image">Image </label>
<input type="file" name="file" 
class="form-control form-control-lg" id="file" accept="image/*">
</div>   

<div class="form-group">
<label for="password">Password </label>
<input type="text" name="password" class="form-control" id="password" placeholder="Please enter email id">
</div>   
<div class="form-group">
<label for="phone">Phone</label>
<input type="text" name="phone" class="form-control" id="phone" placeholder="Please enter email id">

<input type="hidden" name="image" id="image>
</div>   

<div class="form-group">
<button type="submit" id="send_form" class="btn btn-success">Submit</button>
</div>
</form>
</div>
</div>
</div>
<script>
if ($("#ajax_form").length > 0) {
$("#ajax_form").validate({
rules: {
name: {
required: true,
},
email: {
required: true,
maxlength: 50,
email: true,
}, 
password: {
required: true,
maxlength: 50,

}, 
phone: {
required: true,
maxlength: 50,
}, 
 
},
messages: {
name: {
required: "Please enter Name",
},
password: {
required: "Please enter Password",
},
phone: {
required: "Please enter Phone",
},
email: {
required: "Please enter valid email",
email: "Please enter valid email",
maxlength: "The email name should less than or equal to 50 characters",
},      

},
submitHandler: function(form) {
var d = document.getElementById('file');
//alert(d.value);

$('#send_form').html('Sending..');
$.ajax({
url: "<?php echo base_url('/create') ?>",
type: "POST",
data: $('#ajax_form').serialize(),
dataType: "json",
success: function( response ) {
console.log(response);
console.log(response.success);
$('#send_form').html('Submit');
$('#res_message').html(response.msg);
$('#res_message').show();
$('#res_message').removeClass('d-none');
//document.getElementById("ajax_form").reset(); 
setTimeout(function(){
$('#res_message').hide();
$('#res_message').html('');
if(response.success==true){
        window.location.href = "<?php echo base_url('login') ?>"
        //console.log('inside');
}  
},1000);
}
});
}
})
}
</script>
</body>
</html>