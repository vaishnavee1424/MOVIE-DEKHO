<?php
include('../connect.php');
if(!isset($_SESSION['uid'])){
    echo "<script> window.location.href='../login.php';</script>";
}
?>
<html>
  <head>
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
<form action="categories.php" method="post"> 
                <div class="form-group mb-4">
<input type="text" class="form-control" value="" name="catname" placeholder="Enter Category">
</div>
                    <div class="form-group mb-4">
                        
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
                <th>Action</th>
</tr>
<?php
$sql = "SELECT * FROM `categories`";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    while($data = mysqli_fetch_array($res)){
        ?>
        <tr>
        <td><?=$data['catid']?></td>
        <td><?=$data['catname']?></td>
        <td><a href="categories.php?editid=<?= $data['catid'] ?>" class="btn btn-primary">Edit</a>
       
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
        $name = $_POST['catname'];
      $sql = "INSERT INTO `categories`(`catname`) VALUES ('$name')";
      if(mysqli_query($con,$sql)){
        echo "<script> alert('category added')</script>";
        echo "<script> window.location.href='categories.php' </script>";
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
    $sql = "DELETE FROM `categories` WHERE catid ='$deleteid'";
if(mysqli_query($con,$sql)){
    echo "<script> alert('category deleted)</script>";
    echo "<script> window.location.href='categories.php'</script>";
  }else{
    echo "<script> alert('not')</script>";
  }
}
}
?>
    