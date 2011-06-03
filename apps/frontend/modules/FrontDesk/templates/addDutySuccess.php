<?php use_helper ('Form','DateForm','Object') ?>
<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php echo form_tag('FrontDesk/addDuty') ?>

<div id="main_content">
	<div class="box_content">
	<div class="box_title">
	<h2><span class="dark_blue">Duty Roster For Staff and Doctors</span></h2>
	
	</div>
	<div class="box_text_content">
	<div class="box_text">
	<table width="100%" cellpadding="0" cellspacing="0"  align="left" border="0" class="form">
		
		
		<tr height="40">
			<td width="13%">Staff Member:</td>
			<td width="36%"><?php echo object_select_tag('', '', array ( 'name'=>'employee_id', 'id'=>'employee_id', 'related_class' => 'Employee' , 'peer_method' => 'GetEmployee')); ?>
			</td>
			
			<td>Duty Date:</td>
			<td><?php echo input_date_tag('duty_date',date('Y-m-d'),'rich=true, size=20'); ?></td>
		</tr>
		
		<tr height="40">
			<td>From (Time):</td>
			<td><?php echo input_tag('from','','60'); ?></td>
			<td>To (Time):</td>
			<td><?php echo input_tag('to','','60'); ?></td>
		</tr>

		<tr height="40">
			<td width="13%">Substitute Staff:</td>
			<td width="36%"><?php echo object_select_tag('', '', array ( 'name'=>'substitute_id', 'id'=>'substitute_id', 'related_class' => 'Employee' , 'peer_method' => 'GetEmployee')); ?>
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