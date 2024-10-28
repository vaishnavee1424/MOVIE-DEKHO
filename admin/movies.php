<?php
include('../connect.php');
if(!isset($_SESSION['uid'])){
    echo "<script> window.location.href='../login.php';</script>";
}
?>
<html>
  <head>
    <title>Movies</title>
</head>
    <body>
    <?php include('header.php') ?>
    <?php
    if(isset($_GET['editid'])){
       
        $catid = $_GET['editid'];
    $sql ="SELECT * FROM `categories` WHERE catid = 'editid'";
    $res= mysqli_query($con,$sql);
    $editdata= mysqli_fetch_array($res);
    
?>
<?php
}else{
?>
<div class="container">
        <div class="row">
            <div class="col-lg-6">
<form action="movies.php" method="post" enctype="multipart/form-data"> 
                <div class="form-group mb-4">
                  <select name="catid" class="form-control">
                    <option value="">Select Category</option>
                    <?php
                    $sql = "SELECT * FROM `categories`";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    while($data = mysqli_fetch_array($res)){
      ?> <option value="<?=$data['catid']?>"><?=$data['catname']?></option><?php
    }
  }else{
    ?> <option value="">No Category Found</option> <?php
  } ?> 
      </select>
      <br>
<input type="text" class="form-control" value="" name="title" placeholder="Enter title">
</div>
<div class="form-group mb-4">
<input type="text" class="form-control" value="" name="description" placeholder="Enter description">
</div>
<div class="form-group mb-4">
<input type="date" class="form-control" value="" name="releasedate">
</div>
<div class="form-group mb-4">
  Poster:
<input type="file" class="form-control" value="" name="image">
</div>
<div class="form-group mb-4">
  Trailer:
<input type="file" class="form-control" value="" name="trailer" placeholder="Enter Category">
</div>
<div class="form-group mb-4">
  movie:
<input type="file" class="form-control" value="" name="movie" placeholder="Enter Category">
</div>

<div class="form-group mb-4">
<input type="submit" class="btn btn-primary" value="Add" name="add">
</div>
</form>

<?php
}
?>
</div>
    <div class="col-lg-6">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Poster</th>
                <th>Action</th>
</tr>
<?php
$sql = "SELECT movies.*,categories.catname
from movies 
inner join categories on categories.catid = movies.catid";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    while($data = mysqli_fetch_array($res)){
        ?>
        <tr>
        <td><?=$data['movieid']?></td>
        <td><?=$data['title']?></td>
        <td><?=$data['catname']?></td>
        <td><img src="uploads/<?=$data['image']?>" height="50" width="50"alt=""></td>
        <td><a href="movies.php?editid=<?= $data['catid'] ?>" class="btn btn-primary">Edit</a>
        <td><a href="movies.php?deleteid=<?= $data['movieid'] ?>" class="btn btn-danger">Delete</a></td>
    </td>
        </tr>
        <?php
}
}else{
    echo "no record found";
}
?>
</table>
</div>
</div>
<?php include('footer.php') ?>
</body>

    </html>
   <?php
    if(isset($_POST['add'])){
        $catid = $_POST['catid'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $releasedate = $_POST['releasedate'];
        $image = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];
        $trailer = $_FILES['trailer']['name'];
        $tmp_trailer = $_FILES['trailer']['tmp_name'];
        $movie = $_FILES['movie'];
        $tmp_movie= $_FILES['movie']['tmp_name'];

        move_uploaded_file($tmp_image , "uploads/$image");
        move_uploaded_file($tmp_trailer , "uploads/$trailer");
        move_uploaded_file($tmp_movie , "uploads/$movie");

      $sql = "INSERT INTO `movies`(`title`, `description`, `releasedate`, `image`, `trailer`, `movie`, `catid`) 
      VALUES ('$title','$description','$releasedate','$image','$trailer','$movie','$catid')";
      if(mysqli_query($con,$sql)){
        echo "<script> alert('movies added')</script>";
        echo "<script> window.location.href='movies.php' </script>";
      }else{
        echo "<script> alert('not added')</script>";
      }
if($isset($_POST['update'])){
    $name = $_POST['catname'];
        $catid = $_POST['catid'];
        $sql = "UPDATE `categories` SET `catname`='$catname' WHERE catid = '$catid'";
        if(mysqli_query($con,$sql)){
          echo "<script> alert('category update')</script>";
          echo "<script> window.location.href='categories.php' </script>";
        }else{
          echo "<script> alert('not updated')</script>";
        }
          

}
if($isset($_GET['deleteid'])){
    echo $deleteid = $GET_['deleteid'];
    $sql = "DELETE FROM `categories` WHERE catiid ='$deleteid'";
if(mysqli_query($con,$sql)){
    echo "<script> alert('category deleted)</script>";
    echo "<script> window.location.href='categories.php'</script>";
  }else{
    echo "<script> alert('not')</script>";
  }
}
}
?>
    