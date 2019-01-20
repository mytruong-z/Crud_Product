
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

