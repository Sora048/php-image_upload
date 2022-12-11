<?php include "db_con.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            min-height: 100vh;
            font-size: 2rem;
        }
        .alb {
            height: 200px;
            padding: 5px;
        }
        .alb img {
            width: 100%;
            height: 100%;
        }
        a {
            text-decoration: none;
            color: black;
        }

    </style>
</head>
<body>
<!-- <i class="devicons devicons-html5_multimedia"></i> -->
    <a href="index.php">&#8592</a>
    <?php
        $sql = mysqli_query($conn, "SELECT * FROM image ORDER BY id DESC");

        if(mysqli_num_rows($sql) > 0){
            while($image = mysqli_fetch_assoc($sql)){
    ?>

        <div class="alb">
            <img src="uploads/<?=$image['image_url']?>" alt="">
        </div>

    <?php
            }
        }
    ?>
</body>
</html>