<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/products.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.js" integrity="sha512-MnKz2SbnWiXJ/e0lSfSzjaz9JjJXQNb2iykcZkEY2WOzgJIWVqJBFIIPidlCjak0iTH2bt2u1fHQ4pvKvBYy6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.css" integrity="sha512-VSD3lcSci0foeRFRHWdYX4FaLvec89irh5+QAGc00j5AOdow2r5MFPhoPEYBUQdyarXwbzyJEO7Iko7+PnPuBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/products.js" defer></script>
    <title>Products</title>
</head>

<body>
    <div class="sidebar">
        <img src="assets/LOGO 1.png" alt="log" width=100% class="logo">
        <div class="side-nav nav-up">
            <div class="navigation-link">
                <img src="assets/home-icon.svg" class="sidebar-icon">
                <a href="index.php"><span class="nav-name">Home</span></a>
            </div>
            <div class="navigation-link active">
                <img src="assets/product-icon.svg" class="sidebar-icon">
                <a href="products.php"><span class="nav-name">Products</span></a>
            </div>
            <div class="navigation-link">
                <img src="assets/order-icon.svg" class="sidebar-icon">
                <a href="orders.php"><span class="nav-name">Orders</span></a>
            </div>
            <div class="navigation-link">
                <img src="assets/add-order-icon.svg" class="sidebar-icon">
                <a href="addOrder.php"><span class="nav-name">Add Order</span></a>
            </div>
        </div>
        <div class="side-nav nav-bottom">
            <div class="navigation-link">
                <img src="assets/settings-icon.svg" class="sidebar-icon">
                <a><span class="nav-name">Settings</span></a>
            </div>
            <div class="navigation-link">
                <img src="assets/logout-icon.svg" class="sidebar-icon">
                <a><span class="nav-name">Logout</span></a>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="title">
            <img src="assets/package-black.svg" alt="">
            <span>Products</span>
        </div>
        <form class="search">
            <input type="text" class="search-input" placeholder="Search Code...">
        </form>
        <br>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Code(s)</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Wholesale</th>
                    <th>Customer</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="product-not-found">
            Sorry... No Products Were Found!
        </div>
    </div>
    <div id="toast"></div>
    
</body>

</html>