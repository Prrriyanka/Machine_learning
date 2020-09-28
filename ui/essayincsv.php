<?php
//index.php

$error = '';
$Essayset = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["Essayset"]))
 {
  $error .= '<p><label class="text-danger">Please Enter Essayset</label></p>';
 }
 else
 {
  $Essayset = clean_text($_POST["Essayset"]);
  if(!preg_match("/^[0-9]*$/",$Essayset))
  {
   $error .= '<p><label class="text-danger">Only numeric value space allowed</label></p>';
  }
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }

 if($error == '')
 {
  $file_open = fopen("essays.csv", "a");
  $no_rows = count(file("essays.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'Essayset'  => $Essayset,
   'message' => $message
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Thank you</label>';
  $Essayset = '';
  $message = '';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>essay csv</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Enter your details</h2>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Enter Essayset</label>
      <input type="text" name="Essayset" placeholder="Enter Essayset" class="form-control" value="<?php echo $Essayset; ?>" />
     </div>
      <label>Enter essay</label>
      <textarea name="message" class="form-control" placeholder="Enter essay"><?php echo $message; ?></textarea>
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
   </div>
  </div>
 </body>
</html>
