<?php
    include "classes/user.php";
    $user = new User;
    $user_list = $user->getAllUsers();

    include "classes/product.php";
    $product = new Product;
    $compute= $product->ComputeTotales();
    
    $compute_totales = 0.0;

    foreach($compute as $sales){
        $compute_totales = $compute_totales + ($sales['price'] * $sales['num_items']);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales port</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
　　<nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">Cafe Shop</h1>
            </a>
            <div class="ms-auto">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="dashboard.php" class="nav-link">DASHBOARD</a></li>
                    <li class="nav-item"><a href="sales-port.php" class="nav-link">SALES-PORT</a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link"><?= $_SESSION['user_name'] ?></a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-danger">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <table class="table mx-auto text-white w-25 table-striped table-borderless my-4">
                <thead class="bg-info">
                <th class="text-center"><span class="h4">COMPUTE-TOTALES</span> <span class="h2 ms-3"> <?php echo number_format($compute_totales, 2); ?> </span></th>
                   
                </thead>     
        </table>

<div class="container" style="padding-top: 80px">
    <div class="row">
        <div class="col-md-3 p-3">
            <div class="card mx-auto  bg-transparent" style="height: 100px;">
                <div class="card-header text-center"><a href="product-sales.php?itemtype='<?php echo "coffee"; ?>'">
               <i class="h4 fas fa-coffee"></i></a> 
                </div>
                <div class="card-body text-center">
                    <label for="coffee">COFFEE</label>
                     
                </div>
            </div>
      </div> 

      <div class="col-md-3 p-3">
            <div class="card mx-auto  bg-transparent" style="height: 100px;">
                <div class="card-header text-center"><a href="product-sales.php?itemtype='<?php echo "maindish"; ?>'">
                <i class="h4 fas fa-drumstick-bite"></i></a> 
                </div>
                <div class="card-body text-center">
                    <label for="maindish">MAIN DISH</label>
                     
                </div>
            </div>
      </div>

      <div class="col-md-3 p-3">
            <div class="card mx-auto  bg-transparent" style="height: 100px;">
                <div class="card-header text-center"><a href="product-sales.php?itemtype='<?php echo "desserts"; ?>'">
                <i class="h4 fas fa-stroopwafel"></i></a> 
                </div>
                <div class="card-body text-center">
                    <label for="dessert">DESSERT</label>
                     
                </div>
            </div>
      </div>

      <div class="col-md-3 p-3">
            <div class="card mx-auto  bg-transparent" style="height: 100px;">
                <div class="card-header text-center"><a href="product-sales.php?itemtype='<?php echo "drinks"; ?>'">
                <i class="h4 fas fa-wine-glass-alt"></i></a> 
                </div>
                <div class="card-body text-center">
                    <label for="drink">DRINK</label>
                     
                </div>
            </div>
      </div>
    </div>
    
      
        

</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
    crossorigin="anonymous"></script>    
</body>
</html>
​
                       