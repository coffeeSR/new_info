<?php 

    //connect db
    include('config/db_connect.php');

    $name = $email = $address = $image = '';
    $errors = array('name' => '', 'email' => '', 'address' => '', 'image' => '');


    if(isset($_POST['submit'])) {
        // echo htmlspecialchars($_POST['name']);
        // echo htmlspecialchars($_POST['email']);
        // echo htmlspecialchars($_POST['address']);
    
        // check name
        if(empty($_POST['name'])) {
            $errors['name'] = 'A name is required'. '<br />';
        } else {
            $name = $_POST['name'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $name)) {
            $errors['name'] = 'Name must be letters and spaces only' . '<br />';
            }
        }

        //check address
        if(empty($_POST['address'])) {
            $errors['address'] = 'An address is required'. '<br />';
        } else {
            $address = $_POST['address'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $address)) {
            $errors['address'] = 'Address must be letters and spaces only' . '<br />';
            }
        }

        //check email
        if(empty($_POST['email'])) {
            $errors['email'] = 'An email is required <br/>';
        } else {
            $email = $_POST['email'];
           
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Enter a valid email address'. '<br />';
            }
        }

        //check image
        if($_FILES['image']['error'] == 4) {
            $errors['image'] = "An image is required";
        } else {
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $tmpName = $_FILES['image']['tmp_name'];

            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
            if(!in_array($imageExtension, $validImageExtension)) {
                $errors['image'] = "Invalid Image Extension.";
            } else if ($fileSize > 1000000) {
                $errors['image'] = "Image size is too large";
            } else {
                $newImageName = uniqid();
                $newImageName .= '.'. $imageExtension; 

                move_uploaded_file($tmpName, 'uploads/'. $newImageName);

            }
        }

        if(array_filter($errors)) {
            //echo errors in form
        } else {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            //sql query
            $sql = "INSERT INTO new_info (name, address, email, image) VALUES ('$name', '$address', '$email', '$newImageName')";

            //save to db
            if(mysqli_query($conn, $sql)) {
                header('Location:index.php');
            } else {
                echo 'query error: ' . mysqli_error($conn);
            }
        }
    }

?>

<!DOCTYPE html>
<html>
    <?php   include('header.php');  ?>
    <section class="container-fluid">
        <h3 class="mb-1 text-center"><strong>Add new entry</strong></h3>
        <form action="form.php" method='POST' enctype="multipart/form-data">

            <label for="name"><strong>Name</strong></label> 
            <input type="text" name="name" class="my-2" value="<?php echo htmlspecialchars($name) ?>">
            <div class="text-danger"><?php echo $errors['name'] ?></div>

            <label for="email"><strong>Email</strong></label>
            <input type="text" name="email" class="my-2" value="<?php echo htmlspecialchars($email) ?>">
            <div class="text-danger"><?php echo $errors['email'] ?></div>

            <label for="address"><strong>Address</strong></label>
            <input type="text" name="address" class="my-2" value="<?=htmlspecialchars($address) ?>">
            <div class="text-danger"><?php echo $errors['address'] ?></div>

            <label for="image"><strong>Upload your profile picture</strong></label>
            <input type="file" name="image" class="my-2" id="image" accept=".jpeg, .jpg, .png" value="<?php htmlspecialchars($image) ?>">
            <div class="text-danger"><?php echo $errors['image'] ?></div>
    
            <input type="submit" name="submit" class="btn btn-primary my-2">


        </form>
    </section>
</html>