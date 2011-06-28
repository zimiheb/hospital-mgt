<?php use_helper ('Form') ?>

<?php echo form_tag('Login/index') ?>


<table width="771" align="center" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td height="30">&nbsp;</td>
</tr>
<tr>
  <td height="20"><span class="heading">Login</span></td>
</tr>
<tr>
  <td height="10"></td>
</tr>
<tr>
<td valign="top" class="login_section">

  <table width="95%" cellpadding="0" cellspacing="0"  align="center" border="0" class="form">



<tr>
  <td >&nbsp;</td>
  <td width="45%" rowspan="10" align="left"><table width="320" border="0" align="right" cellpadding="0" cellspacing="0">
    <tr>
      <td width="23" valign="top" style="padding-top: 4px;"><?php echo image_tag('arrow.gif','border="0"');?></td>
      <td width="277">Please enter your Username and Password to continue.<br />
        <br /></td>
      </tr>
    <tr>
       <td width="23" valign="top" style="padding-top: 4px;"><?php echo image_tag('arrow.gif','border="0"');?></td>
      <td>If you do not have the credentials, please contact <a href="mailto:admin@hmis.com">System Administrator</a> for Username and Password.<br />
        <br /></td>
      </tr>
    <tr>
       <td width="23" valign="top" style="padding-top: 4px;"><?php //echo image_tag('arrow.gif','border="0"');?></td>
      <td><!--For Questions/Comments? Send mail to <a href="#">admin_itp@gmail.com</a><br /><br />--></td>
      </tr>
  </table></td>
</tr>
<tr>
	<td width="55%" >Username<span class="error">*</span></td>
	</tr>

<tr>
	<td><?php echo input_tag ('username','',array('style'=>'width:190px')); ?>
	<script type="text/javascript">
	var username = new LiveValidation('username', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS;?>", wait:1500});
	username.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD;?>"});
	//email.add( Validate.Email,{ failureMessage: "<?php echo Constant::VALIDATION_EMAIL_FIELD; ?>"});
	</script>
	</td>
  </tr>
<tr>
  <td height="10"></td>
  </tr>
<tr>
	<td>Password<span class="error">*</span></td>
	</tr>

<tr>
	<td><?php echo input_password_tag ('password','',array('style'=>'width:190px')); ?>
	<script type="text/javascript">
	var password = new LiveValidation('password', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS;?>", wait:1500});
	password.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD;?>"});
	</script>
	</td>
	</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><?php echo submit_tag(' ', array('class' => 'btn_login', 'style'=>'border:none'));?></td>
  </tr>
<tr>
  <td>&nbsp;</td>
  </tr>
<tr>
  <td>&nbsp;</td>
  </tr>
</table></td>
</tr>
<tr>
  <td height="40" valign="top">&nbsp;</td>
</tr>
</table>
