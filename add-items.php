<?php
    include "classes/item.php";
    $item = new Item;
    $rows = $item->getAllCoffee();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Items</title>
</head>

<body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">Coffee Shop</h1>
            </a>
            <div class="ms-auto">
                <ul class="navbar-nav">
                <li class="nav-item"><a href="dashboard.php" class="nav-link">DASHBOARD</a></li>
                <li class="nav-item"><a href="add-items.php" class="nav-link">ITEM</a></li>
                <li class="nav-item"><a href="sales-port.php" class="nav-link">SALES-PORT</a></li>
                <li class="nav-item"><a href="profile.php" class="nav-link"><?= $_SESSION['user_name'] ?></a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-danger">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="height: 80vh">
        <div class="row h-50 m-3">
            <div class="card w-50 my-5 mx-auto" style="line-height:45px;">
                <div class="card-header bg-transparent border-0">
                    <h1 class="text-center my-3">ADD ITEM</h1>
                </div>
                <div class="card-body">
                    <form action="actions/add-items.php" method="post" enctype="multipart/form-data">
                        <label for="iname" class="form-label">Name</label>
                        <input type="text" name="iname" id="iname" class="form-control" required autofocus>

                        <label for="stock" class="form-mlabel fw-bold">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control fw-bold" maxlength="15" required>

                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control fw-bold" minlength="3" required>

                        <!-- <input type="radio"　name="food" value="coffee">Coffee
                        <input type="radio"　name="food" value="main">Main dish
                        <input type="radio"　name="food" value="desserts">Desserts
                        <input type="radio"　name="food" value="drinks">Drinks -->
                        Food Type
                        <select name="food">
                            <option value="coffee">Coffee</option>
                            <option value="main">Main Dish</option>
                            <option value="desserts">Desserts</option>
                            <option value="drinks">Drinks</option>
                        </select>

                        <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>

                        <button type="submit" class="btn btn-warning w-100 mt-3">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <main class="container">
        <h2 class="text-muted display-6">ITEM LIST</h2>
        <table class="table table-hover">
            <thead class="table-secondary">
                <tr>
                    
                    <th>item_id</th>
                    <th>item_name</th>
                    <th>item_stock</th>
                    <th>item_price</th>
                    <th>item_photo</th>
                    <th></th>   <!-- for action buttons -->
                </tr>
            </thead>
            <tbody class="lead">
                <?php
                // while($user_details = $user_list->fetch_assoc()){
                    foreach($rows as $user_list){
                ?>
                <tr>
                    <td><?= $user_list['item_id'] ?></td>
                    <td><?= $user_list['item_name'] ?></td>
                    <td><?= $user_list['item_stock'] ?></td>
                    <td><?= $user_list['item_price'] ?></td>
                    <td><?= $user_list['item_photo'] ?></td>
                    <td><img src="images/<?= $user_list['item_photo'] ?>" style="height:50px; width:50px "> 
                        <a href="edit-items.php?item_id=<?= $user_list['item_id'] ?>" class="btn btn-outline-warning">
                          Edit</a>   
                        <a href="delete-items.php?item_id=<?= $user_list['item_id'] ?>" class="btn btn-outline-danger">
                        Delete</a>  
                        <a href="items-comment.php?item_id=<?= $user_list['item_id'] ?>" class="btn btn-outline-success">
                        Comment</a>  
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>