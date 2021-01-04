<div id="chngPhoto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <form action="#" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Photo</h4>
      </div>
      <div class="modal-body"> 
                <div class="form-control"><input type="file" id="photo" name="photo"  /></div> 

<?php

if(isset($_POST['submit'])){
    $target_dir = "../admin/photos/";
    $target_file = $target_dir .basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $target_file = $target_dir.$uname.".".$imageFileType;
@    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Choose another photo. ";
        $uploadOk = 0;
    }

    
    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }   
    
    $photo_name = $uname.".".$imageFileType;
    $query = "update emp_info set photo='$photo_name' where uname='$uname'";
    if ($uploadOk==1 && $conn->query($query) === TRUE) {
        echo "<script>location.href='view_profile.php';</script>";
    } else {
        echo "<script>alert('Some error occured');</script>" . $conn->error;
    }
       // $query = "select photo from emp_info where uname='$uname'";
       // $result = mysqli_query($conn,$query);
      //  $row = mysqli_fetch_assoc($result);
      //  $photo = $row['photo'];
      //  $image_path = "../admin/photos/".$photo;
    
}
    
?>
          
          
          </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="submit" name="submit">Save</button>
      </div>
          </form>
    </div>

  </div>
</div>