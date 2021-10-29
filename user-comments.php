<?php
    include "classes/user.php";
    $user = new User;
    $user_id = $_GET['user_id'];
    $user_details = $user->getUser($user_id);

    include "classes/comment.php";
    $comment = new Comment;
    $users_comment = $user->UserComments($user_id);
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
                    <li class="nav-item"><a href="sales-port.php" class="nav-link">SALES-PORT</a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link"><?= $_SESSION['user_name'] ?></a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-danger">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="card w-25 mx-auto my-5">
        <img src="images/<?= $user_details['photo']?>" alt="Profile Picture" class="card-img-top">
        <div class="card-body  bg-white">
            <p class="lead fw-bold text-center"><?= $user_details['first_name'] . " " . $user_details['last_name']; ?></p>
            <p class="lead text-center"><?= $user_details['user_name'] ?></p>
        </div>
    </main>

    <div class="container">
  <div class="row">
            <?php
				foreach($users_comment as $c){
					?>
						<div class="col-md-3">
							<div class="card text-center mb-3"  style="height: 200px;">
								<div class="card-header text-center h-50 text-wrap p-0" style="line-height: 100px;">
                                    <?php
                                        echo $c['user_comment']; 
                                    ?>
								</div>

								<div class="card-body h-50">  
                                <img src="images/<?= $c['item_photo'] ?>" class="w-30 h-100">         
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