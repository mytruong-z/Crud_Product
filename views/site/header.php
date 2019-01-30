<!-- The box-header-->			        
<link rel="stylesheet" href="<?php echo public_url()?>/js/jquery/autocomplete/css/smoothness/jquery-ui-1.8.16.custom.css" type="text/css">	
<script src="<?php echo public_url()?>/js/jquery/autocomplete/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
    $( "#text-search" ).autocomplete({
        source: "<?php echo site_url('product/search/1')?>",
    });
});
</script>


<div class="top">
      <!-- The top -->
      <div id="logo"><!-- the logo -->
           <a title="Học lập trình website với PHP và MYSQL" href="<?php echo base_url()?>">
	           <img alt="Học lập trình website với PHP và MYSQL" src="<?php echo public_url()?>/site/images/logo.png" style="width:250px">
	       </a>
       </div>
       <!-- End logo -->
       
       <!--  load gio hàng -->
      <div class="cart" id="cart_expand"> 
            <a class="cart_link" href="<?php echo base_url('cart')?>">
               Giỏ hàng <span id="in_cart"><?php echo $total_items?></span> sản phẩm
            </a> 
            <img src="<?php echo public_url()?>/site/images/cart.png" alt="cart bnc"> 
</div>       
       <div id="search"><!-- the search -->
			<form action="<?php echo site_url('product/search')?>" method="get">
			     <input type="text" aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" class="ui-autocomplete-input" placeholder="Tìm kiếm sản phẩm..." value="<?php echo isset($key) ? $key : ''?>" name="key-search" id="text-search">
				 <input type="submit" value="" name="but" id="but">
			</form>
       </div><!-- End search -->
       
              
    <div class="clear"></div><!-- clear float --> 
</div><!-- End top -->			   <!-- End box-header  -->
               
               <!-- The box-header-->
			        <div id="menu"><!-- the menu -->
           <ul class="menu_top">
                <li class="active index-li"><a href="<?php echo base_url()?>">Trang chủ </a></li>
                <li class=""><a href="info/view/1.html">Giới thiệu</a></li>
                <li class=""><a href="info/view/2.html">Hướng dẫn</a></li>
                <li class=""><a href="san-pham.html">Sản phẩm</a></li>
                <li class=""><a href="tin-tuc.html">Tin tức</a></li>
                <li class=""><a href="video.html">Video</a></li>
                <li class=""><a href="lien-he.html">Liên hệ</a></li>
                <?php if(isset($user_info)):?>
                <li class=""><a href="<?php echo site_url('user')?>">Xin chào: <?php echo $user_info->name?></a></li>
                <li class=""><a href="<?php echo site_url('user/logout')?>">Thoát</a></li>
                <?php else:?>
                <li class=""><a href="<?php echo site_url('user/register')?>">Đăng ký</a></li>
                <li class=""><a href="<?php echo site_url('user/login')?>">Đăng nhập</a></li>
                <?php endif;?>
                
          </ul>
</div><!-- End menu -->
               <!-- End box-header  -->
		       
	