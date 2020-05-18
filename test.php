<?php  
    function clear (){
       
    }

    //Message vars
    $msg = "";
    $msgClass = "";
    $simple_string = ""; 
    $decryption = "";
    $encryption_key = "";
    $decryption_key = "";
    //Check for the Submit
    if(filter_has_var(INPUT_POST, 'submit')){
        //Get form Data
        $simple_string = htmlspecialchars($_POST['message']) ;
        $encryption_key = htmlspecialchars($_POST['secretKey']);

        //Check Required Fields
        if(!empty($simple_string) && !empty($encryption_key)){
            //Passed
            echo 'Passed';
            $simple_string = '';
            $encryption_key = '';
        }else{
            //Failed
            $msg = 'Please fill in all fileds';
            $msgClass = 'alert-danger';
        }

    }
    
    // Store a string into the variable which 
    // need to be Encrypted 
   // $simple_string = "Welcome to GeeksforGeeks\n"; 
    
    // Display the original string 
    //echo "Original String: " . $simple_string; 
    
    // Store the cipher method 
    $ciphering = "AES-128-CTR"; 
    
    // Use OpenSSl Encryption method 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    
    // Non-NULL Initialization Vector for encryption 
    $encryption_iv = '1234567891011121'; 
    
    // Store the encryption key 
    // $encryption_key = "GeeksforGeeks"; 
    
    // Use openssl_encrypt() function to encrypt the data 
    $encryption = openssl_encrypt($simple_string, $ciphering, 
                $encryption_key, $options, $encryption_iv); 
    
    // Display the encrypted string 
    echo "Encrypted String: " . $encryption . "\n"; 
    
    // Non-NULL Initialization Vector for decryption 
    $decryption_iv = '1234567891011121'; 
    
    // Store the decryption key 
    $decryption_key = "GeeksforGeeks"; 
    
    // Use openssl_decrypt() function to decrypt the data 
    $decryption=openssl_decrypt ($encryption, $ciphering,  
            $decryption_key, $options, $decryption_iv); 
    
    // Display the decrypted string 
    echo "Decrypted String: " . $decryption; 
  
?> 


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Encryptor</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-dark">
    <a class="navbar-brand text-white" href="test.php">
        <img src="src/icons.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        Encryptor
    </a>
    </nav>

    <!--Jumbotron
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Encryptor v1.0</h1>
            <p class="lead">Encrypt & Decrypt with secret keys</p>
        </div>
    </div>  -->

    <br><br>

    <div class="container">
        <?php if($msg != ''): ?>
            <div class="alert <?php echo $msgClass; ?>">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label>Your Text</label>
                <input type="text" name="message" value="<?php echo isset($_POST['message']) ? $simple_string : ''; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Secret Key</label>
                <input type="text" name="secretKey" value="<?php echo isset($_POST['secretKey']) ? $encryption_key : ''; ?>" class="form-control">
                <small id="secretKey" class="form-text text-muted">Don't share this key with others.</small>
            </div>
            <div class="form-group">
                <label>Encrypted Text</label>
                <input type="text" name="output" class="form-control" readonly value="<?php echo $decryption;?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Encrypt</button>
        </form>
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
