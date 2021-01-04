<?php
    $target_dir = "photos/";
    $target_file = $target_dir .basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $target_file = $target_dir.$uname.".".$imageFileType;
@    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    $err ="";
    if($check != false) {
        $uploadOk = 1;
    } else {
        $err .= "Choose a valid file.\\n";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        $err .= "Sorry, your photo is too large.\\n";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $err .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.\\n";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $err = "Sorry,your photo was not uploaded.\\n".$err;
        echo "<script>alert('$err');</script>";
        exit("Error uploading photo");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {

        } else {
            echo "<script>alert('$err');</script>";
            exit("Error uploading photo");
        }
    }
?>