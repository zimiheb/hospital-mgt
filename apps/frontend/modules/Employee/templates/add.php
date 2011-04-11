<?php use_helper ('Form','DateForm','Object') ?>
<?php echo form_tag('Register/addEmployee') ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td colspan="2" nowrap="nowrap">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="school_hdng">
					<tr>
					<td><h2>Employee Registration <span></span></h2></td>
					<td align="right"><h3>&nbsp;</h3></td>
					</tr>
					
				</table>
			</td>
		</tr>
		<tr>
			<td width="461" nowrap="nowrap" class="heading"></td>
			<td width="464"  align="right"></td>
		</tr>
		<tr>
			<td height="20" colspan="2">&nbsp;</td>
		</tr>
	</tbody>
</table>


<table width="100%" cellpadding="0" cellspacing="0"  align="left" border="0" class="form">

<tr>
	<th colspan="4">Bio Data</th>
</tr>

<tr>
	<td height="15"></td>
</tr>

<tr height="30">
	<td width="15%">Name: <span class="error">*</span></td>
	<td width="35%"> <?php echo input_tag('name','','60'); ?>
	<script type="text/javascript">
	var name = new LiveValidation('name', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS;?>", wait:500});
	name.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD;?>"});
	</script>
	</td>
	<td width="15%">Father/Husband Name:</td>
	<td width="35%"><?php echo input_tag('father_name','','60'); ?></td>
</tr>


<tr height="30">
	<td>CNIC:</td>
	<td><?php echo input_tag('cnic','','60'); ?>
	<script type="text/javascript">
	var cnic = new LiveValidation('cnic', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	cnic.add( Validate.Format, { pattern: /^[\d\-]*$/,failureMessage: "<?php echo Constant::VALIDATION_INTEGER_FIELD;  ?>"} );
	</script>
	</td>
	<td>Date of Birth: </td>
	<td><?php echo input_date_tag('dob','','rich=true, size=20'); ?></td>
</tr>

<tr height="30">
	<td>Blood Group:</td>
	<td><?php echo input_tag('blood_group','','60'); ?></td>
	<td>Disease (if any)</td>
	<td><?php echo input_tag('disease','','60'); ?></td>
</tr>

<tr height="30">
	<td>Gender:</td>
	<td> 
	<?php echo radiobutton_tag('gender[]', 'Male', true, array('class'=>'checkbox')) ?>Male &nbsp;&nbsp;&nbsp;
	<?php echo radiobutton_tag('gender[]', 'Female', false, array('class'=>'checkbox')) ?>Female
	</td>
	
</tr>

<tr>
	<td colspan="4" height="30">&nbsp;</td>
</tr>

<tr>
	<th colspan="4">Employee Information</th>
</tr>

<tr>
	<td height="15"></td>
</tr>

<tr height="30">
	
	<td>Belt No: <span class="error">*</span></td>
	<td> <?php echo input_tag('belt_no', '', '60');?>
	<script type="text/javascript">
	var belt_no = new LiveValidation('belt_no', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS;?>", wait:500});
	belt_no.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD;?>"});
	belt_no.add( Validate.Format, { pattern: /^[\d\-]*$/,failureMessage: "<?php echo 'Digits and Hyphen only'  ?>"} );
	</script>
	</td>
	
	<td>Designation:</td>
	<td> <?php echo object_select_tag('', '', array ( 'name'=>'designation_id', 'id'=>'designation_id', 'related_class' => 'Designation' , 'peer_method' => 'GetDesignation')); //echo link_to('Add New', 'Designation/addDilDesignation?district='.Utility::EncryptQueryString($district).'&office='.Utility::EncryptQueryString($office));?> </td>
	
	
</tr>

<tr height="30">
	<td>Work Experience:</td>
	<td> <?php 
	$max=35;
	$i=2 ;
	$value = array('Less than a Year', '1 Year');
	for($i;$i<=$max;$i++)
	 { 
	 $value[$i]=$i.' Years'; 
	 }
	echo select_tag('experience_year', options_for_select($value)); ?>
	</td>
	
	<td>Employment Date:</td>
	<td> <?php echo input_date_tag('employment_date','','rich=true, size=20');?> </td>
	
	
</tr>

<tr height="30">
	<td>Local Resident:</td>
	<td> <?php echo radiobutton_tag('local[]', '1', true, array('class'=>'checkbox')) ?>Yes &nbsp;&nbsp;&nbsp;
	<?php echo radiobutton_tag('local[]', '0', false, array('class'=>'checkbox')) ?>No </td>
	
	<!--<td>Email ID:</td>
	<td><?php //echo input_tag('email','','60'); ?>
	<script type="text/javascript">
	var email = new LiveValidation('email', { validMessage: "<?php //echo Constant::VALIDATION_SUCCESS;?>", wait:500});
	email.add( Validate.Email,{ failureMessage: "<?php //echo Constant::VALIDATION_EMAIL_FIELD; ?>"});
	</script>	
	</td>-->
</tr>

<tr height="30">
	<td valign="top">Last Qualification:</td>
	<td colspan="3"> <?php echo textarea_tag('qualification', '', array('style'=>'width:622px')) ?></td>
</tr>

<tr>
	<td colspan="4" height="30">&nbsp;</td>
</tr>

<tr>
	<th colspan="4">Contact Information</th>
</tr>

<tr>
	<td height="15"></td>
</tr>

<tr height="30">
	<td>Mobile Number:</td>
	<td><?php echo input_tag('contact_cell','','60'); ?>
	<script type="text/javascript">
		var contact_cell = new LiveValidation('contact_cell', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
		contact_cell.add( Validate.Format, { pattern: /^[+\d][\d\-\/\(\)]*$/,failureMessage: "<?php echo Constant::VALIDATION_INTEGER_FIELD;  ?>"} );
		</script></td>
	<td>Residence Number:</td>
	<td><?php echo input_tag('contact_res','','60'); ?>
	<script type="text/javascript">
		var contact_res = new LiveValidation('contact_res', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
		contact_res.add( Validate.Format, { pattern: /^[+\d][\d\-\/\(\)]*$/,failureMessage: "<?php echo Constant::VALIDATION_INTEGER_FIELD;  ?>"} );
		</script></td>
</tr>

<tr>
	<td height="35">Office Number:</td>
	<td height="35"><?php echo input_tag('contact_off','','60'); ?>
	<script type="text/javascript">
		var contact_off = new LiveValidation('contact_off', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
		contact_off.add( Validate.Format, { pattern: /^[+\d][\d\-\/\(\)]*$/,failureMessage: "<?php echo Constant::VALIDATION_INTEGER_FIELD;  ?>"} );
		</script></td>
	<td height="35">Emergency Number:</td>
	<td height="35"><?php echo input_tag('emergency_contact','','60'); ?>
	<script type="text/javascript">
		var emergency_contact = new LiveValidation('emergency_contact', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
		emergency_contact.add( Validate.Format, { pattern: /^[+\d][\d\-\/\(\)]*$/,failureMessage: "<?php echo Constant::VALIDATION_INTEGER_FIELD;  ?>"} );
		</script></td>
</tr>

<tr height="30">
	<td valign="top">Mailing Address:</td>
	<td><?php echo textarea_tag('mail_address','',array('style'=>'width:290px')); ?></td>
	<td valign="top">Permanent Address:</td>
	<td><?php echo textarea_tag('permanent_address','',array('style'=>'width:290px')); ?></td>
</tr>

<tr>
	<td colspan="4" height="30">&nbsp;</td>
</tr>



<tr>
	<th colspan="4">System Login Information</th>
</tr>

<tr>
	<td height="15" colspan="2">&nbsp;</td>
</tr>

<tr height="30">
	<td>Username:<!--<span class="error"> *</span>--></td>
	<td colspan="2"> <?php echo input_tag('user_name','','size=35'); ?>
	<script type="text/javascript">
	/*var user_name = new LiveValidation('user_name', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS;?>", wait:500});
	user_name.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD;?>"});*/
	</script>	</td>
</tr>


<tr height="30">
	<td>Password:<!--<span class="error"> *</span>--></td>
	<td colspan="3"> <?php echo input_password_tag('password','','size=35'); ?>
	<script type="text/javascript">
	/*var password = new LiveValidation('password', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>", wait: 500});
	password.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	password.add( Validate.Length, { minimum: <?php echo Constant::PASSWORD_MIMIMUM_LENGTH; ?>, tooShortMessage : "<?php echo Constant::PASSWORD_MINIMUM_LENGTH_ERROR; ?>" } );*/
	</script>	</td>
</tr>

<tr>
	<td height="50" colspan="2"><span class="error">* Username once entered, cannot be changed afterwards.</span><!--<br />
								<span class="error">* Both Username and Email ID can be used to log into the application.</span>--></td>
</tr>

<tr>
	<td>&nbsp;</td>
    <td colspan="3"><table width="100%"  align="left" border="0" class="form">
      <tr>
        <td width="4%"><?php echo submit_tag(' ', array('class'=>'btn_register', 'style'=>'border:none')); ?> </td>
        <td width="96%"><?php echo link_to(' ', (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'Home/index', array('class' => 'btn_cancel'));
 ?></td>
      </tr>
    </table></td>
  </tr>
</table>
