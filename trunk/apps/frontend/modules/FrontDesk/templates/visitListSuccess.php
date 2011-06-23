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
		<h2><span class="dark_blue">Patient Visit List for </span> <?php echo date('d M, Y'); ?></h2>
		<span style="float:right"><?php echo image_tag('icon_addRight.jpg', 'width="2"', 'height="22"')?></span>
			<a class="addNew" id="popup_link_add" href="#">Search Patient</a>
		</h2>
	</div>
	<div class="box_text_content">
	<div class="box_text">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="datagrid">
	  <tr>
		<th style="text-align:left;">Patient's Name</th>
		<th style="text-align:left;">OPD Doctor</th>
		<th style="text-align:left;">Visit Time</th>
		<th style="text-align:left;">Ward Doctor</th>
		<th style="text-align:left;">Status</th>
		<th style="text-align:left;">Operation</th>
	  </tr>
	  
	 <!-- Populating the List -->
		
	  <?php 
	  
	  if (count($visits)): ?>
		<?php 
		
		foreach ($visits as $j => $visit) : ?>
		
		<tr>
		<td align="left"><?php echo $visit->getPatient(); ?> </td>
		<td align="left"><?php echo $visit->getEmployeeRelatedByDoctorId(); ?></td>
		<td align="left"><?php echo $visit->getTime(); ?> hrs.</td>
		<td align="left"><?php echo $visit->getEmployeeRelatedByWardDocId(); ?></td>
		<td align="left"><?php echo Constant::GetVisitStatusTitle($visit->getStatus()); ?></td>
		<td align="right" class="edit">
		<?php 
		$visit_status = Constant::GetVisitStatusTitle($visit->getStatus());
		$fee_status = Constant::GetVisitStatusTitle($visit->getFeePaid());
		
		if (($visit_status == Constant::VISIT_DONE_TITLE) && ($fee_status == Constant::VISIT_FEE_NOT_PAID_TITLE)):
		echo link_to('Pay Fee','FrontDesk/payVisitFee?visit='.Utility::EncryptQueryString($visit->getId()));
		elseif (($visit_status == Constant::VISIT_DONE_TITLE) && ($fee_status == Constant::VISIT_FEE_PAID_TITLE)):
		echo 'Fee Paid';
		else:
		echo '&nbsp;';
		endif;?>
		<?php //echo link_to('&nbsp;','FrontDesk/editvisit?id='.Utility::EncryptQueryString($visit->getId()),array('title'=>'Edit', 'class' => 'edit'))?>
		<?php //echo link_to('&nbsp;','FrontDesk/deletevisit?id='.Utility::EncryptQueryString($visit->getId()), array('confirm'=>'Are you sure you want to Delete this?', 'title'=>'Delete', 'class' => 'delete')); ?>
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
<?php echo form_tag('FrontDesk/searchPatient') ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td style="padding-left:10px" height="30"><span class="heading">Search Patient to Add Visit</span></td>
    <td align="right" style="padding-right:10px"><a class="popup_closebox" href="#"><?php echo image_tag('btn_x.gif', 'border=0'); ?></a></td>
  </tr>
</table>

<table width="100%" align="left"  border="0"  cellpadding="0" cellspacing="0"  bgcolor="#eeeeee">
  
  <tr>
  	<td align="left" height="30" style="padding-left:10px; padding-top:10px">Patient Name:</td>
	<td height="30" style="padding-left:10px;"><?php echo input_tag('name','','size=38') ?></td>
  </tr>
  
  <!-- <tr>
  	<td align="left" height="30" style="padding-left:10px; padding-top:10px">Patient ID:</td>
	<td height="30" style="padding-left:10px;"><?php //echo input_tag('id','','size=38') ?></td>
  </tr>
  -->
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
		<td>&nbsp;</td>
		<td colspan="2">
		<table width="100%" align="left"  border="0">
			<tr>
				<td width="2%"><?php echo submit_tag('', array('class'=>'btn_submit', 'style'=>'border:none'))

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