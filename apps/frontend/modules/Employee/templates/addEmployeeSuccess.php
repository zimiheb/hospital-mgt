<?php use_helper ('Form','DateForm','Object') ?>
<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php echo form_tag('Employee/addEmployee') ?>

<div id="main_content">
	<div class="box_content">
	<div class="box_title">
	<!--<div class="title_icon"><img src="<?php image_tag('mini_icon1.gif','border="0"')?>" alt="" title="" /></div>-->
	
	<h2><span class="dark_blue">Employee Registration</span></h2>
	
	</div>
	<div class="box_text_content">
	<!--<img src="<?php image_tag('calendar.gif','border="0"')?>" alt="cal" title="" class="box_icon" />-->
	<div class="box_text">
	<table width="100%" cellpadding="0" cellspacing="0"  align="left" border="0" class="form">
		<tr>
			<th colspan="4">Bio Data</td>
		</tr>
		
		<tr height="40">
			<td width="13%">Name: <span class="error">*</span></td>
			<td width="36%"> <?php echo input_tag('name','','60'); ?>
			<script type="text/javascript">
			var name = new LiveValidation('name', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS;?>", wait:500});
			name.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD;?>"});
			</script>
			</td>
			
			<td width="17%">CNIC:</td>
			<td width="34%"><?php echo input_tag('cnic','','60'); ?></td>
		</tr>
		
		<tr height="40">
			<td>Date of Birth:</td>
			<td><?php echo input_date_tag('dob','','rich=true, size=20'); ?></td>
			
			<td>Gender:</td>
			<td> 
			<?php echo radiobutton_tag('gender[]', 'Male', true, array('class'=>'checkbox')) ?>Male &nbsp;&nbsp;&nbsp;
			<?php echo radiobutton_tag('gender[]', 'Female', false, array('class'=>'checkbox')) ?>Female
			</td>
		</tr>

<tr>
	<th colspan="4">Employee Information</th>
</tr>

<tr>
	<td height="15"></td>
</tr>		
	
		<tr>
			<td>Designation:</td>
			<td> <?php echo object_select_tag('', '', array ( 'name'=>'designation_id', 'id'=>'designation_id', 'related_class' => 'Designation' , 'peer_method' => 'GetDesignation')); ?> </td>
			<td>Employment Date:</td>
			<td><?php echo input_date_tag('employment_date','','rich=true, size=20'); ?></td>
		</tr>
		
		
		
		<!--<tr>
			<td colspan="4"><h2><span class="dark_blue">Employee Registration</span></h2></td>
		</tr>-->
		
		
		
		<tr height="40">
			<td>Local Resident:</td>
			<td> <?php echo radiobutton_tag('local[]', '1', true, array('class'=>'checkbox')) ?>Yes &nbsp;&nbsp;&nbsp;
	<?php echo radiobutton_tag('local[]', '0', false, array('class'=>'checkbox')) ?>No </td>
			
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		
		<tr height="40">
			<td valign="top">Last Qualification:</td>
			<td colspan="3"> <?php echo textarea_tag('qualification', '', array('style'=>'width:592px')) ?></td>
	
		</tr>
		
		<tr>
			<th colspan="4">Contact Information</td>
		</tr>

		<tr>
			<td height="15"></td>
		</tr>

		
		<tr height="40">
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

		<tr height="40">
			<td >Office Number:</td>
			<td><?php echo input_tag('contact_off','','60'); ?>
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
		
		<tr height="40">
			<td valign="top">Mailing Address:</td>
			<td colspan="3"> <?php echo textarea_tag('mail_address', '', array('style'=>'width:592px')) ?></td>
	
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