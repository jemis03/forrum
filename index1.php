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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

  <title>Discuss on coding</title>
  <style>
    /* .inner{
      overflow: hidden;
    }
    .inner img{
      transition: all 1.5s ease;
    }
    .inner:hover img{
      transform: scale(1.3);
    }  */

    .card{
      transition: all 0.8s ease;
    }
    .card:hover{
      transform: scale(1.07)
    }

  </style>
</head>

<body>
  <?php include 'extra/_dbconnect.php';?>
  <?php include 'extra/_header.php';?>
  <?php
  // session_start();
  // $_SESSION['login']=false;

  ?>

  <!-- this is a slider -->
  <div class="body-height">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/3.jpg" class="d-block w-100" height="400vh" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/2.jpg" class="d-block w-100" height="400vh" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/4.jpg" class="d-block w-100" height="400vh" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- this is a categary -->
    <div class="cardbox mt-3">
      <h2 class="text-center mb-4 text-color">IDiscuss-Categary</h2>
      <div class="row">


      <?php 
      $sql="SELECT * FROM `categary`";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        //  echo $row['categary_id'];
        $categary_title= $row['categary_title'];
        $categary_desc= $row['categary_desc'];
        $categary_id= $row['categary_id'];
        $categary_image= $row['categary_image'];
      
        
        echo '<div class="col-sm-6 mb-5">
                <div class="card" style="height: 30rem;">
                  <div class="inner">
                    <img src="img/'.$categary_image.'" class="card-img-top" height="250px" alt="...">
                  </div>
                  
                  <div class="card-body">
                    <h5 class="card-title"><a href="threadlist.php?$categary_id='.$categary_id.'&$thliid=0" class="text-dark">'.$categary_title.'</a></h5>
                    <p class="card-text">'.substr($categary_desc, 0 , 190).'</p>
                    <a href="threadlist.php?$categary_id='.$categary_id.'" class="btn btn-primary">View threads</a>
                  </div>
                </div>
              </div>';

      }
      ?>

      </div>
    </div>
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