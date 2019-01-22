<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('session');
$user_detail = $this->session->userdata('user_data_session');
$name = $user_detail['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Filters Car</title>
    <!-- Bootstrap Core CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    <link href = "<?php echo base_url(); ?>bootstrap/jquery-ui.css" rel = "stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets4/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>
    .search_product {
        margin-top: 45px;
    }
    .navbar-fixed-top{
        color: #3c3c3c;
        background-color: #e7e7e7;
    }
    .navbar{
        min-height: 10px;
    }
    .logout_client{
        margin-right: 15px;
        float: right;
        color: #3c3c3c;
    }
    .cart{
        float: left;
        color: #a61717  ;
    }
    .row1{
        margin-top: -50px;
    }
    .brand{
        display: none;
    }
    .brands{
        margin-right: 10px;
    }
    .brand_hover:hover{
        background-color: #5cb85c;
        color: whitesmoke;
    }
    .brand_hover:active{
        background-color: #a61717;
        color: whitesmoke;
    }
    .price{
        width: 70px;
        height: 30px;
        color:  #404040;;
        border-radius: 3px;
        border: 1px solid #ddd;
        margin-right: 3px;
    }
    .list-group-item {
        border: 0px;
    }
    .btnSubmit{
        padding: 4px 8px 4px 8px;
        margin-top: 20px;
        width: 100%;
        text-align: left;
    }
    .sort{
        margin-top: 15px;
        margin-bottom: 15px;
    }
    .btnPriceDown{
        margin-left: 10px;
    }
    .btnPriceUp{
        margin-right: 10px;
    }
    .glyphicon-transfer{
        margin-left: 5px;
        margin-right: 5px;
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
    .input-group{
        margin-left: 15px;
    }
    .rating-container .caption {
        margin: 0px;
    }
    .btn_rate{
        padding: 0px;
        margin-left: 3px;
    }
    .div_rate{
        text-align: center;
    }
    .input_rate{
        width: 100px;
        margin-bottom: 3px;
    }
    .input_start{
        position: relative;
        display: -webkit-box;
        margin-bottom: 10px;
    }
    .label_brand:active{

    }

</style>

<body>
<div>
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

        <div class="search_product">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-md-4">
                    <form method="get" action="<?php echo base_url("user/Product_filter") ?>">
                        <div class="input-group">
                            <input type="text" name="search" id="myInput" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-success" name="btnSearch" type="submit"><span class="glyphicon glyphicon-search"></span> </button>
                              </span>
                        </div><!-- /input-group -->
                    </form>
                </div>

        <div class="col-sm-4 cart">
            <a href="<?php echo base_url('user/cart'); ?>" class="cart-link cart" title="View Cart">
                <i style="font-size: xx-large" class=" glyphicon glyphicon-shopping-cart"></i>
                <span">(<?php echo $this->cart->total_items(); ?>)</span>
            </a>
        </div>
            </div>

        </div>
</div>

<!-- Page Content -->
<div class="container">
    <div>
    </div>
    <h1 align="center" style="margin-bottom: 45px">All Product of Lines Auto Car</h1>

    <div class="row row1">
        <div class="col-md-3">
        <form method="get" action="<?php echo base_url("user/Product_filter") ?>">
            <br />
            <div class="list-group">
                <h3>Price</h3>
                 <div class="input-group sort">
                     <button class="btn btn-primary btnPriceUp" name="btnPriceUp" type="submit"><span class="glyphicon glyphicon-sort-by-order"></span> </button>
                     <span class="glyphicon glyphicon-transfer"></span>
                     <button class="btn btn-danger btnPriceDown" name="btnPriceDown" type="submit"><span class="glyphicon glyphicon-sort-by-order-alt"></span> </button>
                 </div>
                <div class="input-group">
                    <input class="price" type="number" name="priceMin" placeholder="min" value="0" />-
                    <input class="price" type="number" placeholder="max" name="priceMax" value="65000" />
                </div>

            </div>
            <div class="list-group ">
                <h3>Brand</h3>
                <div class="list-group-item checkbox brand_hover">
                <label style="font-weight: bold;padding-left: 0px"><button class="brands" onclick="reload()" type="submit" name="brand_all"></button><input name="brand_all" type="text" class="common_selector brand" value="all">All Product</label>
                </div>
                <?php
                foreach($brand_data->result_array() as $row)
                { ?>
                    <div class="list-group-item checkbox brand_hover">
                        <label><input type="checkbox" name="brand[]" class="common_selector ram " value="<?php echo $row['name']; ?>" > <?php echo $row['name']; ?></label>
                    </div>
                    <?php
                } ?>
                <div>
                    <button class="btn-success btnSubmit" name="btnSubmit" type="submit">Search<span style="margin-left: 10px;float: right" class="glyphicon glyphicon-forward"></span> </button>
                </div>
            </div>
            </form>
        </div>

        <div class="col-md-9">
            <br />
            <div align="center" id="pagination_link">

            </div>
            <br />
            <br />
            <br />
            <div class="row filter_data">
               <? foreach($product as $row)
                { ?>
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:20px; height:360px;">
                        <img align="center" style="margin-bottom: 20px" src="<?php echo  base_url()?>images/products/<?php echo  $row['image'];?>" alt="" height="155px" width="150px" class="" >
                        <p align="center"><strong><a href="#"><?php echo  $row['name'];?></a></strong></p>
                        <h4 style="text-align:center;" class="text-danger" ><?php echo  $row['price'];?></h4>
                        <div  class="input_start">
                            <div class="rate-area rating">
                                <button class="btn btn_rate" ><input id="input-1" name="rate" class="rating" data-min="0" data-max="5" data-step="1" value="<?php echo  $row['rate'];?>" data-size="s"></button>
                                <div class="div_rate"><input class="input_rate" name="input_rate" type="number" data-min="0" data-max="5" value=""></div>
                            </div>
                        </div>
                        <div align="center" class="atc">
                            <a  href="<?php echo base_url()?>user/Product_filter/addToCart/<?php echo  $row['id'];?>" class="btn btn-success">
                                Add to Cart</a>
                        </div>
                    </div>

                </div>

               <?php } ?>
            </div>
        </div>
    </div>

</div>
<script>
        function reload() {
            window.location.assign('<?php echo base_url()?>user/Product_filter');//load page again
        }

</script>


</body>

</html>
