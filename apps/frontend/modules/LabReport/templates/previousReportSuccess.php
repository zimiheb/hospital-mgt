<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php use_helper ('Form','Javascript','Object') ?>
<?php echo form_tag('LabReport/previousReport') ?>
<div id="main_content">
	<div class="box_content">
	<div class="box_title">
		<h2><span class="dark_blue">List of Previous Reports</span></h2>
		
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
		<th width="26%" style="text-align:left;">Lab Test Name</th>
		<th width="30%" style="text-align:left;">Patient Name</th>
		<th width="17%" style="text-align:left;">Visit Type</th>
		<th width="15%" style="text-align:left;">Visit Date</th>
		<th width="12%" style="text-align:left;">Operation</th>
	  </tr>
	  
	 <!-- Populating the List -->
		
	  <?php 
	  
	  if ($reports): ?>
		<?php 
		
		foreach ($reports as $j => $report) : ?>
		
              <tr>
                <td align="left"><?php echo $report->getLabTest(); ?> </td>
				<td align="left"><?php echo $report->getPatient(); ?></td>
				<td align="center"><?php echo $report->getVisit(); ?></td>
				<td align="center"><?php echo $report->getUpdatedAt('d-M-Y'); ?>
				<td align="right">
				<?php echo link_to('&nbsp;','LabReport/edit?report='.Utility::EncryptQueryString($report->getId()),array('title'=>'Edit', 'class' => 'edit'))?>
				
				<?php //echo link_to('&nbsp;','LabTest/delete?id='.Utility::EncryptQueryString($lab_test->getId()), array('confirm'=>'Are you sure you want to Delete this?', 'title'=>'Delete', 'class' => 'delete')); ?>
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