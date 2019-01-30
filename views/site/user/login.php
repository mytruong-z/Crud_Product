
<div class="box-center"><!-- The box-center product-->
             <div><h2>Thành viên đăng nhập</h2>
		      </div>
		      <div class="box-content-center product"><!-- The box-content-center -->
		            <form class="t-form form_action" method="post" action="<?php echo site_url('user/login')?>" enctype="multipart/form-data">
                          <h3 style="color:red"><?php echo form_error('login')?></h3>
                          <div class="form-row">
        						<label for="param_email" class="form-label">Email:<span class="req">*</span></label>
        						<div class="form-item">
        							<input type="text" class="input" id="email" name="email" value="<?php echo set_value('email')?>">
        							<div class="clear"></div>
        							<div class="error" id="email_error"><?php echo form_error('email')?></div>
        						</div>
        						<div class="clear"></div>
        				  </div>
        				  
        				  <div class="form-row">
        						<label for="param_password" class="form-label">Mật khẩu:<span class="req">*</span></label>
        						<div class="form-item">
        							<input type="password" class="input" id="password" name="password">
        							<div class="clear"></div>
        							<div class="error" id="password_error"><?php echo form_error('password')?></div>
        						</div>
        						<div class="clear"></div>
        				  </div>
        				  
        				  <div class="form-row">
        						<label class="form-label">&nbsp;</label>
        						<div class="form-item">
        				           	<input type="submit" class="button" value="Đăng nhập" name="submit">
        						</div>
        				   </div>
                    </form>
		            <div class="clear"></div>
		      </div><!-- End box-content-center -->
		   
</div>
