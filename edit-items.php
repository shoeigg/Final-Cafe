<?php

    include "classes/item.php";

    $item = new Item;
    $user_list = $item->getItem($_GET['item_id']);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Item</title>
</head>

<body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">Cafe Shop</h1>
            </a>
            <div class="ms-auto">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="profile.php" class="nav-link"><?= $_SESSION['user_name'] ?></a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-danger">Log　out</a></li>
                </ul>
            </div>
        </div>
</nav>
    <main class="container" style="padding-top: 80px">
        <div class="card w-50 mx-auto border-0">
            <div class="card-header bg-white border-0">
                <h2 class="text-center">EDIT ITEM</h2>
            </div>
            <div class="card-body">
                <form action="actions/edit-items.php" method="post">
                            <input type="hidden" name="item_id" value="<?= $user_list['item_id'] ?>">  

                            <label for="iname" class="form-label">Name</label>
                            <input type="text" name="iname" id="iname" class="form-control mb-2" required autofocus>

                            <label for="stock" class="form- fw-bold">Stock</label>
                            <input type="number" name="stock" id="stock" class="form-control mb-2 fw-bold" maxlength="15" required>

                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control mb-2" minlength="3" required>


                            <div class="text-end">
                                <button type="submit" class="btn btn-warning btn-sm px-5">Update</button>
                                <a href="add-items.php" class="btn btn-secondary btn-sm">Cancel</a>
                            </div>           
                </form>
            </div>
        </div>
    </main>
</body>

</html>