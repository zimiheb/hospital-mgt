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
		<h2><span class="dark_blue">Designation Information</span></h2>
		<span style="float:right"><?php echo image_tag('icon_addRight.jpg', 'width="2"', 'height="22"')?></span>
			<a class="addNew" id="popup_link_add" href="#">Add New Designation</a>
		</h2>
	</div>
	<div class="box_text_content">
	<div class="box_text">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="datagrid">
	  <tr>
		<th style="text-align:left;">Designation Title</th>
		<th style="text-align:left;">Department</th>
		<th style="text-align:left;">Status</th>
		<th style="text-align:left;">Last Updated</th>
		<th style="text-align:left;">Operation</th>
	  </tr>
	  
	 <!-- Populating the List -->
		
	  <?php 
	  
	  if (count($designations)): ?>
		<?php 
		
		foreach ($designations as $j => $designation) : ?>
		
		<tr>
		<td align="left"><?php echo $designation->getTitle(); ?> </td>
		<td align="left">&nbsp;<?php echo $designation->getDepartment(); ?></td>
		<td align="center"><?php echo Constant::GetRecordStatusTitle($designation->getStatus()); ?></td>
		<td align="center"><?php echo $designation->getUpdatedAt('d-M-Y'); ?>
		<td align="right" class="edit">
		<?php echo link_to('&nbsp;','Designation/edit?id='.Utility::EncryptQueryString($designation->getId()),array('title'=>'Edit', 'class' => 'edit'))?>
		<?php echo link_to('&nbsp;','Designation/delete?id='.Utility::EncryptQueryString($designation->getId()), array('confirm'=>'Are you sure you want to Delete this?', 'title'=>'Delete', 'class' => 'delete')); ?>
		</td>
	  </tr>
	  
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
<?php echo form_tag('Designation/add') ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td style="padding-left:10px" height="30"><span class="heading">Add New Designation</span></td>
    <td align="right" style="padding-right:10px"><a class="popup_closebox" href="#"><?php echo image_tag('btn_x.gif', 'border=0'); ?></a></td>
  </tr>
</table>

<table width="100%" align="left"  border="0"  cellpadding="0" cellspacing="0"  bgcolor="#eeeeee">
  
  <tr>
  	<td align="left" height="30" style="padding-left:10px; padding-top:10px">Department:</td>
	<td height="30" style="padding-left:10px;"> <?php echo object_select_tag('', '', array ( 'name'=>'department_id', 'id'=>'department_id', 'related_class' => 'Department' , 'peer_method' => 'GetDepartment'));?> </td>
</tr>
  
  <tr>
    <td width="148" height="30" style="padding-left:10px;">Designation Title:<span class="error"> *</span></td>
	<td width="452" height="30" style="padding-left:10px;"> <?php echo input_tag('title','','size=38') ?></td>
	<script type="text/javascript">
	var title = new LiveValidation('title', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	title.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
		<td>&nbsp;</td>
		<td colspan="2">
		<table width="100%" align="left"  border="0">
			<tr>
				<td width="2%"><?php echo submit_tag('', array('class'=>'btn_add', 'style'=>'border:none'))

; ?> </td>
				<td width="98%"><a class="popup_closebox" href="#"><?php echo image_tag('btn_cancel.gif', 'border=0') ;?></a></td>
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