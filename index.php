<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Discuss on coding</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');
        body{
            margin:0px;
            padding: 0px;
            font-family: 'Roboto', sans-serif;
            box-sizing: border-box;

        }

        .fcontainer{
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100vh;
            animation: animinate 32s ease-in-out 2s infinite;
            background-size: cover;
            background-repeat: no-repeat;


        }

        #btna{
        box-shadow: none;
        }

        .btn{
            background-color: chocolate;
            color: white;
            border-radius: 10px;
            border-width: 6px;
            border-color: darkred;   
            font-size: 20px;
            margin: 4px;
            box-shadow: none;
        }

        .btn:hover{
        box-shadow: none;
        }

        .btn-1{
        padding: 0.25rem 1rem;
        }

        .outer{
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100vh;
            background: rbga(0,0,0,0.8);
        }

        .outer img{
            position: absolute;
            left: 3%;
            top: 5%;
            height: 100px;
            width: 100px;
        }

        .detail{
            position: absolute;
            left: 11%;
            top: 28%;
            /* transform: translate(-50%); */
        }

        .detail h1{
            color: #ffa500;
        }
        
        .flogo{
            font-size: 68px;
            margin: 0px;
        }

        .fdetail{
            font-size: 47px;
            margin-bottom: 14px;
        }


        @keyframes animinate{
            0%,100%{
                background-image: url(img/38.jpg);
            }
            25%{
                background-image: url(img/31.jpg);
            }
            50%{
                background-image: url(img/32.jpg);
            }
            75%{
                background-image: url(img/33.jpg);
            }
        }
    </style>
  </head>
  <body>
    <?php
    session_start();
    $_SESSION['login']=false;

    ?>
    <div class="fcontainer">
        <div class="outer">
            <!-- <img src="img/logo3.png" alt="" srcset=""> -->
            <div class="detail">
                <h1 class="flogo">Codechat</h1>
                <h1 class="fdetail">Welcome to our site</h1>
                <a href="index1.php" type="button" class="btn btn-1 my-2 my-sm-0 mr-sm-2" id="btna">
                    Get Started
                </a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>