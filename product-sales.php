<?php
    include "classes/item.php";
    $item = new Item;
    $rows = $item->getAllCoffee();

    include "classes/product.php";
    $product = new Product;
    $itemtype = $_GET['itemtype'];
    $sales = $product->productSales($itemtype);

    $totalsales = 0.0;
    foreach($sales as $r){
        $totalsales = $totalsales + ($r['price'] * $r['num_items']);
    }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Products</title>
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">Coffee Shop</h1>
            </a>
            <div class="ms-auto">
                <ul class="navbar-nav">
                <li class="nav-item"><a href="profile.php" class="nav-link me-3">PROFILE</a></li>
                    <li class="nav-item"><a href="shop.php" class="nav-link text-warning me-3">SHOP</a></li>
                    <li class="nav-item"><a href="cart.php" class="nav-link  me-3">CART</a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link"><?= $_SESSION['user_name'] ?></a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-danger">LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <table class="table mx-auto text-white w-25 table-striped table-borderless my-4">
                <thead class="bg-danger">
                    <th class="text-center"><span class="h4">SALES</span> <span class="h2 ms-3"> <?php echo number_format($totalsales, 2); ?> </span></th>                  
                </thead>               
        </table>
    <main class="container my-5">
        <div class="row">
            <?php
                foreach($sales as $r){
                    ?>
                        <div class="col-md-3 my-4">
                            <div class="card mb-2">
                                <div class="card-header p-0">
                                    <img src="images/<?= $r['item_photo'] ?>" class="w-100" style="height:200px;">
                                </div>
                                <div class="card-bod text-center">
                                    <?= $r['item_name'] ?> <br>
                                    <?= number_format($r['price'],2) ?> <br>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </main>

    
</body>

</html>