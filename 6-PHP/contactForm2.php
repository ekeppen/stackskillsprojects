<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h2>Get in touch!</h2>
        
        <div id="error">
        
        </div>
        
        <form method="post">
            <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter Email">
            </div>
            
            <div class="form-group">
                <label for="inputSubject">Subject</label>
                <input type="text" class="form-control" id="inputSubject" placeholder="Enter Subject">
            </div>
            
            <div class="form-group">
                <label for="inputQuery">What would you like to ask us?</label>
                <textarea class="form-control" id="inputQuery" rows="3"></textarea>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  
    <script type="text/javascript"> 
        
        $("form").submit(function (e) {
        
            e.preventDefault();
            
            var error ="";
            
            if ($("#inputEmail").val() == ""){
                error += "<p>The email field is required.</p>";
            }
            
            if ($("#inputSubject").val() == ""){
                error += "<p>The subject field is required.</p>";
            }
            
            if ($("#inputQuery").val() == ""){
                error += "<p>The message field is required.</p>";
            }
            
            if (error !=""){
                $("#error").html(error);
                $("#error").addClass("alert alert-danger");
            } else {
                $("#error").html("<p><strong>Thank you for contacting us!</strong></p>");
                $("#error").removeClass("alert alert-danger").addClass("alert alert-success");
                $("form").unbind('submit').submit();
            }
            
        });
    
    
    </script>
  
  </body>
</html>



<?php
    
    if ($_POST){
        $userName = $_POST["username"];
        
        $knownUsers = array("Emily", "Andrew", "Chris");
        
        $userStatus = false;
        
        foreach ($knownUsers as $name) {
        
            if ($name == $userName){
            
                $userStatus = true;
            }
            
        }
        if ($userStatus == true){
        
            echo "Welcome back, ".$userName."!";
        
        } else {
        
            echo $userName.", I don't know you...";
        }
    }
    
?>
