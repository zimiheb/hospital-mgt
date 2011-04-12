<?php use_helper ('Form','DateForm','Object') ?>
							
<?php echo form_tag('Designation/edit') ?>
<?php echo input_hidden_tag('id', $designation->getId()) ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td colspan="2" nowrap="nowrap">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="school_hdng">
					<tr>
					<td><h2>Edit Designation Information</h2></td>
					<td align="right"><h3>&nbsp;</h3></td>
					</tr>
					
				</table>
			</td>
		</tr>
		<tr>
			<td width="461" nowrap="nowrap" class="heading"></td>
			<td width="464"  align="right"></td>
		</tr>
		<tr>
			<td height="20" colspan="2">&nbsp;</td>
		</tr>
	</tbody>
</table>

<table width="100%" align="left" cellpadding="0" cellspacing="0"  border="0" class="form">

<tr>
	<td width="13%">&nbsp;</td>
	<td width="87%">&nbsp; </td>
</tr>
  
  <tr>
  	<td height="30">Department:</td>
	<td height="30"> <?php echo object_select_tag($designation, 'getDepartmentId', array ('related_class' => 'Department' , 'peer_method' => 'GetDepartment'), $designation->getDepartmentId());?> </td>
  </tr>
  
  <tr>
    <td height="30">Designation Title:<span class="error"> *</span></td>
    <td height="30"><?php echo input_tag ('title', $designation->getTitle(),'size=38'); ?>
	<script type="text/javascript">
	var title = new LiveValidation('title', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	title.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script>
	</td>
  </tr>

 <!-- <tr>
    <td valign="top">Description: </td>
    <td><?php //echo textarea_tag('description', $designation->getDescription(), 'size=40x6') ?></td>
  </tr>
  <tr>
    <td height="30">Status:</td>
    <td height="30"><?php //echo select_tag ('status',options_for_select(Constant::GetRecordStatusArray(), $designation->getStatus())); ?></td>
  </tr>-->
  
  
  <tr>
		<td>&nbsp;</td>
		<td colspan="2">
		<table width="100%" align="left" border="0" class="form">
			<tr>
				<td width="2%"><?php echo submit_tag('', array('class'=>'btn_update', 'style'=>'border:none')); ?> </td>
				<td width="98%"><?php echo link_to(' ', (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'Home/index', array('class' => 'btn_cancel'));
 ?></td>
			</tr>
    	</table>
		</td>
  </tr>
</table>
