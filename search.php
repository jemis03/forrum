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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <title>Discuss on coding</title>

</head>

<body>
    <?php include 'extra/_dbconnect.php';?>
    <?php include 'extra/_header.php';?>

    <?php

    if($_SERVER['REQUEST_METHOD'] == "GET"){
            // echo var_dump($_SESSION['login']);
                // session_start();
                // $_SESSION['login']=true;
            if ($_SESSION['login']==true) {
                // echo "true";
                echo'
                <div class="body-height">
                    <div class="cardbox">
                        <div class="ques">
                            <h2 class="mt-3 mb-3">search result for '.$_GET['search'].'</h2>
                            <div class="background mb-2 p-3">';

                                $query=$_GET['search'];
                                $noresult=true;
                                $sql="SELECT * FROM `threads` WHERE MATCH (thread_title,thread_desc) against('$query')";
                                $result = mysqli_query($conn, $sql);
                                $numhr= mysqli_num_rows($result);
                                // echo $numhr;
                                while ($row= mysqli_fetch_assoc($result)) {
                                $noresult=false;
                                $thread_title= $row['thread_title'];
                                $thread_desc= $row['thread_desc'];
                                $thread_id= $row['thread_id'];
                                $thread_date= $row['thread_date'];
                                $thread_time= $row['thread_time'];
                                $thread_user_id= $row['thread_user_id'];
                                $thread_categary_id=$row['thread_categary_id'];
                                $sql2="SELECT * FROM `users` WHERE user_id=$thread_user_id";  
                                $result2 = mysqli_query($conn, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);
                                $th_user_fname = $row2['user_fname'];
                                $th_user_lname = $row2['user_lname'];
                                $sql3="SELECT * FROM `categary` WHERE categary_id=$thread_categary_id";  
                                $result3 = mysqli_query($conn, $sql3);
                                $row3 = mysqli_fetch_assoc($result3);
                                $categary_title = $row3['categary_title'];
                                echo '<div class="media">
                                        <img src="img/userimage.png" height="60px" width="60px" class="mr-3 ml-2 mt-2 rounded"
                                            alt="...">
                                        <div class="media-body mt-2">
                                            <h5 class="mt-0"><a href="threads.php?$thread_id='.$thread_id.'&$commi=0" class="text-dark">'.$thread_title.'</a></h5>
                                            <p>'.$thread_desc.'</p>
                                            <h6> Problem by '.$th_user_fname.' '.$th_user_lname.' on '.$thread_date.' at '.$thread_time.' in categary '.$categary_title.'</h6>
                                        </div>
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
                                            <p class="lead" style="margin-top:1em">Suggestions
                                            <ul style="margin-left:1.3em;margin-bottom:2em">
                                            <li>Make sure that all words are spelled correctly.</li>
                                            <li>Try different keywords.</li>
                                            <li>Try more general keywords.</li>
                                            </ul>
                                            </p>
                                            </div>
                                        </div>';
                                }
                        


                            echo'              
                            </div>
                        </div>
                    </div>
                </div>';
            }
            else {
                // echo "false";
                echo'
                <div class="body-height" style="margin:3em 1em">
                    <div class="cardbox">
                        <div class="jumbotron jumbotron-fluid fluid_radious mb-0">
                        <div class="container">
                        <h1 class="display-4">Please first login to site</h1>
                        <p class="lead" style="margin-top:1em">Suggestions
                        <ul style="margin-left:1.3em;margin-bottom:2em">
                        <li>You do not do the login to our site</li>
                        <li>Your login in the website is required to access search option</li>
                        <li>Through this search option you find different threads</li>
                        </ul>
                        </p>
                        </div>
                    </div>
                    </div>
                </div>';

            }
        


    }
  ?>

    <?php include 'extra/_footer.php';?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
    <script>
        $(function () {
            $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
                var rating = data.rating;
                $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('rating :' + rating);
                $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
            });
        });
    </script>

    <!-- for password eyeslash -->


</body>

</html>