<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('session');
$user_detail = $this->session->userdata('user_data_session');
$name = $user_detail['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo 'BASE_URL';?>">
    <title>Success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("bootstrap/css/bootstrap.min.css"); ?>">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url("bootstrap/js/bootstrap.min.js"); ?>"></script>
</head>
<style>
    .cart{
        float: right;
        color: #a61717 ;
    }
    .navbar{
        min-height: 8px;
    }
    .navbar-fixed-top{
        color: #3c3c3c;
        font-weight: bold;
        background-color: whitesmoke;
    }
    .logout_client{
        margin-right: 15px;
        float: right;
        color: #3c3c3c;
        font-weight: bold;
    }
    .mes{
        border-top-style: dotted;
        border-right-style: solid;
        border-bottom-style: dotted;
        border-left-style: solid;
        border-width: medium;
        border-color: #1e7e34;
        color: #1e7e34;
        text-align: center;
    }
    .ord-addr-info{
        margin-left: 0px;
        margin-bottom: 10px;
        border-bottom-style: none;
        background-color: #e7e7e7;
    }
    .item{
        margin-bottom: 20px;
        border-bottom: 1px solid #a61717;
    }
    .row{
        margin-left: 0px;
        margin-right: 0px;
    }
    .container{
        margin-top: 45px;
        margin-bottom: 40px;
    }
    .hdr{
        font-weight: bold;
    }
    #mySidenav a {
        margin-top: 25px;
        position: fixed;
        left: -80px;
        transition: 0.3s;
        padding: 10px;
        width: 100px;
        text-decoration: none;
        font-size: 20px;
        color: white;
        border-radius: 0 5px 5px 0;
    }

    #mySidenav a:hover {
        left: 0;
    }

    #cancel {
        top: 0px;
        background-color: #a61717;
    }
    .mar-font{
        margin-bottom: 15px;
        font-size: 25px;
    }
    body{
        font-family: monospace;
    }
    .log_out{
        padding-bottom: 2px;
        padding-top: 2px;
        color: black;
        font-family: monospace;
    }
    .dropdown-menu{
        border-radius: 3px;
        padding: 5px 10px;
    }
    .dropdown-menu{
        border-radius: 3px;
        padding: 5px 10px;
    }


</style>
<body>
<div>
    <div id="mySidenav" class="sidenav">
        <a id="cancel" href="<?=base_url()?>user/Product_filter">Cancel</a>
    </div>
    <nav class="navbar navbar-fixed-top log_out" role="navigation">
        <ul class="">
            <li class="dropdown logout_client ">
                <a class="log_out"  href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $name;?>  <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <div><a href="<?php echo base_url("user/Logout/index")?>">Logout</a></div>
                    </li>
                </ul>

            </li>
        </ul>
    </nav>
</div>
<div class="container">
    <div>
        <a  href="<?php echo base_url('user/cart'); ?>" class="cart-link cart" title="View Cart">
            <i style="font-size: xx-large" class=" glyphicon glyphicon-shopping-cart"></i>
            <span ">(<?php echo $this->cart->total_items(); ?>)</span>
        </a>
    </div>
    <h1 style="margin-top: 0px" align="center">Success</h1>
</div>
<body>
<div class="container">
    <p class="mes">Your order has been placed successfully !!!</p>
    <!-- Order status & shipping info -->
    <div class="row col-lg-12 ord-addr-info">
        <div class="col-sm-6 adr ">
            <div class="hdr mar-font">Shipping Address</div>
            <p><?php echo $order['name']; ?></p>
            <p ><?php echo $order['email']; ?></p>
            <p ><?php echo $order['phone']; ?></p>
            <p ><?php echo $order['address']; ?></p>
        </div>
        <div class="col-sm-6 info">
            <div class="hdr mar-font">Order Info</div>
            <p class="font"><b>Reference ID: </b> #<?php echo $order['id']; ?></p>
            <p class="font"><b>Total: </b> <?php echo '$'.$order['grand_total'].' USD'; ?></p>
        </div>
    </div>

    <!-- Order items -->
    <div class="row ord-items">
        <?php if(!empty($order['items'])){ foreach($order['items'] as $item){ ?>
            <div class="col-lg-12 item">
                <div class="col-sm-3">
                    <div class="img" style="height: 75px; width: 75px;">
                        <?php $imageURL = !empty($item["image"])?base_url('images/products/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
                        <img src="<?php echo $imageURL; ?>" width="75" height="100"/>
                    </div>
                </div>
                <div class="col-sm-3" style="margin-bottom: 30px">
                    <p ><b><?php echo $item["name"]; ?></b></p>
                    <p ><?php echo '$'.$item["price"].' USD'; ?></p>
                    <p >QTY: <?php echo $item["quantity"]; ?></p>
                </div>
                <div class="col-sm-2">
                    <p style="float: left"><b><?php echo '$'.$item["sub_total"].' USD'; ?></b></p>
                </div>
            </div>
        <?php } } ?>
    </div>
</div>
</body>