<h2> Is it Prime? </h2>

<form>
    <input name="number" type="text">
    
    <input type="submit" value="Well, is it?">
</form>


<?php
    
    $testNumber = $_GET["number"];
    
    $primeStatus = true;
    
    for ($i= 2; $i < $testNumber; $i++) {
    
        if (($testNumber % $i) == 0){
            
            $primeStatus = false;
        } 
    
    }
    
    if ($testNumber == false){
    
        echo "Enter a number above.";
    
    } else {
    
        if ($primeStatus == true){
        
            echo $testNumber." is a prime number!";
            
        } else {
            
            echo $testNumber." is not a prime number.";
        }
    }
    
?>
