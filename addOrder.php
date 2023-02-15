<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/addOrder.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.css" integrity="sha512-VSD3lcSci0foeRFRHWdYX4FaLvec89irh5+QAGc00j5AOdow2r5MFPhoPEYBUQdyarXwbzyJEO7Iko7+PnPuBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.js" integrity="sha512-MnKz2SbnWiXJ/e0lSfSzjaz9JjJXQNb2iykcZkEY2WOzgJIWVqJBFIIPidlCjak0iTH2bt2u1fHQ4pvKvBYy6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/modal.js" defer></script>
    <script src="js/add-order.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="js/selectstyle.js"></script>
    <title>Add Order</title>
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
            <div class="navigation-link">
                <img src="assets/order-icon.svg" class="sidebar-icon">
                <a href="orders.php"><span class="nav-name">Orders</span></a>
            </div>
            <div class="navigation-link active">
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
    <!-- Modal Container-->
    <div id="modal-container">
    <!--  Modal  -->
    <div id="modal">
        <!--  Modal Header  -->
        <div id="modal-header">
            <span style="color: #ABABAB; font-size: 21px;">Add New Product</span>
            <span id="close-button" style="color: #ABABAB;">&times;</span>
        </div>
        <!-- Modal Content -->
        <form id="modal-body">
            <div class="modal-form-group">
                <label for="">Code</label>
                <input type="text" class="code">
            </div>
            <div class="modal-form-group">
                <label for="">Category</label>
                <select id="category-dropdown" class="category">
                    <option value="brakePad">Brake Pad</option>
                    <option value="oil">Oil</option>
                    <option value="battery">Battery</option>
                    <option value="belt">Belt</option>
                </select>
            </div>
            <div class="modal-form-group">
                <label for="">Wholesale Price ($)</label>
                <input type="number" value="1" min="1" class="whPrice">
            </div>
            <div class="modal-form-group">
                <label for="">Customer Price ($)</label>
                <input type="number" value="1" min="1" class="cPrice">
            </div>
            <div class="modal-form-group">
                <label for="">Description</label>
                <textarea rows="3" class="description"></textarea>
            </div>
            <button class="saveProductBtn" type="button">Save Product</button>
        </form>
    </div>
    </div>
    <div class="wrapper">
        <div class="title">
            <img src="assets/add-order-black.svg" alt="">
            <span>Add Order</span>
        </div>
        <span>Total: <span id="total">0</span>$</span>
        <div class="orderInfo">
            <div class="orderInfo1">
                <span>Order Number</span>
                <input id="order-nb" type="text" class="order-input">
            </div>
            <div class="orderInfo2">
                <span>Date</span>
                <input id="order-date" type="date" class="order-input" >
            </div>
        </div>
        <div class="orderProducts">
            <table id="table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <form class="form">
                <div id="field-array"></div>
                <div class="orderProducts-btns">
                    <button id="add-field"><div><img src="assets/plus.svg" alt="" width="16px">Add Product</div></button>
                    <button id="save-order" type="button"><div><img src="assets/save.svg" alt="" width="20px">Save Order</div></button>
                </div>
            </form>
            
            <br />
            <br />
            <br />
            
        </div>
    </div>
    <div id="toast"></div>
</body>
</html>