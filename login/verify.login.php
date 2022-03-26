<?php
require('../Database/database.php');

require_once '../vendor/autoload.php';
if (isset($_POST["submit"])) {
    $receiver = $_POST["receiver"];
    $msg = rand(1000,2000);

    $messagebird = new MessageBird\Client('eJIP5AO7FrQNMDR2aElDadeMX');
    $message = new MessageBird\Objects\Message;
    $message->originator = '+639104371280';
    $message->recipients = [ $receiver ];
    $message->body = $msg;
    
    $query = "INSERT INTO verifylogin (ver_no,ver_code) VALUES ('$receiver','$msg')";
    $result = mysqli_query($con, $query);
    echo'<script> location.replace("verify.code.php"); </script>';
}
?>

<html>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Send SMS using PHP</title>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-5 mx-auto bg-white shadow border p-4 rounded">
                <h2 class="text-center fw-bold mb-3">Verify Account</h2>
                <form action="" method="POST">
                    <div class="form-group mb-3">
                        <label for="receiver" class="form-label">Enter desire number</label>
                        <input type="text" class="form-control" placeholder="Enter receiver phone number" required name="receiver" id="receiver">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Send SMS</button>
                        <button type="reset" class="btn btn-danger">Reset form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>