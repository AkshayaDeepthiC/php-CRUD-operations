<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5" >
        <h2>List of Customers</h2>
        <a class="btn btn-primary" href="/PROJECT1/create.php" role="button">New Customer</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>pan</th>
        <th>Aadhar</th>
        <th>Address</th>
        <th>created at</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="project1";
    $connection=new mysqli($servername,$username,$password,$database);

    if($connection->connect_error)
    {
        die("connection failed:" .$connection->connect_error);
    }
    $sql ="SELECT * from Customer3";
    $result=$connection->query($sql);
    if(!$result)
    {
        die("invalid query: " .$connection->error);
    }
    while($row = $result->fetch_assoc())
    {
        echo"
        <tr>
        <td>$row[id]</td>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[phone]</td>
        <td>$row[pan]</td>
        <td>$row[aadhar]</td>
        <td>$row[address]</td>
        <td>
            <a class = 'btn btn-primary btn-sm' href='/PROJECT1/edit.php?id=$row[id]'>Edit</a>
            <a class = 'btn btn-primary btn-sm' href='/PROJECT1/delete.php?id=$row[id]'>Delete</a>
        </td>
    </tr>
        ";
    }

    ?>

</tbody>
        </table>
    </div>
    
</body>
</html>