<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php use_helper ('Form','Javascript','Object') ?>
<?php echo form_tag('FrontDesk/visitPrevious') ?>
<div id="main_content">
	<div class="box_content">
	<div class="box_title">
		<h2><span class="dark_blue">List of Previous Visits</span></h2>
		
	</div>
	<div class="box_text_content">
	<div class="box_text">

<table class="form" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr height="30">
  	<td colspan="4" valign="top"> <h2>Please Select a "Visit Date" to search.</h2>
  </tr>
  
  <tr height="30">
		<td width="14%">Visit Date:</td>
		<td width="86%"> <?php echo input_date_tag('visit_date','','rich=true, size=20') ;?>
		
	</td>
  </tr>
	
	<tr height="50">
		<td>&nbsp;</td>
		<td colspan="2" valign="top">
		<table width="100%" align="left" border="0" class="form">
			<tr>
				<td width="2%"><?php echo submit_tag(' ', array('class' => 'btn_view', 'style'=>'border:none')); ?> </td>
				<td width="96%">&nbsp;</td>
			</tr>
    	</table>
		</td>
  </tr>
  
  </table>
  </form>

<?php if($flag):?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="datagrid">
	  <tr>
		<th style="text-align:left;">Patient's Name</th>
		<th style="text-align:left;">OPD Doctor</th>
		<th style="text-align:left;">Visit Time</th>
		<!--<th style="text-align:left;">Ward Doctor</th>-->
		<th style="text-align:left;">Status</th>
		<th style="text-align:left;">Fee (Rs.)</th>
		<th style="text-align:left;">Operation</th>
	  </tr>
	  
	 <!-- Populating the List -->
		
	  <?php 
	  
	  if ($visits): ?>
		<?php 
		
		foreach ($visits as $j => $visit) : ?>
		
		<tr>
		<td align="left"><?php echo link_to($visit->getPatient(),'FrontDesk/visitDetail?visit='.Utility::EncryptQueryString($visit->getId())); ?> </td>
		<td align="left"><?php echo $visit->getEmployeeRelatedByDoctorId(); ?></td>
		<td align="left"><?php echo $visit->getTime(); ?> hrs.</td>
		<!--<td align="left"><?php //echo $visit->getEmployeeRelatedByWardDocId(); ?></td>-->
		<td align="left"><?php echo Constant::GetVisitStatusTitle($visit->getStatus()); ?></td>
		<td align="left"><?php echo $visit->getFee(); ?></td>
		<td align="right" class="edit">
		<?php 
		$visit_status = Constant::GetVisitStatusTitle($visit->getStatus());
		$fee_status = Constant::GetVisitStatusTitle($visit->getFeePaid());
		
		if (($visit_status == Constant::VISIT_DONE_TITLE) && ($fee_status == Constant::VISIT_FEE_NOT_PAID_TITLE)){
		echo link_to('Pay Fee','FrontDesk/payVisitFee?visit='.Utility::EncryptQueryString($visit->getId()), array('confirm'=>'Confirm Fee Payment!'));
		}
		elseif (($visit_status == Constant::VISIT_DONE_TITLE) && ($fee_status == Constant::VISIT_FEE_PAID_TITLE)){
		echo 'Fee Paid';
		}
		else
		{
		echo '';
		}
		?>
		<?php echo link_to('&nbsp;','FrontDesk/visitEdit?visit='.Utility::EncryptQueryString($visit->getId()),array('title'=>'Edit', 'class' => 'edit'))?>
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
  <?php endif; ?>		
</div>
</div>
</div>
<div class="clear"></div>    
</div>