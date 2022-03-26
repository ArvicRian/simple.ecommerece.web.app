<?php
require('../Database/database.php');
if (isset($_POST["submit"])) {
    
    $ver_code = $_POST["ver_code"];
    
    $query = "SELECT * FROM verifylogin WHERE ver_code = '$ver_code'";
    $result = mysqli_query($con, $query);
    echo'<script> location.replace("login.form.php"); </script>';
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
            <h2 class="text-center fw-bold mb-3">Enter Code</h2>
            <form action="" method="POST">
                <div class="form-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter code" required name="ver_code" id="ver_code">
                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="submit">Verify</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>