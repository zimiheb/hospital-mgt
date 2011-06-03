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
		<h2><span class="dark_blue">Duty Roster List for </span> <?php echo date('d M, Y'); ?></h2>
		<span style="float:right"><?php echo image_tag('icon_addRight.jpg', 'width="2"', 'height="22"')?></span>
			<a class="addNew" id="popup_link_add" href="#">Assign New Duty</a>
		</h2>
	</div>
	<div class="box_text_content">
	<div class="box_text">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="datagrid">
	  <tr>
		<th style="text-align:left;">Employee Name</th>
		<th style="text-align:left;">Duty Place</th>
		<th style="text-align:center;">From (Time 2400 hrs)</th>
		<th style="text-align:center;">To (Time 2400 hrs)</th>
		<th style="text-align:left;">Substitute</th>
		<th style="text-align:left;">Operation</th>
	  </tr>
	  
	 <!-- Populating the List -->
		
	  <?php 
	  
	  if (count($dutys)): ?>
		<?php 
		
		foreach ($dutys as $j => $duty) : ?>
		
		<tr>
		<td align="left"><?php echo $duty->getEmployeeRelatedByEmployeeId(); ?> </td>
		<td align="left"><?php echo $duty->getDutyPlace(); ?></td>
		<td style="text-align:center;"><?php echo $duty->getFrom(); ?></td>
		<td style="text-align:center;"><?php echo $duty->getTo(); ?></td>
		<td align="left"><?php echo $duty->getEmployeeRelatedBySubstituteId(); ?></td>
		<td align="right" class="edit">
		<?php echo link_to('&nbsp;','FrontDesk/editDuty?id='.Utility::EncryptQueryString($duty->getId()),array('title'=>'Edit', 'class' => 'edit'))?>
		<?php echo link_to('&nbsp;','FrontDesk/deleteDuty?id='.Utility::EncryptQueryString($duty->getId()), array('confirm'=>'Are you sure you want to Delete this?', 'title'=>'Delete', 'class' => 'delete')); ?>
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
<?php echo form_tag('FrontDesk/addDuty') ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td style="padding-left:10px" height="30"><span class="heading">Assign Duty to Staff</span></td>
    <td align="right" style="padding-right:10px"><a class="popup_closebox" href="#"><?php echo image_tag('btn_x.gif', 'border=0'); ?></a></td>
  </tr>
</table>

<table width="100%" align="left"  border="0"  cellpadding="0" cellspacing="0"  bgcolor="#eeeeee">
  
  <tr>
  	<td align="left" height="30" style="padding-left:10px; padding-top:10px">Staff Member:</td>
	<td height="30" style="padding-left:10px;"> <?php echo object_select_tag('', '', array ( 'name'=>'employee_id', 'id'=>'employee_id', 'related_class' => 'Employee' , 'peer_method' => 'GetEmployee')); ?></td>
</tr>
  
  <tr>
    <td width="148" height="30" style="padding-left:10px;">Duty Place:</td>
	<td width="452" height="30" style="padding-left:10px;"><?php echo object_select_tag('', '', array ( 'name'=>'duty_place_id', 'id'=>'duty_place_id', 'related_class' => 'DutyPlace' , 'peer_method' => 'GetDutyPlace')); ?></td>
  </tr>
  
  <tr>
    <td width="148" height="30" style="padding-left:10px;">Duty Date</td>
	<td width="452" height="30" style="padding-left:10px;"><?php echo input_date_tag('duty_date',date('Y-m-d'),'rich=true, size=20'); ?></td>
  </tr>

  <tr>
    <td width="148" height="30" style="padding-left:10px;">From (Time 2400 hrs):<span class="error"> *</span></td>
	<td width="452" height="30" style="padding-left:10px;"> <?php echo input_tag('from','','size=38') ?></td>
	<script type="text/javascript">
	var from = new LiveValidation('from', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	from.add( Validate.Presence,{failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	from.add( Validate.Numericality,{ onlyInteger: true});
	</script>
  </tr>

  <tr>
    <td width="148" height="30" style="padding-left:10px;">To (Time 2400 hrs):<span class="error"> *</span></td>
	<td width="452" height="30" style="padding-left:10px;"> <?php echo input_tag('to','','size=38') ?></td>
	<script type="text/javascript">
	var to = new LiveValidation('to', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	to.add( Validate.Presence,{failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	to.add( Validate.Numericality,{ onlyInteger: true});
	</script>
  </tr>
  
    <tr>
  	<td align="left" height="30" style="padding-left:10px;">Substitute Staff:</td>
	<td height="30" style="padding-left:10px;"> <?php echo object_select_tag('', '', array ( 'name'=>'substitute_id', 'id'=>'substitute_id', 'related_class' => 'Employee' , 'peer_method' => 'GetEmployee')); ?></td>
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