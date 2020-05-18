<?php 
    function encrypt($messsage, $secret_key){
        $key = hex2bin($secret_key);

        $nonceSize = openssl_cipher_iv_length('aes-256-ctr');
        $nonce = openssl_random_pseudo_bytes($nonceSize);

        $cipherText = openssl_encrypt(
            $messsage, 
            'aes-256-ctr',
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );
        return base64_decode($nonce, $cipherText);
    }

    function decrypt($messsage, $secret_key){
        $key = hex2bin($secret_key);
        $messsage = base64_decode($messsage);
        $nonceSize = openssl_cipher_iv_length('aes-256-ctr');
        $nonce = mb_substr($messsage, 0, $nonceSize, '8bit');
        $cipherText = mb_substr($messsage, $nonceSize, null, '8bit');

        $plainText = openssl_decrypt(
            $cipherText, 
            'aes-256-ctr',
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );

        return $plainText;
    }
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
    <a class="navbar-brand text-white" href="index.php">
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
        <form>
            <div class="form-group">
                <label>Your Text</label>
                <input type="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Secret Key</label>
                <input type="text" class="form-control">
                <small id="secretKey" class="form-text text-muted">Don't share this key with others.</small>
            </div>
            <div class="form-group">
                <label>Encrypted Text</label>
                <input type="text" class="form-control" readonly value="Hello Baby">
            </div>
            <button type="submit" class="btn btn-primary">Encrypt</button>
        </form>
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>