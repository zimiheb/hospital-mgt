<div id="main_content">
	<div class="box_content">
	<div class="box_title">
		<h2><span class="dark_blue">Employee Details: </span><?php echo $employee->getName(); ?></h2>
		
	</div>
	<div class="box_text_content">
	<div class="box_text">
				

<table width="100%"  border="0" class="form" cellpadding="0">

<tr class="datagrid">
	<th colspan="4">Bio Data</th>
</tr>

<tr class="datagrid">
	<td width="20%">Name: </td>
	<td width="30%">&nbsp; <?php echo $employee->getName(); ?></td>
	<td width="20%">Father Name:</td>
	<td width="30%">&nbsp; <?php //echo $employee->getFatherName(); ?></td>
</tr>

<tr class="datagrid">
	<td>CNIC:</td>
	<td>&nbsp;<?php echo $employee->getCnic(); ?></td>
	<td>Date of Birth:</td>
	<td>&nbsp;<?php echo $employee->getDob('d-M-Y'); ?></td>
</tr>

<tr class="datagrid">
	<td>Blood Group:</td>
	<td>&nbsp;<?php //echo $employee->getBloodGroup(); ?></td>
	<td>Disease (if any)</td>
	<td>&nbsp;<?php //echo $employee->getDisease(); ?></td>
</tr>

<tr class="datagrid">
	<td>Gender:</td>
	<td>&nbsp;<?php echo $employee->getGender();?> </td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</td>
</tr>

<tr>
	<td colspan="4" height="40">&nbsp;</td>
</tr>

<tr class="datagrid">
	<th colspan="4">Contact Information</th>
	
</tr>

<tr class="datagrid">
	<td>Mobile Number:</td>
	<td>&nbsp;<?php echo $employee->getContactCell(); ?></td>
	<td>Residence Number:</td>
	<td>&nbsp;<?php echo $employee->getContactRes(); ?></td>
	
</tr>

<tr class="datagrid">
	<td>Office Number:</td>
	<td>&nbsp;<?php echo $employee->getContactOff(); ?></td>
	<td>Emergency Number:</td>
	<td>&nbsp;<?php echo $employee->getEmergencyContact(); ?></td>
</tr>

<tr class="datagrid">
	<td valign="top">Mailing Address:</td>
	<td colspan="3">&nbsp;<?php echo $employee->getMailAddress(); ?></td>
</tr>

<tr class="datagrid">
	<td valign="top">Permanent Address:</td>
	<td colspan="3">&nbsp;<?php //echo $employee->getPermanentAddress(); ?></td>
</tr>

<tr>
	<td colspan="4" height="40">&nbsp;</td>
	
</tr>

<tr class="datagrid">
	<th colspan="4">Employee Information</th>
</tr>


<tr class="datagrid">
	<td>Designation:</td>
	<td>&nbsp;<?php echo $employee->getDesignation();?> </td>
	<td>Department:</td>
	<td>&nbsp;<?php echo $employee->getDepartment();?> </td>
</tr>

<tr class="datagrid">
	<td>Work Experience:(in Years)</td>
	<td>&nbsp;<?php //echo $employee->getExperienceYear();?></td>
	<td>Employment Date:</td>
	<td>&nbsp;<?php echo $employee->getEmploymentDate('d-M-Y');?> </td>
</tr>

<tr class="datagrid">
	<td>Local Resident:</td>
	<td>&nbsp;<?php echo Constant::GetBooleanWord($employee->getLocalResident()); ?></td>
	<td colspan="2">&nbsp;</td>
	</tr>

<tr>
	<td colspan="4" height="40">&nbsp;</td>
</tr>


<!--<tr class="datagrid">
	<th colspan="4">System Authentication Information</th>
</tr>


<tr class="datagrid">
	<td>Username:</td>
	<td>&nbsp;
	<?php 
	if($user != NULL):
	//echo $user->getUser();
	else:
	//echo link_to('Assign Credintials', 'Register/giveCredential?employee='.Utility::EncryptQueryString($employee->getId()) );
	endif;
	?> </td>
<td>Department:</td>
	<td>&nbsp;<?php //echo $employee->getDepartment();?> </td>-->
</tr>
</table>
			</div>
		</div>
	</div>
<div class="clear"></div>    
</div>
