<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php use_helper ('Form','Javascript','Object') ?>

<?php use_javascript('prototype.js') ?>		
<?php use_javascript('effects.js') ?>		
<?php use_javascript('dragdrop.js') ?>		
<?php use_javascript('popup.js') ?>		
<link href="<?php echo _compute_public_path('popup', 'css', 'css', false);  ?>" rel="stylesheet" type="text/css" />	
<div id="main_content">
	<div class="box_content">
	<div class="box_title">
		<h2><span class="dark_blue">Credentials Information</span> </h2>
		<span style="float:right"><?php echo image_tag('icon_addRight.jpg', 'width="2"', 'height="22"')?></span>
			<a class="addNew" id="popup_link_add" href="#">Assign New Credentials</a>
		</h2>
	</div>
	<div class="box_text_content">
	<div class="box_text">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="datagrid">
	  <tr>
		<th width="32%" style="text-align:left;">Employee Name</th>
		<th width="26%" style="text-align:left;">Username</th>
		<th width="24%" style="text-align:left;">System Role</th>
		<th width="18%" style="text-align:left;">Operation</th>
	  </tr>
	  
	 <!-- Populating the List -->
		
	  <?php 
	  
	if (count($users)): ?>
		<?php 
		
		foreach ($users as $j => $user) : ?>
		
		<tr>
		<td align="left"><?php echo $user->getEmployee(); ?> </td>
		<td align="left"><?php echo $user->getUser(); ?></td>
		<td align="left"><?php echo $user->getRole(); ?></td>
		<td align="left" class="edit">
		<?php echo link_to('&nbsp;','User/edit?id='.Utility::EncryptQueryString($user->getId()),array('title'=>'Edit', 'class' => 'edit'))?>
		<?php echo link_to('&nbsp;','User/deleteUser?id='.Utility::EncryptQueryString($user->getId()), array('confirm'=>'Are you sure you want to Delete this?', 'title'=>'Delete', 'class' => 'delete')); ?>
		</td> 
	  </tr>
	  
	   <?php endforeach; ?>
	  <tr>
		<td class="last">&nbsp;</td>
	  </tr>
	   <?php else:?>
	  
			<tr>
			<td colspan="6" style="background:none; text-align:center;"><?php echo Constant::RECORD_NOT_FOUND; ?></td>
			</tr>
			
	  <?php endif; ?>
	</table>
		
				</div>
	</div>
	
	</div>

<div class="clear"></div>    
</div>

<div id="popup_add" class="popup" style="width:600px" >

<?php echo form_tag('User/addUser') ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td style="padding-left:10px" height="30"><span class="heading">Assign Credentials</span></td>
    <td align="right" style="padding-right:10px"><a class="popup_closebox" href="#"><?php echo image_tag('btn_x.gif', 'border=0'); ?></a></td>
  </tr>
</table>

<table width="100%" align="left"  border="0"  cellpadding="0" cellspacing="0"  bgcolor="#eeeeee">
  
  <tr>
  	<td align="left" height="30" style="padding-left:10px; padding-top:10px">Employee Member:</td>
	<td height="30" style="padding-left:10px;"> <?php echo object_select_tag('', '', array ( 'name'=>'employee_id', 'id'=>'employee_id', 'related_class' => 'Employee' , 'peer_method' => 'GetEmployee')); ?></td>
</tr>
  
  <tr>
    <td width="148" height="30" style="padding-left:10px;">System Role:</td>
	<td width="452" height="30" style="padding-left:10px;"><?php echo object_select_tag('', '', array ( 'name'=>'role_id', 'id'=>'role_id', 'related_class' => 'Role' , 'peer_method' => 'GetRole')); ?></td>
  </tr>
  
  <tr>
  
	<td width="452" height="30" style="padding-left:10px;">User Name:<span class="error"> *</span></td>
	<td width="445" align="left" height="30" style="padding-left:10px; padding-top:10px"> <?php echo input_tag('user','',array('style'=>'width:200px')) ?></td>
	<script type="text/javascript">
	var user = new LiveValidation('user', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	user.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script>
  </tr>

  <tr>
   
	<td width="452" height="30" style="padding-left:10px;"> Password:<span class="error"> *</span></td>
	<td width="445" align="left" height="30" style="padding-left:10px; padding-top:10px"> <?php echo input_password_tag('password','',array('style'=>'width:200px')) ?></td>
	<script type="text/javascript">
	var password = new LiveValidation('password', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	password.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script>
  </tr>
  
 

 
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
		<td>&nbsp;</td>
		<td colspan="2">
		<table width="100%" align="left"  border="0">
			<tr>
				<td width="2%"><?php echo submit_tag('', array('class'=>'btn_add', 'style'=>'border:none'))

; ?> </td> 
				<td width="98%"><a class="popup_closebox" href="#"><?php echo image_tag('btn_cancel.gif', 'border=0') ;?></a></td>
			</tr> 
    	</table>
		</td> 
  </tr>
</table>
</div>


<script type="text/javascript">
    //<![CDATA[
    new Popup('popup_add','popup_link_add',{modal:true,duration:1})
    //]]>
  </script>