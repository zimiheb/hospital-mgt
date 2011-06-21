<?php use_helper ('Form','DateForm','Object', 'Javascript') ?>
<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php echo form_tag('Visit/addCheckup') ?>

<?php echo javascript_include_tag('jScrollPane.js') ?>
<?php echo javascript_include_tag('jquery.mousewheel.js') ?>
<?php echo stylesheet_tag('jScrollPane', array('media' => 'screen')); ?>
<?php echo stylesheet_tag('demoStyles', array('media' => 'screen')); ?>

<style type="text/css">

#pane3{height: 200px;width: 800px;overflow: auto;background-color:#EEEEEE;border: 1px solid #000000;}

.left .jScrollPaneTrack {left: 0;right: auto;}

.left a.jScrollArrowUp {left: 0;right: auto;}
.left a.jScrollArrowDown {left: 0;right: auto;}

/* IE SPECIFIC HACKED STYLES */
* html .osX .jScrollPaneDragBottom {bottom: -1px;}
/* /IE SPECIFIC HACKED STYLES */

#pane4{height: 150px;width: 700px;overflow: hidden;background-color:#CCCCCC;border: 2px solid #000000;}
.left .jScrollPaneTrack {left: 0;right: auto;}
.left a.jScrollArrowUp {left: 0;right: auto;}
.left a.jScrollArrowDown {left: 0;right: auto;}

/* IE SPECIFIC HACKED STYLES */
* html .osX .jScrollPaneDragBottom {bottom: -1px;}
/* /IE SPECIFIC HACKED STYLES */
</style>

<div id="main_content">
	<div class="box_content">
	<div class="box_title">
	<h2><span class="dark_blue">Checkup for Patient: </span><?php echo $patient->getName(); ?></h2>
	
	</div>
	<div class="box_text_content">
	<div class="box_text">
	<table width="100%" cellpadding="0" cellspacing="0"  align="left" border="0" class="form">
		
		
		<tr height="30">
			<td width="13%">Patient Age:</td>
			<td width="36%"><?php echo Utility::getAge($patient->getDob('Y-m-d'), date('Y-m-d')); ?> years</td>
			
			<td width="17%">Patient Gender:</td>
			<td width="34%"><?php echo $patient->getGender(); ?></td>
		</tr>
		
		<tr height="30">
			<td>Blood Group:</td>
			<td><?php echo $patient->getBloodGroup(); ?></td>
			<td>Disease (if any):</td>
			<td><?php echo $patient->getDisease(); ?></td>
		</tr>
		
		<tr height="30">
			<td>Allergy (if any):</td>
			<td><?php echo $patient->getAllergy(); ?></td>
			<td>Drug Allergy (if any):</td>
			<td><?php echo $patient->getDrugAllergy(); ?></td>
		</tr>
		
		<tr>
			<td colspan="2"> <h2>Select Medicines from here</h2></td>
		</tr>

		<tr>
			<td colspan="4">
			<div class="holder">
				<div id="pane3" class="scroll-pane">&nbsp;
					<div id="medicines">
					<table border="0" cellpadding="0" cellspacing="0" class="datagrid">
					
					
					<tr>
						<td width="6%"><strong>Select</strong></td>
						<td width="48%"><strong>Medicine Name</strong></td>
						<td width="16%"><strong>Strength</strong></td>
						<td width="16%"><strong>Dosage</strong></td>
						<td width="14%"><strong>Duration (days)</strong></td>
					</tr>
			
			<?php foreach ($medicines as $i => $med): ?>
					<tr>
						<td><?php echo checkbox_tag('med['.$med->getId().']');?> </td>
						<td><?php echo $med->getType().'. '.$med->getName()?> </td>
						<td><?php echo $med->getStrength()?> </td>
						<td><?php echo object_select_tag('', '', array ( 'name'=>'dose['.$med->getId().']', 'id'=>'dose['.$med->getId().']', 'related_class' => 'Dosage' , 'peer_method' => 'GetDosage')); ?> </td>
						
					<td> <?php echo input_tag('duration['.$med->getId().']', '', 'size=3'); ?></td>
					</tr>
					<?php endforeach ;?>
					</table>
							</div>
						</div>
					</div>
					</td>
					
				</tr>
		
		
			<tr>
			<td>&nbsp;</td>
			<td colspan="2">
			<table width="100%" align="left" border="0">
				<tr>
					<td width="2%"><?php echo submit_tag(' ', array('class'=>'btn_add', 'style'=>'border:none')); ?> </td>
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