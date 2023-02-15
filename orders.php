<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/orders.css">
    <script src="js/orders.js" defer></script>
    <script src="js/modal.js" defer></script>
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
            <div class="navigation-link">
                <img src="assets/product-icon.svg" class="sidebar-icon">
                <a href="products.php"><span class="nav-name">Products</span></a>
            </div>
            <div class="navigation-link active">
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
            <img src="assets/order-icon-black.svg" alt="">
            <span>Orders</span>
        </div>
        <br>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Order Nb</th>
                    <th style="text-align: center">Products</th>
                    <th>Total($)</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- Modal Container-->
    <div id="modal-container">
        <!--  Modal  -->
        <div id="modal">
            <!--  Modal Header  -->
            <div id="modal-header">
                <span style="color: #ABABAB; font-size: 21px;" class="modal-title"></span>
                <span id="close-button" style="color: #ABABAB;">&times;</span>
            </div>
            <!-- Modal Content -->
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Code(s)</th>
                        <th>Category</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        </div>
    
</body>

</html>