<style>table#cart_ccontents td{padding:10px;border:1px solid #ccc}</style>

<div class="box-center"><!-- The box-center product-->
     <div class="tittle-box-center">
        <h2>Thông tin giỏ hàng (Có <?php echo $total_items?> sản phẩm)</h2>
      </div>
      <div class="box-content-center product"><!-- The box-content-center -->
      <?php if($total_items > 0):?>
      <form action="<?php echo base_url('cart/update')?>" method="post">
            <table id="cart_ccontents">
               <thead>
                   <th>Sản phẩm</th>
                   <th>Giá bán</th>
                   <th>Số lượng</th>
                   <th>Tổng số</th>
                   <th>Xóa</th>
               </thead>
               <tbody>
                     <?php $total_amount = 0;?>
                    <?php foreach ($carts as $row):?>
                    <?php $total_amount = $total_amount + $row['subtotal'];?>
                      <tr>
                           <td>
                              <?php echo $row['name'];?>
                           </td>
                           <td>
                              <?php echo number_format($row['price']);?>đ
                           </td>
                           <td>
                              <input name="qty_<?php echo $row['id']?>" value="<?php echo $row['qty'];?>" size="5"/>
                           </td>
                           <td>
                              <?php echo number_format($row['subtotal']);?>đ
                           </td>
                           <td><a href="<?php echo base_url('cart/del/'.$row['id'])?>">Xóa</a></td>
                       </tr>
                    <?php endforeach;?>
                   
                    <tr>
                       <td colspan="5">
                       Tổng số tiền thanh toán: <b style="color:red"><?php echo number_format($total_amount)?>đ</b>
                       - <a href="<?php echo base_url('cart/del')?>">Xóa toàn bộ</a>
                       </td>
                    </tr>
                     <tr>
                       <td colspan="5">
                       <button type="submit">Cập nhât</button>
                       <a href="<?php echo site_url('order/checkout')?>" class="button">Mua hàng</a>
                       </td>
                    </tr>
               </tbody>
            </table>
           </form>
           <?php else:?>
           <h4>Không có sản phẩm nào trong giỏ hàng</h4>
           <?php endif;?>
      </div>
</div>