<?php use_helper ('Form','DateForm','Object') ?>
<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php echo form_tag('FrontDesk/visitEdit') ?>

<?php echo input_hidden_tag('visit_id', $visit->getId()); ?>
<div id="main_content">
	<div class="box_content">
	<div class="box_title">
	<h2><span class="dark_blue">Edit Vist for Patient: </span><?php echo $visit->getPatient(); ?></h2>
	
	</div>
	<div class="box_text_content">
	<div class="box_text">
	<table width="100%" cellpadding="0" cellspacing="0"  align="left" border="0" class="form">
		
		<tr valign="bottom">
			<td colspan="2"><h2>OPD Patient Visit</h2> </td>
		</tr>
		
		<tr height="40">
			<td width="16%">Doctor to Visit:</td>
			<td width="40%"><?php echo object_select_tag($visit, 'getDoctorId', array ( 'related_class' => 'Employee' , 'peer_method' => 'GetDoctor', 'include_custom' => 'None'),  $visit->getDoctorId()); ?>			</td>
			
			<td width="11%">Type of Visit:</td>
			<td  width="33%"><?php echo select_tag('visit_type', options_for_select(array(
			'Indoor' => 'Indoor',
			'Outdoor' => 'Outdoor'), $visit->getVisitType())); ?></td>
		</tr>
		
		<tr height="40">
			<td>Visit Time (2400 Hrs):</td>
			<td><?php echo input_tag('time', $visit->getTime(),'60'); ?></td>
			
			<td>Visit Date:</td>
			<td><?php echo input_date_tag('visit_date', $visit->getVisitDate('Y-m-d'),'rich=true, size=20'); ?></td>
			<script type="text/javascript">
			var time = new LiveValidation('time', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
			time.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
			</script>
		</tr>
		
		<tr height="50" valign="bottom">
			<td colspan="2"><h2>Give Ward Details for Indoor Patient</h2> </td>
		</tr>
		
		<tr height="40">
			<td>Doctor at Ward:</td>
			<td><?php echo object_select_tag($visit, 'getWardDocId', array ( 'related_class' => 'Employee' , 'peer_method' => 'GetDoctor', 'include_custom' => 'None'),  $visit->getWardDocId()); ?></td>
			
			<td>Ward Bed:</td>
			<td><?php echo object_select_tag($visit, 'getWardBedId', array ( 'related_class' => 'WardBed' , 'peer_method' => 'GetWardBed', 'include_custom' => 'None'),  $visit->getWardBedId()); ?></td>
		</tr>
		
		<tr height="40">
			<td>Admission Date:</td>
			<td><?php echo input_date_tag('admit_date',$visit->getAdmitDate('Y-m-d'),'rich=true, size=20'); ?></td>
			
			<td>Room:</td>
			<td><?php echo object_select_tag($visit, 'getRoomId', array ( 'related_class' => 'Room' , 'peer_method' => 'GetRoom', 'include_custom' => 'None'),  $visit->getRoomId()); ?></td>
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
	<!--<a href="#" class="details">erawer</a>-->
	</div>
	
	</div>

<div class="clear"></div>    
</div>