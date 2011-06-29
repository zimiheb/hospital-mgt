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

<table width="100%" cellpadding="0" cellspacing="0"  align="left" border="0" class="form">

<tr>
	<td width="13%">&nbsp;</td>
	<td width="87%">&nbsp; </td>
</tr>

<tr height="40">
	<td>Staff Member:</td>
	<td><?php echo $user->getEmployee(); ?>	</td>
</tr>			
<tr>
	<td width="13%">System Role:</td>
	<td width="87%"><?php echo object_select_tag($user, 'getRoleId', array ( 'related_class' => 'Role' , 'peer_method' => 'GetRole')); ?>	</td>
</tr>
		
<tr height="40">
	<td>User Name:</td>
	<td><?php echo input_tag('user',$user->getUser(),'60'); ?>
	<script type="text/javascript">
	var user = new LiveValidation('user', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	user.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
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