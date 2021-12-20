<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 06</title>
</head>

<body>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <label for="photo">Please Upload Image</label><br><br>
        <input type="file" name="photo"><br><br><br>
        <label for="folder">Folder Name</label><br><br>
        <input type="text" name="folder"><br><br><br>
        <input type="submit" name="submit" value="Save">
    </form><br><br>
    <?php
    /**
     * Validate Form, Create Folder and Insert Image
     */
    if (isset($_POST['submit'])) {
        $folder = $_POST['folder'];
        $name = $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];
        $type = $_FILES['photo']['type'];
        if ($folder && $tmp) {
            if ($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg") {
                mkdir("$folder");
                move_uploaded_file($tmp, "$folder/$name");
                echo "Upload Finished.";
            } else {
                echo "Please Insert Only .jpeg or .jpg or .png Image File!";
            }
        } else {
            echo "Cannot empty Both Folder Name and Image!";
        }
    }
    ?>
</body>

</html>