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

</head>

<body>
    <?php include 'extra/_dbconnect.php';?>
    <?php include 'extra/_header.php';?>


    <?php
    $showalrt=false;
    $categary_id=$_GET['$categary_id'];
    $sql="SELECT * FROM `categary` WHERE categary_id=$categary_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){
        //  echo $row['categary_id'];
        $categary_title= $row['categary_title'];
        $categary_desc= $row['categary_desc'];
        
    }  
    
    ?>

    
<?php
                
                $method=$_SERVER['REQUEST_METHOD'];                
                if ($method == 'POST'){
                    $th_title=$_POST['title'];
                    $th_desc=$_POST['desc'];
                    date_default_timezone_set("Asia/Kolkata");
                    $th_time= date("h:i:s A");
                    $th_date = date("jS \of F Y");
                    $user_id=$_SESSION['user_id'];
                    $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_user_id`, `thread_date`, `thread_time`, `thread_categary_id`) VALUES ('$th_title', '$th_desc','$user_id', '$th_date', '$th_time', '$id')";
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


    <!-- this is a slider -->
    <div class="body-height">
        <div class="cardbox">
            <div class="extrajumbotron background mb-0 mt-3">
                <h1 class="display-5 fontsize">Welcome to
                    <?php echo $categary_title; ?>
                </h1>
                <p class="lead">
                    <?php echo $categary_desc; ?>
                </p>
                <hr class="my-4">
                <p>No Spam / Advertising / Self-promote in the forums.
                    Do not post copyright-infringing material.
                    Do not post “offensive” posts, links or images.
                    Do not cross post questions.
                    Do not PM users asking for help.
                    Remain respectful of other members at all times.
                </p>

            </div>
            <h2 class="mt-3 mb-3">Start a discussion</h2>
<?php
    if (isset($_SESSION['login']) && $_SESSION['login']==true) {    
        echo    '<div class="background mb-2 p-4">
                        <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
                            <div class="form-group">
                                <label for="title">Problem title</label>
                                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                                    placeholder="Enter problem title">
                            </div>
                            <div class="form-group">
                                <label for="desc">Enter your concern</label>
                                <textarea name="desc" class="form-control" id="desc" rows="3"
                                    placeholder="Enter your concern"></textarea>
                            </div>

                            <button type="submit" name="newthread" class="btn btn-primary">Submit</button>
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
                <h2 class="mt-3 mb-3">Browse Question</h2>
                <div class="background mb-2 p-3">
                  <!-- <?php echo $categary_id; ?> -->

                    <?php 
                      $noresult=true;
                      $sql="SELECT * FROM `threads` WHERE thread_categary_id=$categary_id";
                      $result = mysqli_query($conn, $sql);
                      $numhr= mysqli_num_rows($result);
                    //   echo $numhr;
                      while ($row= mysqli_fetch_assoc($result)) {
                        $noresult=false;
                        $thread_title= $row['thread_title'];
                        $thread_desc= $row['thread_desc'];
                        $thread_id= $row['thread_id'];
                        $thread_date= $row['thread_date'];
                        $thread_time= $row['thread_time'];
                        $thread_user_id= $row['thread_user_id'];
                      $sql2="SELECT * FROM `users` WHERE user_id=$thread_user_id";  
                      $result2 = mysqli_query($conn, $sql2);
                      $row2 = mysqli_fetch_assoc($result2);
                      $th_user_fname = $row2['user_fname'];
                      $th_user_lname = $row2['user_lname'];
                      $th_user_email = $row2['user_email'];
                        echo '<div class="media">
                                <img src="img/userimage.png" height="60px" width="60px" class="mr-3 ml-2 mt-2 rounded"
                                    alt="...">
                                <div class="media-body mt-2">
                                    <h5 class="mt-0"><a href="threads.php?$thread_id='.$thread_id.'" class="text-dark">'.$thread_title.'</a></h5>
                                    <p>'.$thread_desc.'</p>
                                    <h6> Problem by '.$th_user_fname.' '.$th_user_lname.' on '.$thread_date.' at '.$thread_time.'</h6>';

                                    if($_SESSION['login']==true){
                                      $thloginemail=$_SESSION['loginemail'];
                                      if($th_user_email==$thloginemail){
                                          echo'<div class="threadlistbuttons">
                                              <div class="editbutton">
                                                  <a type="button" href="threadlist.php?$categary_id='.$categary_id.'&&$ed='.$thread_id.'" class="btn btn-success my-2 my-sm-0 mr-sm-2 edit" data-toggle="modal" data-target="#editModal">
                                                  Edit
                                                  </a>
                                              </div>

                                              <div class="deletebutton">
                                                  <button type="button" class="btn btn-success my-2 my-sm-0 mr-sm-2" data-toggle="modal" data-target="#deleteModal">
                                                  Delete
                                                  </button>
                                              </div>
                                          </div>';
                                      }
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
                                    <h1 class="display-4">No result found</h1>
                                    <p class="lead">Be the first person to ask the question related to this question.</p>
                                    </div>
                                 </div>';
                        }
                ?>
                </div>
            </div>
        </div>
    </div>

    <?php include 'extra/_footer.php';?>



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

    <script>
      edits=document.getElementsByClassName('edit');
      // consol.log(edits);
      Array.from(edits).forEach((element)=>{
        element.addEventListener("click", (e)=>{
          consol.log("edit",e);
        })
      })
    </script>
</body>

</html>