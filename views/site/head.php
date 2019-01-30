
        <meta content="text/html ;charset=utf-8" http-equiv="Content-Type">
        <!-- the CSS -->
        <link rel="stylesheet" href="<?php echo public_url()?>/site/css/reset.css" type="text/css">
        <link rel="stylesheet" href="<?php echo public_url()?>/site/css/style.css" type="text/css">
        <link rel="stylesheet" href="<?php echo public_url()?>/site/css/menu.css" type="text/css">
        <link rel="stylesheet" href="<?php echo public_url()?>/site/css/input.css" type="text/css">
        <link rel="stylesheet" href="<?php echo public_url()?>/site/css/product.css" type="text/css">
        <link rel="stylesheet" href="<?php echo public_url()?>/site/css/slide-flim.css" type="text/css">
        <!-- End CSS -->
        
        <!-- the Javascript -->
      
        <script src="<?php echo public_url()?>/js/jquery/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo public_url()?>/js/jquery/jquery-ui.min.js" type="text/javascript"></script>
		<link type="text/css" href="<?php echo public_url()?>/js/jquery/jquery-ui/custom-theme/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	    
        <script src="<?php echo public_url()?>/site/js/script.js"></script>
        
        <!-- raty -->
		 <script src="<?php echo public_url()?>/site/raty/jquery.raty.min.js" type="text/javascript"></script>
		 <script type="text/javascript">
	      $(function() {
	         $.fn.raty.defaults.path = '<?php echo public_url()?>/site/raty/img';
	         $('.raty').raty({
	          	  score: function() {
	          	    return $(this).attr('data-score');
	          	  },
	              readOnly  : true,
	          });
	      });
	     </script>
	     <style>.raty img{width:16px !important;height:16px; !important;}</style>
	     <!--End raty -->
     
        <!-- End Javascript -->
        <script type="text/javascript">
	        $(document).ready(function(){
		        $('#back_to_top').click(function() {
		            $('html, body').animate({scrollTop:0},"slow");
		       });
		       // go top
		       $(window).scroll(function() {
		            if($(window).scrollTop() != 0) {
		                $('#back_to_top').fadeIn();
		            } else {
		                $('#back_to_top').fadeOut();
		            }
		       });
	        });
		</script>
		<style>
		#back_to_top {
		    bottom: 10px;
		    color: #666;
		    cursor: pointer;
		    padding: 5px;
		    position: fixed;
		    right: 55px;
		    text-align: center;
		    text-decoration: none;
		    width: auto;
		}
		</style>
		<title>Học lập trình website với PHP và MYSQL</title>  
		
		