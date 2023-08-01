<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include '_dbconnect.php';
    if (isset($_POST['categorysubmit']) && isset($_FILES['categoryimage'])) {
        

        $categorytitle=$_POST['categorytitle'];
        $categorydescription=$_POST['categorydescription'];

        $img_name=$_FILES['categoryimage']['name'];
        $img_size=$_FILES['categoryimage']['size'];
        $tmp_name=$_FILES['categoryimage']['tmp_name']; 
        $error=$_FILES['categoryimage']['error'];
        
        if ($error == 0) {
            if ($img_size > 125000) {
                header("Location: /forrum/admin/add_category.php?error=lesssize");
            }
            else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc=strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $newsql="SELECT * FROM `categary`";
                    $result=mysqli_query($conn, $newsql);

                    while ($row=mysqli_fetch_assoc($result)) {
                        $catid=$row['categary_id'];
                    }
                    $catid++;
                    $new_img_name = 'cat_'.$catid.'.'.$img_ex_lc;
                    $img_upload_path='../img/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);


                    $sql="INSERT INTO `categary`(`categary_title`, `categary_desc`, `categary_image`) VALUES ('$categorytitle','$categorydescription','$new_img_name')";
                    mysqli_query($conn, $sql);
                    header("Location: /forrum/admin/category.php?error=noerror");
                }
            }
            
        }else {
            $em="unknown error occurred!";
            header("Location: /forrum/admin/category.php?error=unknown");
        }
    }
    else {
        header("Location: /forrum/admin/add_category.php");
    }

}
?>