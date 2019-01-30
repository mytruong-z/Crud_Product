<html>
    <head>
         <?php $this->load->view('admin/head');?>
    </head>
    
    <body class="nobg loginPage" style="min-height:100%;">
         <div style="top:45%;" class="loginWrapper">
        	    <div style="height:auto; margin:auto;" id="admin_login" class="widget">
        	        <div class="title"><img class="titleIcon" alt="" src="<?php echo public_url('admin') ?>/images/icons/dark/laptop.png">
        	        	<h6>Đăng nhập</h6>
        	        </div>
        	        
        	        <form method="post" action="" id="form" class="form">
        	           <fieldset>
        	                
        	                <div class="formRow">
        	                    <label for="param_username">Tên đăng nhập:</label>
        	                    <div class="loginInput"><input type="text" id="param_username" name="username"></div>
        	                    <div class="clear"></div>
        	                </div>
        	                
        	                <div class="formRow">
        	                    <label for="param_password">Mật khẩu:</label>
        	                    <div class="loginInput"><input type="password" id="param_password" name="password"></div>
        	                    <div class="clear"></div>
        	                </div>
        	                
        	                <div class="loginControl">
        	                    <div style="color:red;font-weight:blod;text-align:center"><?php echo form_error('login');?></div>
        	                    <input type="hidden" value="1" name="submit">
        	                    <input type="submit" class="dredB logMeIn" value="Đăng nhập">
        	                    <div class="clear"></div>
        	                </div>
        	            </fieldset>
        	        </form>
        	    </div>
	    </div>
	 
	 <?php $this->load->view('admin/footer')?>
    </body>
</html>
