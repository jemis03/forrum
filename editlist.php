<?php 
    // if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ==='on') {
    //   $url="https://";
    // }
    // else {
    //   $url="http://";
    //   $url.=$_SERVER['HTTP_HOST'];
    //   $url.=$_SERVER['HTTP_HOST'];
    //   $url;
    // }
    // $page=$url;
    // $sec="10";

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <!-- <meta http-equiv="refresh" content="<?php echo $sec; ?>" URL="<?php echo $page; ?>"> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="extra/_style.css">
    <title>Discuss on coding</title>

</head>

<body>
    <?php include 'extra/_dbconnect.php';?>
    <?php include 'extra/_header.php';?>

    <?php
    $id=$_GET['$commi'];
    $_SESSION['comment_id']=$id;

    $sql="SELECT * FROM `comments` WHERE comment_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        //  echo $row['categary_id'];
        $comment_desc= $row['comment_opinion'];
        $comment_user_id =$row['comment_user_id'];  

            $sql3="SELECT * FROM `users` WHERE user_id=$comment_user_id";  
            $result3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($result3);
            $co_user_fname = $row3['user_fname'];
            $co_user_lname = $row3['user_lname'];
    }  
    
    ?>


    <div class="body-height">

        <div class="cardbox">
            <div class="extrajumbotron background mb-0 mt-3">
                <h1 class="display-5 fontsize">
                    Your comment
                </h1>
                <p class="lead">
                    <?php echo $comment_desc; ?>
                </p>
                <hr class="my-4">
                <p>No Spam / Advertising / Self-promote in the forums.
                    Do not post copyright-infringing material.
                    Do not post “offensive” posts, links or images.
                    Do not cross post questions.
                    Do not PM users asking for help.
                    Remain respectful of other members at all times.
                </p>
                <hr>
                <h6>Posted by : <?php echo $co_user_fname.' '.$co_user_lname; ?></h6>

            </div>

            <h2 class="mt-2">Start a discussion</h2>

    <?php

    if (isset($_SESSION['login']) && $_SESSION['login']==true) {
        echo '<div class="background mb-2 p-4">
                <form action="handleeditlist.php" method="post">
                <div class="form-group">
                    <label for="opinion">Enter your new updated opinion</label>
                    <textarea name="opinion" class="form-control" id="opinion" rows="3"
                        placeholder="Enter your new updated opinion"></textarea>
            </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>';
    }

    else {
        echo '<div class="jumbotron jumbotron-fluid mb-0">
                <div class="container">
                <h1 class="display-5">Please login to do your post</h1>
                <p class="lead">Pleace login to this website to share your great ideas related to this question.</p>
                </div>
            </div>';
    }


            ?>


            
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include 'extra/_footer.php';?>


<!--edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header popupheader">
        <h5 class="modal-title" id="editModalLabel">confirm edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="logout-modal-body">
        <h5>Do you really want to edit this thread?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a href="extra/_logout.php"class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>



<!--Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header popupheader">
        <h5 class="modal-title" id="deleteModalLabel">confirm delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="logout-modal-body">
        <h5>Do you really want to logout this page?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a href="extra/_logout.php"class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>