<?php
        include "classes/user.php";
        $user = new User;
        $user_list = $user->getAllUsers();
        $user_id = $_GET['user_id'];
        $user_order = $user->UserOrder($user_id);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title></title>
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">Cafe Shop</h1>
            </a>
            <div class="ms-auto">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="dashboard.php" class="nav-link me-3">DASHBOARD</a></li>
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
    <main class="container" style="padding-top: 80px">
        <h2 class="text-muted display-6">USER ORDER</h2>
        <table class="table table-hover">
            <thead class="table-secondary">
                <tr>
                    <th>Item Name</th>
                    <th>Number Items</th>
                    <th class="fw-bold">Price</th>
                    <th>Item Photo</th>
                </tr>
            </thead>
            <tbody class="lead">
                <?php
                // while($user_details = $user_list->fetch_assoc()){
                    foreach($user_order as $user_list){
                ?>
                <tr>
                    <td><?= $user_list['item_name'] ?></td>
                    <td><?= $user_list['num_items'] ?></td>
                    <td><?= $user_list['price'] ?></td>
                    <td><img src="images/<?= $user_list['item_photo'] ?>" class="w-25" style="height: 50px;"></td>
                    
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </main>
    
</body>

</html>