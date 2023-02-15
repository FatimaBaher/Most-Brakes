<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js" defer></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/10.3.3/highcharts.js" integrity="sha512-8cJ3Lf1cN3ld0jUEZy26UOg+A5YGLguP6Xi6bKLyYurrxht+xkLJ9oH9rc7pvNiYsmYuTvpe3wwS6LriK/oWDg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <title>Most Brakes</title> 
</head>
<body>
    <div class="sidebar">
        <img src="assets/LOGO 1.png" alt="log" width=100% class="logo">
        <div class="side-nav nav-up">
            <div class="navigation-link active">
                <img src="assets/home-icon.svg" class="sidebar-icon">
                <a href="index.php"><span class="nav-name">Home</span></a>
            </div>
            <div class="navigation-link">
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
            <img src="assets/home-icon-black.svg" alt="">
            <span>Home</span>
        </div>
        <br>
        <h3>Today:</h3>
        <div class="cards-section">
            <div class="card">
                <div class="card-title">Brake Pad</div>
                <div class="card-info">
                    <div class="card-info-item">
                        <span class="card-number brakepad-nb">32</span>&nbsp
                        <span class="card-key">items</span>
                    </div>
                    <div class="card-info-price">
                        <span class="card-number brakepad-total">1.5K</span>&nbsp
                        <span class="card-key">$</span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-title">Battery</div>
                <div class="card-info">
                    <div class="card-info-item">
                        <span class="card-number battery-nb">32</span>&nbsp
                        <span class="card-key">items</span>
                    </div>
                    <div class="card-info-price">
                        <span class="card-number battery-total">1.5K</span>&nbsp
                        <span class="card-key">$</span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-title">Oil</div>
                <div class="card-info">
                    <div class="card-info-item">
                        <span class="card-number oil-nb">32</span>&nbsp
                        <span class="card-key">items</span>
                    </div>
                    <div class="card-info-price">
                        <span class="card-number oil-total">1.5K</span>&nbsp
                        <span class="card-key">$</span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-title">Belt</div>
                <div class="card-info">
                    <div class="card-info-item">
                        <span class="card-number belt-nb">32</span>&nbsp
                        <span class="card-key">items</span>
                    </div>
                    <div class="card-info-price">
                        <span class="card-number belt-total">1.5K</span>&nbsp
                        <span class="card-key">$</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="container">

        </div>
    </div>
</body>
</html>
