<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('session');
$user_detail = $this->session->userdata('user_data_session');
$name = $user_detail['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo 'BASE_URL';?>">
    <title>Checkout</title>
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
    .container1{
        margin-top: 45px;
    }
    .container2{
        margin-top: 40px;
    }
    .control-label{
        margin-left: 15px;
    }
    .orderBtn{
        float: right;
    }
    .navbar{
        min-height: 8px;
    }
    .logout_client{
        margin-right: 15px;
        float: right;
        color: #3c3c3c;
        font-weight: bold;
    }
    .log_out{
        padding-bottom: 2px;
        padding-top: 2px;
        color: black;
        font-family: monospace;
    }
    .navbar-fixed-top{
        background-color: whitesmoke;
    }
    .dropdown-menu{
        border-radius: 3px;
        padding: 5px 10px;
    }


</style>
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
<div class="container container1">
    <div>
        <a  href="<?php echo base_url('user/cart'); ?>" class="cart-link cart" title="View Cart">
            <i style="font-size: xx-large" class=" glyphicon glyphicon-shopping-cart"></i>
            <span ">(<?php echo $this->cart->total_items(); ?>)</span>
        </a>
    </div>
    <h1 style="margin-top: 0px" align="center">Checkout</h1>
<div class="container container2">
    <div class="row checkout">
        <!-- Order items -->
        <div class="col-lg-8">
            <table class="table">
                <thead>
                <tr>
                    <th width="13%"></th>
                    <th width="34%">Product</th>
                    <th width="18%">Price</th>
                    <th width="13%">Quantity</th>
                    <th width="22%">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){ ?>
                    <tr>
                        <td>
                            <?php $imageURL = !empty($item["image"])?base_url('images/products/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
                            <img src="<?php echo $imageURL; ?>" width="75px" height="60px"/>
                        </td>
                        <td><?php echo $item["name"]; ?></td>
                        <td><?php echo '$'.$item["price"].' USD'; ?></td>
                        <td><?php echo $item["qty"]; ?></td>
                        <td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
                    </tr>
                <?php } }else{ ?>
                    <tr>
                        <td colspan="5"><p>No items in your cart...</p></td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <?php if($this->cart->total_items() > 0){ ?>
                        <td class="text-center">
                            <strong>Total <?php echo '$'.$this->cart->total().' USD'; ?></strong>
                        </td>
                    <?php } ?>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <!-- Shipping address -->
            <form class="form-horizontal" method="post">
                <div class="ship-info">
                    <h4>Shipping Info</h4>
                    <div class="form-group">
                        <label class="control-label"><i class="glyphicon glyphicon-user"></i> Full Name</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="<?php echo !empty($custData['name'])?$custData['name']:''; ?>" placeholder="Enter name">
                            <?php echo form_error('name','<p class="help-block error">','</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="fname"><i class="glyphicon glyphicon-envelope"></i> Email</label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="<?php echo !empty($custData['email'])?$custData['email']:''; ?>" placeholder="Enter email">
                            <?php echo form_error('email','<p class="help-block error">','</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="fname"><i class="glyphicon glyphicon-phone"></i> Phone</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" value="<?php echo !empty($custData['phone'])?$custData['phone']:''; ?>" placeholder="Enter contact no">
                            <?php echo form_error('phone','<p class="help-block error">','</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="fname"><i class="glyphicon glyphicon-home"></i> Address</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" value="<?php echo !empty($custData['address'])?$custData['address']:''; ?>" placeholder="Enter address">
                            <?php echo form_error('address','<p class="help-block error">','</p>'); ?>
                        </div>
                    </div>
                </div>
                <div class="footBtn">
                    <a href="<?php echo base_url('user/cart/'); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Back to Cart</a>
                    <button type="submit" name="placeOrder" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>