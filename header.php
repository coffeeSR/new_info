<?php 
 ?>

 <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            height: 100vh;
            width: 100vw;   
        }
        .container-fluid{
            padding: 30px 180px;
        }
        h4{
            padding: 30px 180px;
        }
        h3{
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
        }
        a{
            text-decoration: none;
        }
         /* index */
        .row{
            margin-top: 70px;
        }
        .container{
            padding: 30px 180px;
            margin: 0;
        }
        .circle{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            display: inline-block;
            margin: 0px auto -60px;
            display: block;
            position: relative;
            top: -80px;
        }
        .circle-img{
            height: 100px;
            width: 100px;
            object-fit: cover;
        }
        .circle-detail{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            margin: auto;
            margin-bottom: 20px;
        }
        .circle-img-detail{
            height: 100px;
            width: 100px;
            object-fit: cover;
        }
        /* add user */
        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        form > input{
            width: 400px;
        }
        .header:hover{
            text-decoration: underline;
        }
    </style>

</head>

 <body> 

    <nav class="bg-light">
        <div class="container-fluid d-flex justify-content-between">
            <a href ="index.php"><h3 class="center"><strong>New Project</strong></h3></a>
            <div>
                <a href="index.php" class="text-dark mx-4 header">All users</a>
                <a href='form.php' class="btn btn-primary">Add</a>
            </div>
        </div>
    </nav>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </body>
 </html>