<!DOCTYPE html>

<?php
if (isset($_POST['upload'])){
    $name=$_FILES['file_video']['name'];
    $type=$_FILES['file_video']['type'];
    $size=$_FILES['file_video']['size'];
    $nama_file=str_replace(" ","_",$name);
    $tmp_name=$_FILES['file_video']['tmp_name'];
    $nama_folder="list/";
    $file_baru=$nama_folder.basename($nama_file);
    if ((($type == "video/mp4") || ($type == "video/3gpp")) && ($size < 8000000 )){
       move_uploaded_file($tmp_name,$file_baru);
       $pesan="Upload file video $nama_file berhasil diupload";
    }
    else{
        $pesan="File Video Terlalu Besar Atau Format Video Salah!";
    }
    echo "<p style='color:green;'>$pesan</p>";
}
?>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style type="text/css">
    video, input {
    display: block;
}

input {
    width: 100%;       
}

.info {
    background-color: aqua;            
}

.error {
    background-color: red;
    color: white;
}
  </style>
  <title>Movie Web Player</title>
</head>
<body style="background: #000;">
<h3 style="background: #fff;">Portal Film Offline</h3><hr >
<div class="row">
  <div class="col-6">
  
   <form enctype="multipart/form-data" method="post" class="form-group">
    <label style="color: #fff;">Upload Film</label>
        <input type="file" name="file_video"  class="form-control" />
        <input type="submit" name="upload" value="Upload" class="btn btn-primary" />
    </form>
</div>
</div>
<hr style="background: #fff">
<h3 style="background: #fff;">List Movie </h3><hr style="background: #fff">
             <?php 
                          $dir2 ="list";
                        if (is_dir($dir2)) {
    if ($dh2 = opendir($dir2)) {
        while (($file2 = readdir($dh2)) !== false) {
       if ($file2 == ".." or $file2 == ".") {
         # code...
       }else{

   ?>
            
                      
                           <a href="play.php?video=<?php echo $file2; ?>" target="_blank">•  <?php echo $file2 ?></a><br><br>
                           


                     <?php  }  }      
        closedir($dh2);
    }
}
?>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">

</script>