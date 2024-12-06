<?php 

    include('config/db_connect.php');

    if(isset($_GET['id'])) {

        $id = mysqli_real_escape_string($conn, $_GET['id']);

        //sql query
        $sql = "SELECT * FROM new_info WHERE id = $id";

        //get query result
        $result = mysqli_query($conn, $sql);

        //fetch result as an array
        $detail = mysqli_fetch_assoc($result);

        //free results and close connection
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    //update entry
    if(isset($_POST['update'])) {
        $id_to_update = mysqli_real_escape_string($conn, $_POST['id_to_update']);

        //query

    }


    //delete entry
    if(isset($_POST['delete'])) {
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        //create query
        $sql = "DELETE FROM new_info WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)) {
            //success
            header('Location: index.php');
        } {
            //failure
            echo 'query error: ' . mysqli_error($conn);
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <?php 
        include('header.php');
    ?>


    
    <div class="container-fluid">
    <h3 class="text-center mb-4"><strong>Details</strong></h3>
        <?php if ($detail): ?>
            <div class="mb-4 text-center">
                <div class="circle-detail">
                    <img src="uploads/<?php echo $detail['image']; ?>" alt="Image" class="circle-img-detail">
                </div>
                <p><strong>Name: </strong><?php echo htmlspecialchars($detail['name']); ?></p>
                <p><strong>Email: </strong><?php echo htmlspecialchars($detail['email']); ?></p>
                <p><strong>Address: </strong><?php echo htmlspecialchars($detail['address']); ?></p>
            </div>

            <div class="d-flex justify-content-center">
                <!-- update button -->
                <a href="update.php?id=<?php echo $detail['id'] ?>" class="btn btn-secondary m-0 d-inline me-2">Update</a>

                <!-- delete -->
                <form action="details.php" method="POST" class="m-0 p-0 d-inline">
                    <input type="hidden" name="id_to_delete" value="<?php echo $detail['id'] ?>">
                    <button type="submit" name= "delete" value="Delete" class="btn btn-danger">Delete</button>
                </form>
            </div>

        <?php endif ?>

    </div>
</body>
</html>