<?php

    include "classes/user.php";
    $user = new User;
    $user_details = $user->getUser($_SESSION['user_id']);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Profile</title>
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">Cafe Shop</h1>
            </a>
            <div class="ms-auto">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="profile.php" class="nav-link me-3">PROFILE</a></li>
                    <li class="nav-item"><a href="products.php" class="nav-link me-3">PRODUCTS</a></li>
                    <li class="nav-item"><a href="shop.php" class="nav-link text-warning me-3">SHOP</a></li>
                    <li class="nav-item"><a href="cart.php" class="nav-link  me-3">CART</a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link"><?= $_SESSION['user_name'] ?></a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-danger">LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="card w-25 mx-auto my-5">
        <img src="images/<?= $user_details['photo'] ?>" alt="Profile Picture" class="card-img-top">
        <div class="card-body">
            <form action="actions/upload-photo.php" method="post" enctype="multipart/form-data">
                <div class="input-group input-group-sm">
                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>
                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-arrow-circle-up"></i></button>
                </div>
            </form>
        </div>
        <div class="card-footer border-0 bg-white">
            <p class="lead fw-bold mb-0"><?= $user_details['first_name'] . " " . $user_details['last_name']; ?></p>
            <p class="lead"><?= $user_details['user_name'] ?></p>
        </div>
    </main>
    <!-- <div class="container my-5">        -->
            <!-- <form method="post" action="actions/add-comment.php"> -->
                <!-- <label for="comment" class="form-label">Comment?</label> -->
                <!-- <textarea class="form-control" placeholder="comment" name="comment" id="comment"><?= $user_details['comment']?></textarea> -->
                <!-- <button class="btn btn-outline-danger" type="submit">Comment</button>           -->
            <!-- </form> -->
    <!-- </div> -->
</body>

</html>