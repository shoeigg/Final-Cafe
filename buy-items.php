<?php
    $item_id = $_GET['item_id'];
    include "classes/item.php";
    $item = new Item;
    $rows = $item->getItem($item_id);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Coffee Shop</title>
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">Coffee Shop</h1>
            </a>
            <div class="ms-auto">
                <ul class="navbar-nav"> 
                    <li class="nav-item"><a href="profile.php" class="nav-link text-white me-3">PROFILE</a></li> 
                    <li class="nav-item"><a href="shop.php" class="nav-link text-warning me-3">SHOP</a></li>
                    <li class="nav-item"><a href="cart.php" class="nav-link text-white me-3">CART</a></li> 
                    <li class="nav-item"><a href="profile.php" class="nav-link"><?= $_SESSION['user_name'] ?></a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-danger">LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5"> <br><br><br>
        <div class="w-50 mx-auto border " style="height: 250px;"> 
            <div id="left" class="w-50 h-100 float-start"> 
                <img src="images/<?= $rows['item_photo'] ?>" class="w-75 h-100"> 
            </div>
            <div id="right" class="w-50 float-start" > <br>
                <?= $rows['item_name'] ?> <br>
                <?= $rows['item_stock'] ?> <br>
                <?= number_format($rows['item_price'],2) ?> <br>
    
                <div class="mt-3">
                    How many items to buy?
                    <form action="actions/add-cart.php" method="post">
                        <input type="number" name="nums" id="" class="form-control w-50 my-3">
                        <!-- 1. using input hide the item id -->
                        <input type="hidden" value="<?= $item_id ?>" name="item" class="form-control w-50 my-3">
                        <input type="hidden" value="<?= $rows['item_price'] ?>" name="price" class="form-control w-50 my-3">
                        <!-- 2. using input hide the price -->
                        <input type="submit" name="buy" class="btn btn-info w-50" id="" value="Buy" >
                      
                    </form>
                </div>
                
            </div>
        </div>
    </main>
</body>

</html>