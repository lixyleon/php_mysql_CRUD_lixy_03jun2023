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
            
        </div>
    </div>

</main>  






<?php
include("include/footer.php");
?> 