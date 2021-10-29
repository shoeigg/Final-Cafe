<?php
   
    include "classes/item.php";
    $item = new Item;
    // $user_details = $user->getUser($user_id);
    $item_id = $_GET['item_id'];
    $items_comment = $item->getItem($item_id);

    include "classes/user.php";
    $user = new User;
    $user_list = $user->ItemsComment($item_id);
    
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Cafe Shop</title>
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
                      　<li class="nav-item"><a href="add-items.php" class="nav-link">ITEM</a></li>
                        <li class="nav-item"><a href="sales-port.php" class="nav-link">SALES-PORT</a></li>
                        <li class="nav-item"><a href="profile.php" class="nav-link"><?= $_SESSION['user_name'] ?></a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link text-danger">Logout</a></li>                       
                </ul>
            </div>
        </div>
    </nav>
<div class="container">
    <div class="card w-25 mx-auto">　
        <div class="card-header p-0">
            <img src="images/<?= $items_comment['item_photo']?>" class=" w-100">
        </div>
        <div class="card-body  bg-white">
            <p class="lead fw-bold text-center"><?= $items_comment['item_name'];?></p>
            <p class="lead text-center"><?= $items_comment['item_price']; ?></p>
        </div> 
    </div>        
</div>

<div class="container">
  <div class="row">
            <?php
				foreach($user_list as $c){
					?>
						<div class="col-md-3">
							<div class="card text-center mt-5 my-3"  >
								<div class="card-header text-center h-50 text-wrap p-0" style="line-height: 100px;">
            
                                    <?php
                                        echo $c['user_comment']; 
                                    ?>
                                    
								</div>
								<div class="card-body h-50"> 
                                <img src="images/<?= $c['photo'] ?>" class="w-25 h-100">
                                   <?php
                                        echo $c['user_name']; 
                                    ?>
                                </a>
                                  
								</div>
							</div>
						</div>
					<?php
				}
			?>
  
        
</body>

</html>