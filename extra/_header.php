<?php 
  
  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark1">
  <a class="navbar-brand" href="/forrum/index1.php">
  <img src="img/logo3.png" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link btn-shadow" href="/forrum/index1.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle btn-shadow" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Top Categaries
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

        $sql="SELECT categary_title,categary_id FROM `categary` LIMIT 6";
        $result=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_assoc($result)) {
          echo'<a class="dropdown-item" href="threadlist.php?$categary_id='.$row['categary_id'].'&$thliid=0">'.$row['categary_title'].'</a>';
          
        }


        echo'</div>
      </li>
      <li class="nav-item">
        <a class="nav-link btn-shadow" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn-shadow" href="contact.php">Contact Us</a>
      </li>';

      session_start();
      // $_SESSION['login']=false;
      if (isset($_SESSION['login']) && $_SESSION['login']==true){
        echo '<li class="nav-item">
      <button type="button" class="btn btn-4 nav-link btn-shadow" id="box-shadow" data-toggle="modal" data-target="#feedbackmodaly">
      Feedback
      </button>
      </li>';
      }
      else {
        echo '<li class="nav-item">
        <button type="button" class="btn btn-4 nav-link btn-shadow" id="box-shadow" data-toggle="modal" data-target="#feedbackmodaln">
        Feedback
        </button>
      </li>';
      }
      
    echo '</ul>';

    // session_start();
    // echo var_dump($_SESSION['login']);
      
    
    if (isset($_SESSION['login']) && $_SESSION['login']==true) {
    echo'<form class="form-inline my-2 my-lg-0" method="GET" action="search.php">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0 mr-sm-2 btns" type="submit">Search</button>
      <button type="button" class="btn btn-outline-success my-2 my-sm-0 mr-sm-2 btns" data-toggle="modal" data-target="#logoutModal">
      logout
      </button>
    </form>';
  }
  else {
    echo'<form class="form-inline my-2 my-lg-0" method="GET" action="search.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0 mr-sm-2 btns" type="submit">Search</button>
      <button type="button" class="btn btn-outline-success my-2 my-sm-0 mr-sm-2 btns" data-toggle="modal" data-target="#loginmodal">
      Login
      </button>
      <button type="button" class="btn btn-outline-success my-2 my-sm-0 mr-sm-2 btns" data-toggle="modal" data-target="#signupmodal">
      Signup
      </button>
    </form>';
  }

  
  echo'</div>
       </nav>';

include 'extra/_loginmodal.php';
include 'extra/_signupmodal.php';
include 'extra/feedbacky.php';
include 'extra/feedbackn.php';
include 'extra/logoutmodal.php';

if (isset($_GET['contactsuccess']) && $_GET['contactsuccess']=="true") {
  echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert" >
          <strong>Success!</strong> You contact email was successfully sent.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
  echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert" >
          <strong>Success!</strong> You signup successfully please login to this website.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}


if (isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true") {
  echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert" >
          <strong>Success!</strong> You login is successfull.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}
if (isset($_GET['logoutsuccess']) && $_GET['logoutsuccess']=="true") {
  echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert" >
          <strong>Success!</strong> You logout is successfull please login for best exprience.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}
if (isset($_GET['forgetpassword']) && $_GET['forgetpassword']=="true") {
  echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert" >
          <strong>Success!</strong> You password is changed successfull. please login with new password.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}
if (isset($_GET['commentsuccess']) && $_GET['commentsuccess']=="true") {
  echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert" >
          <strong>Success!</strong> You comment is changed successfull.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}


if (isset($_GET['contactsuccess']) && $_GET['contactsuccess']=="false") {
  echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" >
          <strong>Error!</strong> You contact through email was failed please try again.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}



if (isset($_GET['extracontact']) && $_GET['extracontact']=="true") {
  echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" >
          <strong>Sorry!</strong> Your today\'s contact was exceed from given limit so try again tomorrow.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}

if (isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false") {
  echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" >
          <strong>Error!</strong> You login is failed please try again.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}
if (isset($_GET['useremail']) && $_GET['useremail']=="false") {
  echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" >
          <strong>Error!</strong>This email address is alredy in use please try again with another email address.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false") {
  echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" >
          <strong>Error!</strong> You password is not matched please try again.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}
if (isset($_GET['signupsuccess1']) && $_GET['signupsuccess1']=="false") {
  echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" >
          <strong>Error!</strong> You can not signup because of some reason please contact administrator.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}
if (isset($_GET['forgetpassword']) && $_GET['forgetpassword']=="false") {
  echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" >
          <strong>Error!</strong> your password is not matched please try again.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}



?>