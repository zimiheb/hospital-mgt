<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php use_helper ('Form','Javascript','Object') ?>

<?php use_javascript('prototype.js') ?>		
<?php use_javascript('effects.js') ?>		
<?php use_javascript('dragdrop.js') ?>		
<?php use_javascript('popup.js') ?>		
<link href="<?php echo _compute_public_path('popup', 'css', 'css', false);  ?>" rel="stylesheet" type="text/css" />	
<div id="main_content">
	<div class="box_content">
	<div class="box_title">
		<h2><span class="dark_blue">Employee Information</span></h2>
		<span style="float:right"><?php echo image_tag('icon_addRight.jpg', 'width="2"', 'height="22"')?></span>
			<?php echo link_to('Add New Employee', 'Employee/addEmployee', array('class'=>'addNew'))?>
		</h2>
	</div>
	<div class="box_text_content">
	<div class="box_text">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="datagrid">
             
			  <tr>
				<th style="text-align:left";>Department</th>
				<th style="text-align:left";>Employee Name</th>
				<th style="text-align:left";>Designation</th>
				<th style="text-align:left";>Office No.</th>
				<th style="text-align:left";>Mobile No.</th>
				<th style="text-align:left;">Operation</th>
              </tr>
			  
			 <!-- Populating the List -->
				
			  <?php 
			  
			  if (count($employees)): ?>
				<?php $previous = "";?>
				<?php foreach ($employees as $j => $employee) : ?>
				
				<?php $current = $employee->getDepartment(); ?>
					<?php if ($current != $previous): ?>
					<tr>
						<td colspan="7" class="subhdng">
						<strong><?php echo $current ;?></strong>
						</td>
					</tr>
				<?php endif; ?>
				
              <tr>
                <td align="left">&nbsp;</td>
			   
				<td align="left"><?php echo link_to($employee->getName(),'Employee/detail?employee='.Utility::EncryptQueryString($employee->getId())); ?> </td>
				<td align="left">&nbsp;<?php echo $employee->getDesignation(); ?></td>
				<td align="left">&nbsp;<?php echo $employee->getContactOff(); ?></td>
				<td align="left">&nbsp;<?php echo $employee->getContactCell(); ?></td>
				<!--<td align="center"><?php //echo Constant::GetRecordStatusTitle($employee->getStatus()); ?></td>
				<td align="center"><?php //echo $employee->getUpdatedAt('d-M-Y'); ?></td>-->
				<td align="right">
				<?php echo link_to('&nbsp;','Employee/edit?employee='.Utility::EncryptQueryString($employee->getId()),array('title'=>'Edit', 'class' => 'edit'))?>
				
				<?php echo link_to('&nbsp;','Employee/delete?id='.Utility::EncryptQueryString($employee->getId()), array('confirm'=>'Are you sure you want to Delete this?', 'title'=>'Delete', 'class' => 'delete')); ?>
				</td>
              </tr>
			  
			  <?php $previous = $current;?>
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
			</div>
		</div>
	</div>
<div class="clear"></div>    
</div>
			
<div id="popup_add" class="popup" style="width:600px" >

<?php echo form_tag('Document/add') ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding-left:10px" height="30"><span class="heading">Add New Employee</span></td>
    <td align="right" style="padding-right:10px"><a class="popup_closebox" href="#"><?php echo image_tag('btn_x.gif', 'border=0'); ?></a></td>
  </tr>
</table>


<table width="100%"  cellpadding="0" cellspacing="0" align="left" border="0" class="form" bgcolor="#eeeeee">
  
 
  <tr>
    <td width="155" align="left" height="30" style="padding-left:10px; padding-top:10px">Document Name:<span class="error"> *</span></td>
	<td width="445" align="left" height="30" style="padding-left:10px; padding-top:10px"> <?php echo input_tag('title','','size=38') ?></td>
	<script type="text/javascript">
	var title = new LiveValidation('title', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	title.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script>
  </tr>
  
  <!--<tr>
    <td valign="top" align="left" height="30" style="padding-left:10px;">Description:</td>
	<td align="left" height="30" style="padding-left:10px;"> <?php //echo textarea_tag('description', '', 'size=40x6') ?></td>
  </tr>-->
 
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  <tr>
		<td>&nbsp;</td>
		<td colspan="2">
		<table width="100%" align="left" border="0" class="form">
			<tr>
				<td width="2%"><?php echo submit_tag('', array('class'=>'btn_add', 'style'=>'border:none'))

; ?> </td>
				<td width="98%"><a class="popup_closebox" href="#"><?php echo image_tag('btn_cancel.gif', 'border=0'); ?></a></td>
			</tr>
    	</table>
		</td>
  </tr>
</table>

</div>
<script type="text/javascript">
    //<![CDATA[
    new Popup('popup_add','popup_link_add',{modal:true,duration:1})
    //]]>
  </script>