<?php 
    require('config/config.php');
    require('config/db.php');
?>

<?php include('inc/header.php'); ?>
 
    <div class="jumbotron jumbotron-fluid" style="padding: 20px">
        <div class="container text-center">
            <h1 class="display-4">Encryptor v1.0</h1>
            <p class="lead">Insert and encrypt your messages with secret keys</p>
        </div>
    </div>  

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
            <button type="submit" class="btn btn-primary">Encrypt</button><br><br>
            <div class="form-group">
                <label>Encrypted Text</label>
                <input type="text" class="form-control" readonly>
            </div>
           
        </form>
    </div>
<?php include('inc/footer.php'); ?>
