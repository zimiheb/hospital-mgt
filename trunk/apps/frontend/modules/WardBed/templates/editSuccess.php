<?php use_helper ('Form','DateForm','Object') ?>
							
<?php echo form_tag('WardBed/edit') ?>
<?php echo input_hidden_tag('id', $bed->getId()) ?>


<div id="main_content">
	<div class="box_content">
	<div class="box_title">
	<h2><span class="dark_blue">Edit Bed Information</span></h2>
	</div>
	<div class="box_text_content">
	<div class="box_text">

<table width="100%" cellpadding="0" cellspacing="0"  align="left" border="0">

<tr>
	<td width="16%">&nbsp;</td>
	<td width="84%">&nbsp; </td>
</tr>
  
  <tr>
  	<td height="30">Department:</td>
	<td height="30"> <?php echo object_select_tag($bed, 'getWardId', array ('related_class' => 'Ward' , 'peer_method' => 'GetWard'), $bed->getWardId());?> </td>
  </tr>
  
  <tr>
    <td height="30">Bed No.:<span class="error"> *</span></td>
    <td height="30"><?php echo input_tag ('bed', $bed->getBed(),'size=38'); ?>
	<script type="text/javascript">
	var bed = new LiveValidation('bed', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	bed.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script>
	</td>
  </tr>

 <!-- <tr>
    <td valign="top">Description: </td>
    <td><?php //echo textarea_tag('description', $bed->getDescription(), 'size=40x6') ?></td>
  </tr>
  <tr>
    <td height="30">Status:</td>
    <td height="30"><?php //echo select_tag ('status',options_for_select(Constant::GetRecordStatusArray(), $bed->getStatus())); ?></td>
  </tr>-->
  
  
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