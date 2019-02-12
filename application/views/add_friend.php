<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/themes/custom/styles.css">
    <script src="main.js"></script>
</head>
<body>
    <div class = "container">
    <?php 
       
       if(!empty($form_errors)){
           echo $form_errors;
       }
       ?>

<?php echo form_open($this->uri->uri_string());?>

<div>
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" />
</div>
<div>
    <label for="age">Age</label>
    <input type="number" name="age" />
</div>
<div>
    <label for="gender">Gender</label>
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Female">Female
</div>
<div>
    <label for="hobby">Hobby</label>
    <input type="text" name="hobby" />
</div>
<div class="submit_button">
    <input type="submit" value="Welcome Friend" />
</div>

<?php echo form_close()?>
</div>
    
</body>
</html>