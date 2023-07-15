<?php
include("database/db.php");
?>

<?php
include("include/header.php");
?>

<main class="container p-4">
    <div class="row">
        <div class="col-md-4">
        <!-- Mensajes-->
        <?php
            if(isset($_SESSION['message'])){  ?>
                <div class="alert alert-<?=$_SESSION['message_type'] ?> alert-dimissible fade show" role="alert">
                    <?=$_SESSION['message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
                <?php session_unset(); }?>

                <div class="card card-body">
                    <form action="save_task.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group mb-3">
                            <textarea name="description" row="2" class="form-control"></textarea>
                    </div>
                    <div class="form-group mb-1">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <input type="submit" name="save_task" class="btn btn-success w-100 btn-block">  
                    </form>
                </div>
        
      




        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">
                            Title
                        </th>
                        <th class="text-center">
                            Description
                        </th>
                        <th class="text-center">
                            Created At
                        </th>
                        <th class="text-center">
                            Image
                        </th>
                        <th colspan="2" class="text-center">
                            Accion
                        </th>
                    </tr>
                    <tbody>
                       <?php $query = "SELECT * FROM task"; 
                       $result_task = mysqli_query($conn,$query);
                       while($row = mysqli_fetch_assoc($result_task)){
                        ?>
                        <tr>
                            <td><?=$row['title'] ?> </td>
                            <td><?=$row['description'] ?> </td>
                            <td><?=$row['create_at'] ?> </td>
                            <td class="resize-image d-flex"> <img src="image.php?id=<?=$row['id'] ?>" alt="" class="w-100"> </td>
                            <td>
                                <a href="edit.php?id=<?=$row['id'] ?>" class="btn btn-secondary rounded-circle"> 
                                <i class="bi bi-pencil-square "></i>
                            </a>
                            </td>
                            <td>
                                <a href="delete_task.php?id=<?=$row['id'] ?>" class="btn btn-danger rounded-circle"> 
                                <i class="bi bi-trash"></i>
                            </a>
                            </td>
                        </tr>
                        
                        <?php
                       }
                       ?>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>

</main>  






<?php
include("include/footer.php");
?> 