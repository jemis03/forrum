<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="extra/_style.css">
    <title>Discuss on coding</title>
    <style>
      .threadlistbuttons{
        display: flex;
        justify-content: end;
        align-items: center;
      }
      @media (max-width: 576px){
        .editbutton{
          margin-right: 6px;
        }
      }
      @media (max-width: 370px){
        .threadlistbuttons{
          flex-direction: column;
        }
      }
    </style>
</head>

<body>
    <?php include 'extra/_dbconnect.php';?>
    <?php include 'extra/_header.php';?>

    <?php
    $id=$_GET['$thread_id'];
    $commentid=$_GET['$commi'];
    if (isset($commentid)) {
      $sql="DELETE FROM `comments` WHERE `comment_id`=$commentid";
      $result = mysqli_query($conn, $sql);
    }
    // echo var_dump($id);
    $sql="SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        //  echo $row['categary_id'];
        $threads_title= $row['thread_title'];
        $threads_desc= $row['thread_desc'];
        $thread_user_id =$row['thread_user_id'];  

            $sql3="SELECT * FROM `users` WHERE user_id=$thread_user_id";  
            $result3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($result3);
            $th_user_fname = $row3['user_fname'];
            $th_user_lname = $row3['user_lname'];
    }  
    
    ?>

    <?php
                
                $method=$_SERVER['REQUEST_METHOD'];                
                if ($method == 'POST'){
                    $comment_opinion=$_POST['opinion'];
                    date_default_timezone_set("Asia/Kolkata");
                    $comment_time= date("h:i:s A");
                    $comment_date = date("jS \of F Y");
                    $comment_user_id=$_SESSION['user_id'];
                    $sql="INSERT INTO `comments` (`comment_opinion`, `thread_comment_id`, `comment_user_id`, `comment_date`, `comment_time`) VALUES ('$comment_opinion', '$id', '$comment_user_id', '$comment_date', '$comment_time')";
                    $result = mysqli_query($conn, $sql);
                    $showalrt=true;
                    if ($showalrt) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong>Your thread added successfully. Please wait for answer of comunity
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                              </div>';
                    }
                }
    ?>


    <div class="body-height">

        <div class="cardbox">
            <div class="extrajumbotron background mb-0 mt-3">
                <h1 class="display-5 fontsize">
                    <?php echo $threads_title; ?>
                </h1>
                <p class="lead">
                    <?php echo $threads_desc; ?>
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
                <h6>Posted by : <?php echo $th_user_fname.' '.$th_user_lname; ?></h6>

            </div>

            <h2 class="mt-2">Start a discussion</h2>
            <?php

if (isset($_SESSION['login']) && $_SESSION['login']==true) {
            echo '<div class="background mb-2 p-4">
                    <form action="'. $_SERVER["REQUEST_URI"] .'" method="post">
                    <div class="form-group">
                        <label for="opinion">Enter your opinion</label>
                        <textarea name="opinion" class="form-control" id="opinion" rows="3"
                            placeholder="Enter your opinion"></textarea>
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
            <div class="ques">
                <h2 class="mt-2">Browse Question</h2>
                <div class="background mb-2 p-3">
                    <?php 
                      $noresult=true;
                      $sql="SELECT * FROM `comments` WHERE thread_comment_id=$id";
                      $result = mysqli_query($conn, $sql);
                      $numhr= mysqli_num_rows($result);
                      while ($row= mysqli_fetch_assoc($result)) {
                        $noresult=false;
                        $comment_opinion= $row['comment_opinion'];
                        $comment_date= $row['comment_date'];
                        $comment_time= $row['comment_time'];
                        $comment_id=$row['comment_id'];
                        $comment_user_id= $row['comment_user_id'];
                        $sql2="SELECT * FROM `users` WHERE user_id=$comment_user_id";  
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $comment_user_fname = $row2['user_fname'];
                        $comment_user_lname = $row2['user_lname'];
                        $comment_user_email = $row2['user_email'];
                        echo '<div class="media">
                                <img src="img/userimage.png" height="60px" width="60px" class="mr-3 ml-2 mt-2 rounded" alt="...">
                                <div class="media-body mt-2">
                                    <h5 class="mt-0">'.$comment_opinion.'</h5>
                                    <h6> Posted by '.$comment_user_fname.' '.$comment_user_lname.' on '.$comment_date.' at '.$comment_time.'</h6>';


                                    if (isset($_SESSION['login']) && $_SESSION['login']==true) {
                                      $thloginemail=$_SESSION['loginemail'];
                                    }
                                    
                                    if($comment_user_email==$thloginemail){
                                        echo'<div class="threadlistbuttons">
                                            <div class="editbutton">
                                              <a type="button" href="editlist.php?$commi='.$comment_id.'" class="btn btn-success my-2 my-sm-0 mr-sm-2 edit">
                                              Edit
                                              </a>
                                            </div>

                                            <div class="deletebutton">
                                              <a type="button" href="threads.php?$thread_id='.$id.'&$commi='.$comment_id.'" class="btn btn-success my-2 my-sm-0 mr-sm-2 edit">
                                              Delete
                                              </a>
                                            </div>
                                        </div>';
                                    }

                           echo'</div>
                              </div>';
                              if ($numhr!=1) {
                                echo '<hr>';
                                $numhr = $numhr-1;
                            }
                        
                      }

                    //   echo var_dump($noresult);
                        if($noresult){
                            echo '<div class="jumbotron jumbotron-fluid fluid_radious mb-0">
                                    <div class="container">
                                    <h1 class="display-4">No Post found</h1>
                                    <p class="lead">Be the first person to post the answer related to this question.</p>
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
        <a href="extra/_delete.php?id=<?php echo $deleteid;?>"class="btn btn-primary">Yes</a>
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