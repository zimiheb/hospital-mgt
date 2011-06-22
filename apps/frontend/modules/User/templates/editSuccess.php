<?php use_helper ('Form','DateForm','Object') ?>
							
<?php echo form_tag('User/edit') ?>
<?php echo input_hidden_tag('id', $user->getId()) ?>


<div id="main_content">
	<div class="box_content">
	<div class="box_title">
	<h2><span class="dark_blue">Edit Credentials Information</span></h2>
	</div>
	<div class="box_text_content">
	<div class="box_text">

<table width="100%" cellpadding="0" cellspacing="0"  align="left" border="0">

<tr>
	<td width="12%">&nbsp;</td>
	<td width="36%">&nbsp; </td>
</tr>

<tr height="40">
			<td width="12%">Staff Member:</td>
			<td width="36%"><?php echo object_select_tag('', '', array ( 'name'=>'employee_id', 'id'=>'employee_id', 'related_class' => 'Employee' , 'peer_method' => 'GetEmployee')); ?>	</td>
			
			<td width="9%">Role:</td>
			<td width="43%"><?php echo object_select_tag('', '', array ( 'title'=>'role_id', 'id'=>'role_id', 'related_class' => 'Role' , 'peer_method' => 'GetRole')); ?>	</td>
		</tr>
		
		<tr height="40">
			<td>User Name:</td>
			<td><?php echo input_tag('user',$user->getUser(),'60'); ?>
	<script type="text/javascript">
	var user = new LiveValidation('user', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	user.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script></td>
			
			<td>Password:</td>
			<td><?php echo input_tag('password',$user->getPassword(),'60'); ?>
	<script type="text/javascript">
	var password = new LiveValidation('password', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	password.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script></td>
		</tr>

		
  <tr>
		<td>&nbsp;</td>
		<td colspan="2">
		<table width="100%" align="left" border="0">
			<tr>
				<td width="2%"><?php echo submit_tag('', array('class'=>'btn_update', 'style'=>'border:none')); ?> </td>
				<td width="98%"><?php echo link_to(' ', (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'Home/index', array('class' => 'btn_cancel'));
 ?></td>
			</tr>
    	</table>
		</td>
  </tr>
</table>
</div>
	
	</div>
	
	</div>

<div class="clear"></div>    
</div>