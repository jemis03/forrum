<?php 
  date_default_timezone_set('Asia/kolkata');
  
  $count=0;
  include 'extra/_dbconnect.php';
  if (isset($_POST['submit'])) {
    // echo "yes";
    $t=date("d-m-Y");
    // echo $t;
    $sql="SELECT * FROM `contacts` WHERE `contact_email`='$_POST[email]' AND `contact_date`='$t'";
    $result=mysqli_query($conn,$sql);

    $r=mysqli_num_rows($result);

    if ($r==0) {
      $count=1;
      $sql="INSERT INTO `contacts`(`contact_name`, `contact_email`, `contact_mobile`, `contact_comment`,`contact_date`,`contact_no`) VALUES ('$_POST[name]','$_POST[email]','$_POST[mobile]','$_POST[comment]','$t','$count')";
      $result=mysqli_query($conn,$sql);
    }

    elseif ($r<2) {
      $count=$r+1;
      $sql="INSERT INTO `contacts`(`contact_name`, `contact_email`, `contact_mobile`, `contact_comment`,`contact_date`,`contact_no`) VALUES ('$_POST[name]','$_POST[email]','$_POST[mobile]','$_POST[comment]','$t','$count')";
      $result=mysqli_query($conn,$sql);
    }

    else {
      header("Location: /forrum/contact.php?extracontact=true");
    }
    
  }

?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
  
  <link rel="stylesheet" href="extra/_style.css">
  <link rel="stylesheet" href="extra/style.css">
  <title>Contact Us</title>
  <style>
    *{
      /* background-color: white; */
    }
  </style>

</head>

<body>
<?php include 'extra/_dbconnect.php';?>
  <?php include 'extra/_header.php';?>

  <!-- this is a slider -->
  <section class="contact background">
    <div class="content">
      <h1>Contact Us</h1>
      <p>Hello my friends throgh this contact page you are able to contact me but you can contact me only <b>2 times</b> per day through send message section. so please do not anything and if I able to solve your problem regarding my website then definitely I solved your problem.</p>
    </div>
    <div class="containerc">
      <div class="contactinfo">
        <div class="box">
          <div class="icon">
          <i class="bi bi-geo-alt-fill"></i>
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
          </svg>
          </div>
          <div class="text">
            <h4>Address</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed, recusandae!</p>
          </div>
        </div>
        <div class="box">
          <div class="icon">
          <i class="bi bi-telephone-fill"></i>
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
          </svg>
          </div>
          <div class="text">
            <h4>Phone</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed, recusandae!</p>
          </div>
        </div>
        <div class="box">
          <div class="icon">
          <i class="bi bi-envelope-fill"></i>
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
          <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
          </svg>
          </div>
          <div class="text">
            <h4>Email</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed, recusandae!</p>
          </div>
        </div>
      </div>
      <div class="contactform">
   
        <form action="http://localhost/forrum/contact.php" method="post">
          <h2>Send message</h2>
          <div class="inputbox">
            <input type="text" name="name" id="name" required="required">
            <span>Full name</span>
          </div>
          <div class="inputbox">
            <input type="text" name="email" id="email" required="required">
            <span>Email</span>
          </div>
          <div class="inputbox">
            <input type="text" name="mobile" id="mobile" required="required">
            <span>Mobile</span>
          </div>
          <div class="inputbox">
            <textarea name="comment" id="comment" required="required"></textarea>
            <span>Type your message...</span>
          </div>
          <div class="inputbox">
            <button type="submit" name="submit" class="btn btn-success my-2 my-sm-0 mr-sm-2" id="submit">Send</button>
          </div>
        </form>
      </div>

      
    </div>
</section>  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


    
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

</body>

</html>