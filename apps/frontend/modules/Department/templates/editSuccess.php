<?php use_helper ('Form','DateForm','Object') ?>
							
<?php echo form_tag('Department/edit') ?>
<?php echo input_hidden_tag('id', $department->getId()) ?>

<div id="main_content">
	<div class="box_content">
	<div class="box_title">
	<h2><span class="dark_blue">Edit Department Information</span></h2>
	</div>
	<div class="box_text_content">
	<div class="box_text">

<table width="100%" cellpadding="0" cellspacing="0"  align="left" border="0">

  <tr>
    <td width="16%" height="30">Department Name:<span class="error"> *</span> </td>
    <td width="84%" height="30"><?php echo input_tag ('title', $department->getTitle(),'size=38'); ?>
	<script type="text/javascript">
	var title = new LiveValidation('title', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	title.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script>
	</td>
  </tr>
 
 
 <tr>
		<td>&nbsp;</td>
		<td colspan="2">
		<table width="100%" align="left" border="0">
			<tr>
				<td width="2%"><?php echo submit_tag(' ', array('class'=>'btn_update', 'style'=>'border:none')); ?> </td>
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