<div id="main_content">
	<div class="box_content">
	<div class="box_title">
		<h2><span class="dark_blue">Visit Details for Patinet: </span><?php echo $visit->getPatient(); ?></h2>
		
	</div>
	<div class="box_text_content">
	<div class="box_text">
				

<table width="100%"  border="0" class="form" cellpadding="0">

<tr class="datagrid">
	<th colspan="4"><h2>Patient Details</h2></th>
</tr>

	<tr height="30"  class="datagrid">
			<td width="16%"><strong>Patient Age</strong>:</td>
			<td width="32%"><?php echo Utility::getAge($visit->getPatient()->getDob('Y-m-d'), date('Y-m-d')); ?> years</td>
			
			<td width="18%"><strong>Patient Gender</strong>:</td>
			<td width="34%"><?php echo $visit->getPatient()->getGender(); ?></td>
		</tr>
		
		<tr height="30"  class="datagrid">
			<td><strong>Blood Group</strong>:</td>
			<td><?php echo $visit->getPatient()->getBloodGroup(); ?></td>
			<td><strong>Disease </strong>(if any):</td>
			<td><?php echo $visit->getPatient()->getDisease(); ?></td>
		</tr>
		
		<tr height="30"  class="datagrid">
			<td><strong>Allergy</strong> (if any):</td>
			<td><?php echo $visit->getPatient()->getAllergy(); ?></td>
			<td><strong>Drug Allergy</strong> (if any):</td>
			<td><?php echo $visit->getPatient()->getDrugAllergy(); ?></td>
		</tr>


<tr>
	<td colspan="4" height="40">&nbsp;</td>
</tr>

<tr class="datagrid">
	<th colspan="4"><h2>Visit Details</h2></th>
	
</tr>

<tr height="30"  class="datagrid">
			<td width="16%"><strong>Blood Pressure</strong>:</td>
			<td width="32%"><?php echo $visit->getBp(); ?></td>
			
			<td width="18%"><strong>Pulse</strong>:</td>
			<td width="34%"><?php echo $visit->getPulse(); ?></td>
		</tr>
		
		<tr height="30"  class="datagrid">
			<td><strong>Temperature</strong>:</td>
			<td><?php echo $visit->getTemp(); ?></td>
			<td><strong>Diet</strong>:</td>
			<td><?php echo $visit->getDiet(); ?></td>
		</tr>
		
		<tr height="30"  class="datagrid">
			<td><strong>Visit Description</strong>:</td>
			<td colspan="3"><?php echo $visit->getDescription(); ?></td>
		</tr>


<tr>
	<td colspan="4" height="40">&nbsp;</td>
	
</tr>

</table>

<table width="100%"  border="0" class="form" cellpadding="0">
<tr class="datagrid">
	<th colspan="5"><h2>Medicines Prescribed</h2></th>
</tr>

<tr>
	<th width="5%" align="left">SN</th>
	<th width="34%" align="left">Medicine Name </th>
	<th width="24%" align="left">Strength</th>
	<th width="21%" align="left">Dosage</th>
	<th width="16%" align="left">Total Quantity</th>
</tr>
	
<?php foreach ($medicines as $i => $med): ?>
					<tr class="datagrid">
						<td align="left"><?php echo $i+1 ;?></td>
						<td align="left"><?php echo $med->getPharma()->getType().'. '.$med->getPharma()->getName()?> </td>
						<td align="left"><?php echo $med->getPharma()->getStrength()?> </td>
						<td align="left"><?php echo $med->getDosage()?> </td>
						<td align="left"><?php echo $med->getQuantity()?> </td>
						</tr>
<?php endforeach; ?>
<tr>
	<td colspan="4" height="40">&nbsp;</td>
</tr>

</table>

<table width="100%"  border="0" class="form" cellpadding="0">
<tr class="datagrid">
	<th colspan="4"><h2>Lab Test Reports</h2></th>
</tr>

<tr>
	<th width="5%" align="left">SN</th>
	<th width="25%" align="left">Lab Test</th>
	<th width="70%" align="left">Report</th>
</tr>
	
<?php foreach ($tests as $j => $test): ?>
	<tr class="datagrid">
		<td align="left"><?php echo $j+1;?> </td>
		<td align="left"><?php echo $test->getLabTest();?> </td>
		<td align="left"><?php echo $test->getDescription();?> </td>
	</tr>
<?php endforeach; ?>
<tr>
	<td colspan="4" height="40">&nbsp;</td>
</tr>

</table>

			</div>
		</div>
	</div>
<div class="clear"></div>    
</div>
