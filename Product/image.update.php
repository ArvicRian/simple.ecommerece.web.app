<?php
include("../Database/auth.php");

require('../Database/database.php');
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patindahan</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
<style>
    .image-preview {
        width: 70%;
        height: auto;
        border: 2px solid #dddddd;

        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #cccccc;
    }

    .image-preview__image {
        display: none;
        width: 70%;
    }
    </style>
<body>

    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h5 fw-bold mb-5 mx-1 mx-md-4 mt-4">Update Image</p>
                                    <?php



$id = $_GET['id'];

$query = 'SELECT * FROM product
WHERE
product_id ='.$_GET['id'];
			$result = mysqli_query($con, $query) or die(mysqli_error($con));

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

                    $b = $row['product_id'];

                    ?>
                    
                                    <form method="post" action="image.updated.php" enctype="multipart/form-data">
                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="custom-file mt-3 mb-3">
                                                <input id="inpFile" name="pimage" type="file" />
                                                <div class="image-preview" id="imagePreview">
                                                    <img src="" alt="Image Preview" class=image-preview__image />
                                                    <span class="image-preview__default-text">Image Preview</span>
                                                </div>
                                            </div>
                                            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"/>
                                            <div class="col-12">
                                                <button type="submit" name="submit"
                                                    class="btn btn-success btn-block text-uppercase">Update image</button>
                                                &nbsp;&nbsp;
                                                <a button class="btn btn-outline-success" href="list.form.php">Cancel</a>
                                            
                                            </div>
                                        </div>


                                        <?php
                    }
                }

				
							
?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="../bootstrap-5.1.3-dist/js/bootstrap.js"></script>
            <script src="../bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>

            <script>
            const inpFile = document.getElementById("inpFile");
            const previewContainer = document.getElementById("imagePreview");
            const previewImage = previewContainer.querySelector(".image-preview__image");
            const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

            inpFile.addEventListener("change", function() {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();

                    previewDefaultText.style.display = "none";
                    previewImage.style.display = "block";

                    reader.addEventListener("load", function() {
                        previewImage.setAttribute("src", this.result);
                    });

                    reader.readAsDataURL(file);
                } else {
                    previewDefaultText.style.display = null;
                    previewImage.style.display = null;
                    previewImage.setAttribute("src", "");
                }
            });
            </script>
    </section>
</body>

</html>