<?php use_helper ('Form','DateForm','Object') ?>
							
<?php echo form_tag('LabReport/add') ?>
<?php echo input_hidden_tag('report_id', $report->getId()) ?>


<div id="main_content">
	<div class="box_content">
	<div class="box_title">
	<h2><span class="dark_blue">Make Lab Report</span></h2>
	</div>
	<div class="box_text_content">
	<div class="box_text">

<table width="100%" cellpadding="0" cellspacing="0"  align="left" border="0" class="form">


<tr height="40">
	<td width="11%"><strong>Lab Test</strong>:</td>
	<td width="34%"><?php echo $report->getLabTest(); ?></td>
	
	<td width="15%"><strong>Patient Name</strong>:</td>
	<td width="40%"><?php echo $report->getPatient(); ?>	</td>
</tr>			

<tr height="40">
	<td valign="top">Test Results:</td>
	<td valign="top" colspan="3"><?php echo textarea_tag('description','','size=60x5'); ?>
	<script type="text/javascript">
	var description = new LiveValidation('description', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	description.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script></td>
</tr>

		
  <tr>
		<td>&nbsp;</td>
		<td colspan="2">
		<table width="100%" align="left" border="0">
			<tr>
				<td width="2%"><?php echo submit_tag('', array('class'=>'btn_add', 'style'=>'border:none')); ?> </td>
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