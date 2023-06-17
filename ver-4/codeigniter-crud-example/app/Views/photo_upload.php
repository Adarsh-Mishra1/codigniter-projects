<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Photo upload</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Upload</h2>
					
					<?php
					print_r($errors);
					print_r($data);

					//foreach ($errors as $error): ?>
					<!---	<li><?//= esc($error) ?></li> -->
					<?php //endforeach ?>
					<br>
                <form action="<?php echo base_url(); ?>/User/file_upload" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <input type="file" name="image" placeholder=""  class="form-control" >
                    </div>
                                        
                    <div class="d-grid">
                         <button type="submit" class="btn btn-success">upload</button>
                    </div>     
                </form>
            </div>
              
        </div>
    </div>
  </body>
</html>