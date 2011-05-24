<?php use_helper ('Form','DateForm','Object') ?>
							
<?php echo form_tag('Pharma/edit') ?>
<?php echo input_hidden_tag('id', $pharma->getId()) ?>

<div id="main_content">
	<div class="box_content">
	<div class="box_title">
	<h2><span class="dark_blue">Edit Medicine Description</span></h2>
	</div>
	<div class="box_text_content">
	<div class="box_text">

<table width="100%" cellpadding="0" cellspacing="0"  align="left" border="0">

  <tr>
    <td width="16%" height="30">Medicine Name:<span class="error"> *</span> </td>
    <td width="84%" height="30"><?php echo input_tag ('name', $pharma->getName(),'size=38'); ?>
	<script type="text/javascript">
	var name = new LiveValidation('name', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	name.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script>
	</td>
  </tr>
  
  <tr>
    <td width="16%" height="30">Strength (mg):</td>
    <td width="84%" height="30"><?php echo input_tag ('strength', $pharma->getStrength(),'size=38'); ?>
	</td>
  </tr>
  
  <tr>
    <td width="16%" height="30">Company:</td>
    <td width="84%" height="30"><?php echo input_tag ('company', $pharma->getCompany(),'size=38'); ?>
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