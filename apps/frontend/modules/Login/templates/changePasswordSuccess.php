<span class="heading">Change Password</<br /><br />
<br />



<?php use_helper ('Form') ?>

<?php echo form_tag('Login/changePassword') ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="form">

                <tr>
                  <td height="7" colspan="2"></td>
                </tr>
                <tr>
                  <td colspan="2" valign="top">&nbsp;</td>
  </tr>
               
				<tr>
                  <td width="15%" height="27" valign="top" style="padding-left: 10px; line-height: 18px;">Old Password:<span class="error">*</span></td>
                  <td width="85%" valign="top" style="padding-left: 10px; line-height: 18px;"><?php echo input_password_tag ('old_password','','size=25'); ?>
				  <script type="text/javascript">
	var old_password = new LiveValidation('old_password', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	old_password.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	old_password.add( Validate.Length, { minimum: <?php echo Constant::PASSWORD_MIMIMUM_LENGTH; ?>, tooShortMessage : "<?php echo Constant::PASSWORD_MINIMUM_LENGTH_ERROR; ?>" } );
	</script></td>
                </tr>   
				<tr>
                  <td height="27" valign="top" style="padding-left: 10px; line-height: 18px;">New Password:<span class="error">*</span></td>
                  <td valign="top" style="padding-left: 10px; line-height: 18px;"><?php echo input_password_tag ('new_password','','size=25'); ?>
				  <script type="text/javascript">
	var new_password = new LiveValidation('new_password', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	new_password.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	new_password.add( Validate.Length, { minimum: <?php echo Constant::PASSWORD_MIMIMUM_LENGTH; ?>, tooShortMessage : "<?php echo Constant::PASSWORD_MINIMUM_LENGTH_ERROR; ?>" } );
	</script></td>
                </tr>   
                <tr>
                  <td height="27" valign="top" style="padding-left: 10px; line-height: 18px;">Confirm Password:<span class="error">*</span></td>
                  <td valign="top" style="padding-left: 10px; line-height: 18px;"><?php echo input_password_tag ('confirm_password','','size=25'); ?>
				  <script type="text/javascript">
	var confirm_password = new LiveValidation('confirm_password', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	confirm_password.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	confirm_password.add( Validate.Confirmation, { match: 'new_password', failureMessage: "<?php echo Constant::PASSWORD_MATCH_ERROR; ?>" } );
	confirm_password.add( Validate.Length, { minimum: <?php echo Constant::PASSWORD_MIMIMUM_LENGTH; ?>, tooShortMessage : "<?php echo Constant::PASSWORD_MINIMUM_LENGTH_ERROR; ?>" } );</script>
					</td>
                </tr>                               
                
				<tr>
		<td>&nbsp;</td>
		<td colspan="2">
		<table width="100%" align="left" border="0" class="form">
			<tr>
				<td width="2%"><?php echo submit_tag(' ', array('class' => 'btn_update', 'style'=>'border:none')); ?> </td>
				<td width="98%"><?php echo link_to(' ', (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'Home/index', array('class' => 'btn_cancel'));
 ?></td>
			</tr>
    	</table>
		</td>
  </tr>
                
				
</table>



                           