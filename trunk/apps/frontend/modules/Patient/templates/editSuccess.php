<?php use_helper ('Form','DateForm','Object'); ?>
<?php echo form_tag('Patient/edit'); ?>

<?php echo input_hidden_tag('patient_id', $patient->getId()); ?>
<div id="main_content">
	<div class="box_content">
	<div class="box_title">
		<h2><span class="dark_blue">Edit Patient Information: </span><?php echo  $patient->getName(); ?></h2>
		
	</div>
	<div class="box_text_content">
	<div class="box_text">


<table width="100%" cellpadding="0" cellspacing="0"  align="left" border="0" class="form">

<tr>
	<td>&nbsp;</td>
	<td>&nbsp; </td>
</tr>

<tr>
	<th colspan="4">Bio Data</td>
</tr>

<tr>
	<td height="15"></td>
</tr>


<tr height="30">
	<td width="15%">Name:<span class="error"> *</span> </td>
	<td width="35%"> <?php echo input_tag('name',$patient->getName(),'60'); ?>
	<script type="text/javascript">
	var name = new LiveValidation('name', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	name.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	name.add( Validate.Format, { pattern: /^[A-Z a-z]*$/,failureMessage: "<?php echo 'Alphabets Only';  ?>"} );
	</script>
	</td>

	<td width="15%">CNIC:</td>
	<td width="35%"><?php echo input_tag('cnic',$patient->getCnic(),'60'); ?>
	<script type="text/javascript">
	var cnic = new LiveValidation('cnic', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	cnic.add( Validate.Format, { pattern: /^[\d\-]*$/,failureMessage: "<?php echo Constant::VALIDATION_INTEGER_FIELD;  ?>"} );
	</script></td>
</tr>

<tr height="30">
	<td>Date of Birth:</td>
	<td><?php echo input_date_tag('dob',$patient->getDob(),'rich=true'); ?></td>

	<td>Gender:</td>
	<td>
	<?php
	if (($patient->getGender()) == 'Female')
	{ 
	echo radiobutton_tag('gender[]', 'Female', true).'Female &nbsp;&nbsp;&nbsp;';  echo radiobutton_tag('gender[]', 'Male', false).'Male';
	}
	else if (($patient->getGender()) == Constant::BOOLEAN_WORD_NO)
	{
	echo radiobutton_tag('gender[]', 'Female', false).'Female &nbsp;&nbsp;&nbsp;';  echo radiobutton_tag('gender[]', 'Male', true).'Male';
	}
	?>
	</td>
	
</tr>


<tr>
	<td colspan="4" height="30">&nbsp;</td>
</tr>

<tr>
	<th colspan="4">Contact Information</td>
</tr>

<tr>
	<td height="15"></td>
</tr>


<tr height="30">
	<td>Mobile Number:</td>
	<td><?php echo input_tag('contact_cell',$patient->getContactCell(),'60'); ?>
	<script type="text/javascript">
	var contact_cell = new LiveValidation('contact_cell', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	contact_cell.add( Validate.Numericality, { failureMessage: "<?php echo Constant::VALIDATION_INTEGER_FIELD; ?>" } );
	</script></td>
	
	<td>Residence Number:</td>
	<td><?php echo input_tag('contact_res',$patient->getCOntactRes(),'60'); ?>
	<script type="text/javascript">
	var contact_res = new LiveValidation('contact_res', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	contact_res.add( Validate.Numericality, { failureMessage: "<?php echo Constant::VALIDATION_INTEGER_FIELD; ?>" } );
	</script></td>
	
</tr>

<tr height="30">
	<td>Emergency Number:</td>
	<td><?php echo input_tag('emergency_contact',$patient->getEmergencyContact(),'60'); ?>
	<script type="text/javascript">
	var emergency_contact = new LiveValidation('emergency_contact', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	emergency_contact.add( Validate.Numericality, { failureMessage: "<?php echo Constant::VALIDATION_INTEGER_FIELD; ?>" } );
	</script></td>
</tr>

<tr height="30">
	<td valign="top">Mailing Address:</td>
	<td><?php echo textarea_tag('mail_address',$patient->getAddress(),'size=30x4'); ?></td>
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
	<td colspan="3"><?php echo textarea_tag('disease',$patient->getDisease(),'size=70x4'); ?></td>
</tr>

<tr height="30">
	<td valign="top">Chronical Allergies:</td>
	<td colspan="3"><?php echo textarea_tag('allergy',$patient->getAllergy(),'size=70x4'); ?></td>
</tr>

<tr height="30">
	<td valign="top">Drug Allergies:</td>
	<td colspan="3"><?php echo textarea_tag('drug_allergy',$patient->getDrugAllergy(),'size=70x4'); ?></td>
</tr>


<tr>
	<td colspan="4" height="40">&nbsp;</td>
</tr>



<tr height="30">
	
	
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>

<tr>
	<td colspan="4" height="40">&nbsp;</td>
	
</tr>

<!--<tr>
	<td class="subhdng" colspan="4">System Login Information</td>
</tr>

<tr>
	<td height="15"></td>
</tr>

<tr height="30">
	<td>Username:</td>
	<td> <?php //echo $patient->getUserName(); ?></td>
</tr>

<tr height="30">
	<td>Email ID:</td>
	<td> <?php //echo $patient->getEmail(); ?></td>
</tr>

<tr height="30">
	<td>Password:</td>
	<td> <?php //echo input_password_tag('password','','60'); ?></td>
	<td>Status:</td>
    <td><?php //echo select_tag ('status',options_for_select(Constant::GetRecordStatusArray(), $patient->getStatus())); ?></td>
</tr>
-->

<tr>
	<td>&nbsp;</td>
    <td colspan="3"><table width="100%" align="left" border="0" class="form">
      <tr>
        <td width="2%"><?php echo submit_tag(' ', array('class'=>'btn_update', 'style'=>'border:none')); ?> </td>
        <td width="98%"><?php echo link_to(' ', (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'Home/index', array('class' => 'btn_cancel'));
 ?></td>
      </tr>
    </table></td>
  </tr>
</table>
	</div>
		</div>
	</div>
<div class="clear"></div>    
</div>