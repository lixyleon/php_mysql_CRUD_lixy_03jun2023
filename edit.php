<?php include("database/db.php");
$title = "";
$description = "";
$image = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id=$id";
    $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
            $image = $row['image'];
        }
}

if(isset($_POST['update'])){
 //   $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    //$image= $_POST['image'];
    $image =getimagesize($_FILES['image']['tmp_name']);
    if($image !== false){
        $image = $_FILES['image']['tmp_name'];
        $img_content = addslashes(file_get_contents($image));
    }else{
        $img_content ='';
    }
    $query = "UPDATE task SET title='$title',description='$description', image='$img_content' WHERE id=$id ";
    mysqli_query($conn,$query);
    $_SESSION['message']='Task update Succesfully';
    $_SESSION['message_type'] = 'warning';
    header("location: index.php");

}

include("include/header.php");
?>

<main class="container p-4">
    <div class="row">
        <div class="col-md-4">

        <div class="card card-body">
                    <form action="edit.php?id=<?=$_GET['id']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                        <input type="text" name="title" class="form-control" value="<?php echo $title?>" placeholder="Task Title" autofocus>
                    </div>
                        <div class="form-group mb-3">
                            <textarea name="description" row="2" class="form-control"><?php echo $description?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <input type="file" name="image" class="form-control">
                        <img src="image.php?id=<?=$id?>" alt="" class="w-100">
                    </div>
                    <input type="submit" name="update" class="btn btn-success w-100 btn-block">  
                    </form>
                </div>
        </div>
    </div>

</main>  

        <?php
include("include/footer.php");
?> 