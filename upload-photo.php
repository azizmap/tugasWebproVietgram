<?php
    include "connection.php";

    if(isset($_POST['upload'])){
        $image = $_FILES['image']['name'];
        $target = 'images/' . $image;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            $like = 0;
            $caption = $_POST['caption'];
            $query = mysqli_query($conn, "INSERT INTO photo VALUES('" . $target . "', '" . $caption . "', '" . $like . "')");
            session_start();
            header('Location: feed.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vietgram</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <div class="col-4 offset-md-4 form-div">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="caption">Caption</label>
                <input type="textarea" class="form-control" name="caption" id="caption">
            </div>
            <button type="submit" name="upload" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
</html>