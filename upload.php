<?php 
    include_once "db_con.php";
    if(isset($_POST['submit']) && isset($_FILES['my_image'])){
        ?>  
        <pre>
            <?php
            print_r($_FILES['my_image']);
            ?>
        </pre>
        <?php

            $image_name = $_FILES['my_image']['name'];
            $image_size = $_FILES['my_image']['size'];
            $tmp_name = $_FILES['my_image']['tmp_name'];
            $error = $_FILES['my_image']['error'];


            if($error === 0){
                if($image_size > 250000){
                    $em = "Sorry, your file is too large.";
                    header("location: index.php?error=$em");
                    exit();
                }else {
                    $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
                    $image_ex_lc = strtolower($image_ex);

                    $allowed_exs = array("jpg", "jpeg", "png");

                    if(in_array($image_ex_lc, $allowed_exs)){
                        $new_img_name = uniqid("IMG", true).'.'. $image_ex_lc;
                        $img_upload_path = 'uploads/'. $new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);

                        //Insert to Database
                        $sql = mysqli_query($conn, "INSERT INTO image (image_url) VALUES ('".$new_img_name."')");
                        header("location: view.php");
                        exit();
                    }else {
                        $em = "File type wrong!, .jpg, .jpeg, .png files are only allowed.";
                        header("location: index.php?error=$em");
                        exit();
                    }
                } 
                
            }else {
                $em = "unknown error occured!";
                header("location: index.php?error=$em");
                exit();
            }

    }
    else {
        header("location: index.php");
        exit();
    }
?>