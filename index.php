<?php 

    include ('config/db_connect.php');

    //query
    $sql = "SELECT id, name, address, email, image FROM new_info";

    //get result
    $result = mysqli_query($conn, $sql);

    //fetch resulting rows as array
    $infos = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);
    // print_r($infos);
?>

<!DOCTYPE html>
<html>

<?php include('header.php'); ?>



<section class="container-fluid info">
    <h3 class="text-center"><strong>Information</strong></h3>
        <div class="row">
            <?php foreach($infos as $info) { ?>
                <div class="col-md-3 col-12">
                    <div class="card p-4 my-5 text-center">
                        <div class="circle">
                            <img src="uploads/<?php echo $info['image']; ?>" alt="Image" class="circle-img">
                        </div>
                        
                        <h5 class="mb-3"><?php echo htmlspecialchars($info['name']) ?></h5>
                        <p><?php echo htmlspecialchars($info['address']) ?></p>
                        <p><?php echo htmlspecialchars($info['email']) ?></p>

                        <div class="card-action text-end">
                            <a href="details.php?id=<?php echo $info['id'] ?>">More Info</a>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>
</section>

</body>
</html>