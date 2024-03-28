<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5"></div>
    <h2>My Sample Site xD</h2>
    <a href="/sample/create.php" class="btn btn-primary" role="button">New Client</a>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("functions/connection.php");

            // Read all row from the database

            $sql = "SELECT * FROM clients";
            $result = $connection->query($sql);

            if (!$result){
                die("Invalid query : ".$connection->error);
            }

            while($row = $result->fetch_assoc()){
                echo "
                <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[address]</td>
                <td>$row[created_at]</td>
                <td>
                    <a href='sample/edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
                    <a href='sample/delete.php?id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
                </td>
            </tr>
                ";
            }
            ?>
            
        </tbody>
    </table>
</body>
</html>