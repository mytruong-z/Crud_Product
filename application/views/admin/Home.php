
<head>
    <link href="<?php echo base_url(); ?>assets4/css/style.css" rel='stylesheet' type='text/css' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<style>
    #hide{
        display: none;
    }
    .table{
        margin-top: 50px;
        text-align: center;

    }
    .total{
        float: right;
    }
    .bold{
        font-weight: bold;
    }
    .Successs{
        background-color: #0eea2b;
    }
</style>
<div id="wrapper">
    <div id="page-wrapper">
    <h2>Total Revenue</h2>
    <table class="table table-hover">
            <tr class="Successs">
                <td class="bold" id="hide">Id</td>
                <td class="bold">Product_id</td>
                <td class="bold">Product</td>
                <td class="bold">Quantity</td>
                <td class="bold">Sub_total</td>
            </tr>
            <?php foreach ($revenue as $value) {?>
                <tr>
                    <td id="hide"><?php echo $value["product_id"];?></td>
                    <td><?php echo $value["product_id"];?></td>
                    <td><?php echo$value["name"];?></td>
                    <td><?php echo $value["quantity"];?></td>
                    <td><?php echo $value["sub_total"];?></td>
                </tr>
            <?php } ?>
    </table>

        <div class="total col-sm-11"><p class="total"><strong>Total :</strong><?php echo $total;?>USD</p></div>
</div>

