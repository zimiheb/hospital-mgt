<?php use_helper ('Form','DateForm','Object') ?>
<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php echo form_tag('Employee/giveCredential') ?>
<?php echo input_hidden_tag('employee_id', $employee->getId()); ?>
<div id="main_content">
	<div class="box_content">
	<div class="box_title">	<h2><span class="dark_blue">Give Credentials to Employee: </span><?php echo $employee->getName() ;?></h2></div>
	<div class="box_text_content">
	<div class="box_text">


<table width="100%" cellpadding="0" cellspacing="0"  align="left" border="0" class="form">
<tr>
	<th colspan="4">System Login Information</th>
</tr>

<tr>
	<td height="15" colspan="2">&nbsp;</td>
</tr>

<tr height="30">
	<td width="13%">Username:<span class="error"> *</span></td>
	<td width="87%" colspan="2"> <?php echo input_tag('user_name','','size=35'); ?>
	<script type="text/javascript">
	var user_name = new LiveValidation('user_name', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS;?>", wait:500});
	user_name.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD;?>"});
	user_name.add( Validate.Format, { pattern: /^[a-zA-Z\d\_\.]*$/,failureMessage: "<?php echo 'Characters, Digits, Hyphens and Dots are valid' ?>"} );
	</script>	</td>
</tr>


<tr height="30">
	<td>Password:<span class="error"> *</span></td>
	<td colspan="3"> <?php echo input_password_tag('password','','size=35'); ?>
	<script type="text/javascript">
	var password = new LiveValidation('password', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>", wait: 500});
	password.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	password.add( Validate.Length, { minimum: <?php echo Constant::PASSWORD_MIMIMUM_LENGTH; ?>, tooShortMessage : "<?php echo Constant::PASSWORD_MINIMUM_LENGTH_ERROR; ?>" } );
	</script>	</td>
</tr>

<tr height="30">
	<td>System Role:<span class="error"> *</span></td>
	<td colspan="3"> <?php echo object_select_tag('', '', array ( 'name'=>'role_id', 'id'=>'role_id', 'related_class' => 'Role' , 'peer_method' => 'GetRole')); ?></td>
</tr>

<tr>
	<td height="50" colspan="2"><span class="error">* Username once entered, cannot be changed afterwards.</span><br />
								<span class="error">* Only use Chatacher, Digits, Underscore and Dots for valid Username.</span></td>
</tr>

<tr>
	<td>&nbsp;</td>
    <td colspan="3"><table width="100%"  align="left" border="0" class="form">
      <tr>
        <td width="4%"><?php echo submit_tag(' ', array('class'=>'btn_register', 'style'=>'border:none')); ?> </td>
        <td width="96%"><?php echo link_to(' ', (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'Home/index', array('class' => 'btn_cancel'));
 ?></td>
      </tr>
    </table></td>
  </tr>
</table>
	</div>
	</div>
	</div>
	<div class="clear"></div>    
</div>