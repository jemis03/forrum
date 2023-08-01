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
    <style>
        .forgetbox:hover{
            cursor: pointer;
        }
        .forgetform{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .cardbox{
            width: 50%;
        }
        @media (max-width: 991px){
            .cardbox{
                width: 63%;
            }
        }
        @media (max-width: 576px){
            .cardbox{
                width: 80%;
            }
        }
        /* @media (min-width:577px) and (max-width: 991px){
            .cardbox{
                width: 63%;
            }
        } */
    </style>
</head>

<body>
    <?php include 'extra/_dbconnect.php';?>
    <?php include 'extra/_header.php';?>

    <?php
        echo'<div class="body-height forgetform">
            <div class="cardbox">
                <h2 class="mt-3 mb-3">Please Fill The Required Field</h2>
                <div class="background mb-2 p-4">
                        <form action="/forrum/handleforget.php" method="post"> 
                            <div class="form-group">
                                <label for="forgetemail">Email address</label>
                                <input type="email" class="form-control" id="forgetemail" name="forgetemail" aria-describedby="emailHelp" required>
                                <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small>
                            </div>
                            <hr style="background-color: #8b7f7f;"> 
                            <div class="form-group">
                                <label for="forgetquestion">This field is required for the <b>forget password</b> in future:<br>Please select any question and type thier answer.</label>
                                <select name="forgetquestion" id="forgetquestion" class="form-control">
                                <option value="What is your favourite game?">What is your favourite game?</option>
                                <option value="What is your favourite car?">What is your favourite car?</option>
                                <option value="who is your favourite person?">who is your favourite person?</option>
                                <option value="which is your favourite color?">which is your favourite color?</option>
                                <option value="which is your favourite place in one word?">which is your favourite place in one word?</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="forgetanswer">Please write your answer for question.</label>
                                <input type="text" class="form-control" id="forgetanswer" name="forgetanswer" aria-describedby="emailHelp" required>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="forgetbox" class="forgetbox" name="forgetbox" value="Bike" required>
                                <label for="forgetbox"> Please select the box</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>';
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