<?php

$servername="localhost";
    $username="root";
    $password="";
    $database="project1";
    $connection=new mysqli($servername,$username,$password,$database);

$id="";
$name="";
$email="";
$phone="";
$pan="";
$aadhar="";
$address="";
$errorMessage="";
$successMessage="";

if ( $_SERVER['REQUEST_METHOD']=='GET')
{

    if(!isset($_GET["id"])){
        header("location: /PROJECT1/Index.php");
        exit;
    }

    $id=$_GET["id"];

    $sql="SELECT * FROM Customer3 WHERE id=$id";
    $result=$connection->query($sql);
    $row=$result->fetch_assoc();

    if(!$row)
    {
        header("location : /PROJECT1/Index.php");
        exit;

    }
   
    $name=$row["name"];
    $email=$row["email"];
    $phone=$row["phone"];
    $pan=$row["pan"];
    $aadhar=$row["aadhar"];
    $address=$row["address"];
}
    else{
        $id=$_POST["id"];
        $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $pan=$_POST["pan"];
    $aadhar=$_POST["aadhar"];
    $address=$_POST["address"];
    do{
        if(empty($name) || empty($email) || empty($phone) || empty($pan) || empty($aadhar) || empty($address) ){
            $errorMessage = "All fields are required";
            break;

    }
    $sql="UPDATE Customer3 " .
    "SET name='$name', email = '$email' , phone = '$phone', pan='$pan',aadhar='$aadhar',address='$address' ". 
        "WHERE id=$id";

     $result=$connection->query($sql);

     if(!$result){
        $errorMessage = "Invalid query : ".$connection->error;
        break;
     }  
     $successMessage ="Customer updated successfully";
     header("location : /PROJECT1/Index.php");
     exit;




    } while(false);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container my-5" >
<h2>New customer</h2>
<?php
if(!empty($errorMessage)){
    echo"
    <div class ='alert alert-warning alert-dismissable fade show '  role='alert'>
    <strong>$errorMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
    </div>
    ";
}
?>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
    </div>
</div>
<div class="row mb-3">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
    </div>
</div>
<div class="row mb-3">
        <label class="col-sm-3 col-form-label">Phone</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
    </div>
</div>
<div class="row mb-3">
        <label class="col-sm-3 col-form-label">Pan</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" name="pan" value="<?php echo $pan; ?>">
    </div>
</div>
<div class="row mb-3">
        <label class="col-sm-3 col-form-label">Aadhar</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" name="aadhar" value="<?php echo $aadhar; ?>">
    </div>
</div>
<div class="row mb-3">
        <label class="col-sm-3 col-form-label">Address</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
    </div>
</div>
<?php
if(!empty($successMessage)){
    echo"
    <div class ='alert alert-warning alert-dismissable fade show '  role='alert'>
    <strong>$successMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
    </div>
    ";
}
?>
<div class="row mb-3">
    <div class="offset-sm-3 col-sm-3 d-grid">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <div class="col-sm-3 d-grid">
        <a class="btn btn-outline-primary" href="/PROJECT1/Index.php" role="button">Cancel</a>
    </div>
</div>

</form>
</div>

    
</body>
</html>