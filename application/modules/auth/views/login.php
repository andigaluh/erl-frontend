<div class="row login-container column-seperation">
<div class="login-head">  
  <div class="col-md-5 col-md-offset-1">
    <h2 class="login-head">
      <?php echo lang('login_user_heading');?><br/>
      <?php echo lang('company_name');?>
    </h2>
    <p>
      <strong><?php echo anchor('auth/register_user', lang('register_here'))?></strong>&nbsp;
      <?php echo lang('register_opening_description')?>
    </p>
  </div>
  <div class="col-md-5">
      <div <?php ( ! empty($message)) && print('class="alert alert-info"'); ?> id="infoMessage"><?php echo $message;?></div>
      <?php echo form_open("auth/login",array("id"=>"login-form","class"=>"login-form"));?>  
        <div class="row">
          <div class="form-group col-md-12">
          <?php echo lang('login_identity_label', 'identity');?>
          <div class="controls">
            <div class="input-with-icon right">                                       
                <i class=""></i>
                <?php echo bs_form_input($identity);?>                            
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <?php echo lang('login_password_label', 'password');?>
          <span class="help"></span>
          <div class="controls">
            <div class="input-with-icon right">                                       
                <i class=""></i>
                <?php echo bs_form_input($password);?>                              
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-10">
          <?php echo bs_form_submit('submit', lang('login_submit_btn'));?>
        </div>
      </div>
      <?php echo form_close();?>
      <!-- <p><strong><a href="auth/forgot_password" rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/ion_auth_dialog/forgot_password'); ?>"><?php echo lang('login_forgot_password');?></a></strong></p> -->
  </div>
 </div>
</div>