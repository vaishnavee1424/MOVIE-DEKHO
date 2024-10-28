<?php
include('../connect.php');
if(!isset($_SESSION['uid'])){
    echo "<script> window.location.href='../login.php';</script>";
}
?>
<html>
  <head>
    <title>Theater</title>
  </head>
  <body>
    <?php include('header.php') ?>
    <?php
    if(isset($_GET['editid'])){
        $catid = $_GET['editid'];
        $sql ="SELECT * FROM `categories` WHERE catid = '$catid'";
        $res= mysqli_query($con,$sql);
        $editdata= mysqli_fetch_array($res);
    ?>
    <!-- Edit form can be placed here -->
    <?php
    } else {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form action="theater.php" method="post" enctype="multipart/form-data"> 
                    <div class="form-group mb-4">
                        <select name="movieid" class="form-control">
                            <option value="">Select Movies</option>
                            <?php
                            $sql = "SELECT * FROM `movies`";
                            $res = mysqli_query($con,$sql);
                            if(mysqli_num_rows($res)>0){
                                while($data = mysqli_fetch_array($res)){
                            ?>
                                <option value="<?=$data['movieid']?>"><?=$data['title']?></option>
                            <?php
                                }
                            } else {
                            ?>
                                <option value="">No Movie Found</option>
                            <?php
                            } 
                          }?> 
                        </select>
                        <br>
                        <input type="time" class="form-control" name="timing" >
                    </div>
                    <div class="form-group mb-4">
                        <input type="text" class="form-control" name="days" placeholder="Enter Days">
                    </div>
                    <div class="form-group mb-4">
                        <input type="date" class="form-control" name="date">
                    </div>
                    <div class="form-group mb-4">
                        <input type="number" class="form-control" name="price" placeholder="Enter Price">
                    </div>
                    <div class="form-group mb-4">
                        <input type="text" class="form-control" name="location" placeholder="Enter Location">
                    </div>
                    <div class="form-group mb-4">
                        <input type="submit" class="btn btn-primary" value="Add Theater" name="add">
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Days/Time</th>
                        <th>Ticket</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sql = "SELECT theater.*, movies.title, categories.catname 
                            FROM theater
                            INNER JOIN movies ON movies.movieid = theater.movieid
                            INNER JOIN categories ON categories.catid = movies.catid";
                    $res = mysqli_query($con,$sql);
                    if(mysqli_num_rows($res) > 0){
                        while($data = mysqli_fetch_array($res)){
                    ?>
                        <tr>
                            <td><?=$data['theaterid']?></td>
                            <td><?=$data['title']?></td>
                            <td><?=$data['catname']?></td>
                            <td><?=$data['date']?></td>
                            <td><?=$data['days']?>-<?=$data['timing']?></td>
                            <td><?=$data['price']?></td>
                            <td><?=$data['location']?></td>
                            <td>
                                <a href="theater.php?editid=<?= $data['theaterid'] ?>" class="btn btn-primary">Edit</a>
                                <a href="theater.php?deleteid=<?= $data['theaterid'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                        }
                    } else {
                        echo "no record found";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>
  </body>
</html>

<?php
if(isset($_POST['add'])){
    $movieid = $_POST['movieid'];
    $days = $_POST['days'];
    $timing = $_POST['timing'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $location = $_POST['location'];
 
    $sql = "INSERT INTO `theater`(`timing`, `days`, `date`, `price`,`location`,`movieid`) 
            VALUES ('$timing','$days','$date','$price','$location','$movieid')";
    if(mysqli_query($con,$sql)){
        echo "<script> alert('theater added')</script>";
        echo "<script> window.location.href='theater.php' </script>";
    } else {
        echo "<script> alert('theater not added')</script>";
    }
}

if(isset($_POST['update'])){
    $catname = $_POST['catname'];
    $catid = $_POST['catid'];
    $sql = "UPDATE `categories` SET `catname`='$catname' WHERE catid = '$catid'";
    if(mysqli_query($con,$sql)){
        echo "<script> alert('category updated')</script>";
        echo "<script> window.location.href='categories.php' </script>";
    } else {
        echo "<script> alert('category not updated')</script>";
    }
}

if(isset($_GET['deleteid'])){
    $deleteid = $_GET['deleteid'];
    $sql = "DELETE FROM `categories` WHERE catid ='$deleteid'";
    if(mysqli_query($con,$sql)){
        echo "<script> alert('category deleted')</script>";
        echo "<script> window.location.href='categories.php'</script>";
    } else {
        echo "<script> alert('category not deleted')</script>";
    }
}
?>