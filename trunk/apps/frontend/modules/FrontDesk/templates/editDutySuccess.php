<?php use_helper ('Form','DateForm','Object') ?>
							
<?php echo form_tag('Designation/edit') ?>
<?php echo input_hidden_tag('id', $duty->getId()) ?>


<div id="main_content">
	<div class="box_content">
	<div class="box_title">
	<h2><span class="dark_blue">Edit Designation Information</span></h2>
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
			<td width="36%"><?php echo object_select_tag($duty, 'getEmployeeId', array ( 'related_class' => 'Employee' , 'peer_method' => 'GetEmployee'), $duty->getEmployeeRelatedByEmployeeId()); ?>			</td>
			
			<td width="9%">Duty Date:</td>
			<td width="43%"><?php echo input_date_tag('duty_date',$duty->getDutyDate(),'rich=true, size=20'); ?></td>
		</tr>
		
		<tr height="40">
			<td>From (Time):</td>
			<td><?php echo input_tag('from',$duty->getFrom(),'60'); ?>
			<script type="text/javascript">
	var from = new LiveValidation('from', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	from.add( Validate.Presence,{failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	from.add( Validate.Numericality,{ onlyInteger: true});
	</script></td>
			
			<td>To (Time):</td>
			<td><?php echo input_tag('to',$duty->getTo(),'60'); ?>
			<script type="text/javascript">
	var to = new LiveValidation('to', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	to.add( Validate.Presence,{failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	to.add( Validate.Numericality,{ onlyInteger: true});
	</script></td>
		</tr>

		<tr height="40">
			<td width="12%">Substitute Staff:</td>
			<td width="36%"><?php echo object_select_tag($duty, 'getSubstituteId', array ('related_class' => 'Employee' , 'peer_method' => 'GetEmployee'), $duty->getEmployeeRelatedBySubstituteId()); ?>			</td>
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