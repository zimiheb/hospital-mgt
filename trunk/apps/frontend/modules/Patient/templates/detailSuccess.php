<div id="main_content">
	<div class="box_content">
	<div class="box_title">
		<h2><span class="dark_blue">Patient Details: </span><?php echo $patient->getName(); ?></h2>
		
	</div>
	<div class="box_text_content">
	<div class="box_text">
				

<table width="100%"  border="0" class="form" cellpadding="0">

<tr class="datagrid">
	<th colspan="4">Bio Data</th>
</tr>

<tr class="datagrid">
	<td width="20%">Name: </td>
	<td width="30%">&nbsp; <?php echo $patient->getName(); ?></td>
	<td width="20%">Father Name:</td>
	<td width="30%">&nbsp; <?php echo $patient->getFatherName(); ?></td>
</tr>

<tr class="datagrid">
	<td>CNIC:</td>
	<td>&nbsp;<?php echo $patient->getCnic(); ?></td>
	<td>Date of Birth:</td>
	<td>&nbsp;<?php echo $patient->getDob('d-M-Y'); ?></td>
</tr>

<tr class="datagrid">
	<td>Blood Group:</td>
	<td>&nbsp;<?php echo $patient->getBloodGroup(); ?></td>
	<td>Gender:</td>
	<td>&nbsp;<?php echo $patient->getGender();?> </td>
</tr>


<tr>
	<td colspan="4" height="40">&nbsp;</td>
</tr>

<tr class="datagrid">
	<th colspan="4">Contact Information</th>
	
</tr>

<tr class="datagrid">
	<td>Mobile Number:</td>
	<td>&nbsp;<?php echo $patient->getContactCell(); ?></td>
	<td>Residence Number:</td>
	<td>&nbsp;<?php echo $patient->getContactRes(); ?></td>
</tr>

<tr class="datagrid">
	<td>Emergency Number:</td>
	<td>&nbsp;<?php echo $patient->getEmergencyContact(); ?></td>
	<td colspan="2">&nbsp;</td>
</tr>

<tr class="datagrid">
	<td valign="top">Mailing Address:</td>
	<td colspan="3">&nbsp;<?php echo $patient->getAddress(); ?></td>
</tr>


<tr>
	<td colspan="4" height="40">&nbsp;</td>
</tr>

<tr>
	<th colspan="4">Patient Information</th>
</tr>

<tr>
	<td height="15"></td>
</tr>

<tr height="30">
	<td valign="top">Previous / Current Diseases:</td>
	<td colspan="3">&nbsp;<?php echo $patient->getDisease(); ?></td>
</tr>

<tr height="30">
	<td valign="top">Chronical Allergies:</td>
	<td colspan="3">&nbsp;<?php echo $patient->getAllergy(); ?></td>
</tr>

<tr height="30">
	<td valign="top">Drug Allergies:</td>
	<td colspan="3">&nbsp;<?php echo $patient->getDrugAllergy(); ?></td>
</tr>

</table>
			</div>
		</div>
	</div>
<div class="clear"></div>    
</div>
