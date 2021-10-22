<?php
    $item_id = $_GET['item_id'];
    include "classes/item.php";
    $item = new Item;
    $rows = $item->getItem($item_id);

    include "classes/comment.php";
    $comment = new Comment;
    $user_comment = $comment->getComments($item_id);
    print_r ($user_comment);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
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
                    <li class="nav-item"><a href="cart.php" class="nav-link me-3">CART</a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link me-3"><?= $_SESSION['user_name'] ?></a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-danger">LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </nav>
      
    
     <main class="container my-5"> <br><br><br>
        <div class="w-50 mx-auto border " style="height: 250px;"> 
            <div id="left" class="w-50 h-100 float-start"> 
                <img src="images/<?= $rows['item_photo'] ?>" class="w-100 h-100"> 
            </div>
            <div id="right" class="w-50 float-start text-center"> <br>
               <h1> <?= $rows['item_name'] ?></h1> <br>
            </div>
        </div>
    </main>
    <div class="container my-5">       
            <form method="post" action="actions/add-comment.php">
                 <label for="comment" class="form-label">Comment</label>
                 <textarea class="form-control"style="resize:none"rows="10" placeholder="comment" name="comment" id="comment"></textarea>
                 <input type="hidden" name="item_id" value="<?= $item_id?>"> <br>
                 <button class="btn btn-outline-danger" type="submit">Submit Comment</button>          
             </form>
     </div>
     <?php
				foreach($user_comment as $comment){
					?>
						<div class="col-md-4">
							<div class="card mb-2">
								<div class="card-header p-2">
								<?php
								    echo $comment['photo'];
								 ?>
								</div>
								<div class="card-body text-center">
									<?= $comment['user_comment'] ?> 
								</div>
							</div>
						</div>
					<?php
				}
			?>
	      </div>
	    </div>
	  </section>
</body>
</html> 