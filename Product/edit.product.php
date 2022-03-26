<?php
include("../Database/auth.php");

require('../Database/database.php');

?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller</title>
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
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <nav class="navbar navbar-light navbar-expand bg-light justify-content-center rounded-3">
                            <div class="container">
                                <ul class="navbar-nav nav-justified w-100 text-center mt-1">
                                    <li class="nav-item">
                                        <a href="list.form.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-list-ul"><br>Product</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="add.form.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-bag-plus-fill"><br>Add</span>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link active d-flex flex-column" data-toggle="collapse">
                                            <span class="bi bi-bell-fill"><br>Order</span>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="settings.form.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-gear-fill"><br>Setting</span>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../Database/logout.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-box-arrow-right"><br>Logout</span>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>

                        <?php 
             $query = 'SELECT * FROM product
              WHERE
              product_id ='.$_GET['id'];
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
              while($row = mysqli_fetch_array($result))
              {   
                $a= $row['product_id'];
                $b= $row['pname'];
                $c=$row['ptype'];
                $d=$row['pprice'];
                $e=$row['pstock'];
                $f= base64_encode( $row['pimage'] );
              }
              
              $id = $_GET['id'];
         
?>

                        <form class="mx-1 mx-md-4" action="update.data.php" method="POST">

                            <div class="row mt-5">
                                <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                                    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="tm-block-title d-inline-block">Edit Product</h3>
                                            </div>
                                        </div>
                                        <div class="row tm-edit-product-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <form action="" class="tm-edit-product-form">
                                                    <div class="form-group mb-3">
                                                        <input name="id" type="hidden" value="<?php echo $a; ?>"
                                                            class="form-control validate">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="name">Product Name</label>
                                                        <input id="name" name="pname" value="<?php echo $b; ?>"
                                                            class="form-control validate">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="name">Product Type</label>
                                                        <input id="name" name="ptype" value="<?php echo $c; ?>"
                                                            placeholder="example Meat or Fish or Vegetavle"
                                                            class="form-control validate">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="name">Product Price</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">₱</span>
                                                            </div>
                                                            <input value="<?php echo $d; ?>" name="pprice"
                                                                class="form-control validate">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                                        <label for="stock">Product Stock</label>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="pstock">
                                                            <option value="In stock">In stock</option>
                                                            <option value="Out of stock">Out of stock</option>
                                                        </select>


                                                    </div>
                                            </div>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="custom-file mt-3 mb-3">
                                                <div class="image-preview" id="imagePreview">

                                                    <img src='data:image;base64,<?php echo $f ?>' class="w-100" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" name="submit"
                                                    class="btn btn-success btn-block text-uppercase">Update
                                                    Product</button>&nbsp;&nbsp;
                        </form>
                        <a button class="btn btn-outline-success" href="image.update.php?type=product&delete & id= <?php echo $a ?>">Update Image</a>
                        <a button class="btn btn-outline-success" href="list.form.php">Cancel</a>


                    </div>

                </div>
            </div>
        </div>
        </div>
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
<script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
<script src="../bootstrap-5.1.3-dist/js/bootstrap.js"></script>