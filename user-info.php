<?php
    
    $user_id = $_GET['user_id'];
    include "classes/user.php";
    $user = new User;
    
    $user_list = $user->getUser($user_id);
    
    include "classes/comment.php";
    $comment = new Comment;
    $comment_details = $comment->getCommentsOfUser($user_id);
    
    
    include "classes/item.php";
    $item = new Item;
   


    
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>User Info</title>
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
         <img src="images/<?= $user_list['photo'] ?>" alt="" class="card-img-top">
        <div class="card-footer border-0 bg-white text-center">
            <p class="lead"><?= $user_list['user_name'] ?></p>
        </div> 
    </main>
    <div class="container">
  <div class="row">
            <?php
				foreach($comment_details as $c){
					?>
						<div class="col-md-3">
							<div class="card text-center mt-5 my-3"  style="height: 200px;">
								<div class="card-header text-center h-50 text-wrap p-0"style="line-height: 100px;">
            
                                    <?php
                                        echo $c['user_comment']; 
                                    ?>
                                    
								</div>
								<div class="card-body h-50"> 
                                <img src="images/<?= $c['item_photo'] ?>" class="w-25 h-100">
                                   <?php
                                        echo $c['item_name']; 
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