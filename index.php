<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>JavaScript Automatic Page Redirect</title>
<script>
    function pageRedirect() {
        window.location.replace("login/login.form.php");
    }      
    setTimeout("pageRedirect()", 1000);
</script>
</head>
<body>
    <p><strong>Note:</strong> Redirecting......</p>
</body>
</html>