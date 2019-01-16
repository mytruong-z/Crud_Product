<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo 'BASE_URL';?>">
    <title>Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("bootstrap/css/bootstrap.min.css"); ?>">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url("bootstrap/js/bootstrap.min.js"); ?>"></script>
</head>
<style>
    .cart{
        float: right;
        margin-top: 20px;
        margin-right: 20px;
        color: white;
    }
    .text-left{
        color: black;
    }
    .lg{
        top: 0;
        position: absolute;
        z-index: 1000;
    }
    .nav{
        height: 80px;
    }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    /* Update item quantity */
    function updateCartItem(obj, rowid){
        $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
            if(resp == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
</script>
<div>
    <nav id="myNavbar" class="nav navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
        <a href="<?php echo base_url("products/") ?>" >
            <img class="lg active" height="80px" width="80px" src="http://localhost/ShopCart/uploads/lgG.png"></a>
        <!-- Cart info -->
        <div>
            <a href="<?php echo base_url('cart'); ?>" class="cart-link cart" title="View Cart">
                <i style="font-size: xx-large" class=" glyphicon glyphicon-shopping-cart"></i>
                <span style="color: white;">(<?php echo $this->cart->total_items(); ?>)</span>
            </a>
        </div>
        <h2 id="mfs" style="color: white;font-family: 'American Typewriter';text-align: center ;">YourCart</h2>
    </nav>
</div>
<div class="container">
    <!-- Include jQuery library -->

    <h2>Shopping Cart</h2>
    <div class="row cart">
        <table class="table">
            <thead>
            <tr>
                <th width="10%"></th>
                <th width="30%">Product</th>
                <th width="15%">Price</th>
                <th width="13%">Quantity</th>
                <th width="20%">Subtotal</th>
                <th width="12%"></th>
            </tr>
            </thead>
            <tbody>
            <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
                <tr>
                    <td>
                        <?php $imageURL = !empty($item["image"])?base_url('uploads/product_images/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
                        <img src="<?php echo $imageURL; ?>" width="50"/>
                    </td>
                    <td><?php echo $item["name"]; ?></td>
                    <td><?php echo '$'.$item["price"].' USD'; ?></td>
                    <td><input type="number" name="numberCart" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')">
                        <?php echo form_error('numberCart','<p class="help-block error">','</p>'); ?></td>
                    <td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
                    <td>
                        <a href="<?php echo base_url('cart/removeItem/'.$item["rowid"]); ?>" class="btn btn-danger" onclick="return confirm('Delete Product?')"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
            <?php } }else{  ?>
            <tr><td colspan="6"><p>Your cart is empty.....</p></td>
                <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td><a href="<?php echo base_url('products/'); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
                <td colspan="3"></td>
                <?php if($this->cart->total_items() > 0){ ?>
                    <td class="text-left">Grand Total: <b><?php echo '$'.$this->cart->total().' USD'; ?></b></td>
                    <td><a href="<?php echo base_url('checkout/'); ?>" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
                <?php } ?>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
