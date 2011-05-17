<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php use_helper ('Form','Javascript','Object', 'DateForm') ?>

<?php use_javascript('prototype.js') ?>		
<?php use_javascript('effects.js') ?>		
<?php use_javascript('dragdrop.js') ?>		
<?php use_javascript('popup.js') ?>		
<link href="<?php echo _compute_public_path('popup', 'css', 'css', false);  ?>" rel="stylesheet" type="text/css" />	
<div id="main_content">
	<div class="box_content">
	<div class="box_title">
		<h2><span class="dark_blue">Patient Information</span></h2>
		<span style="float:right"><?php echo image_tag('icon_addRight.jpg', 'width="2"', 'height="22"')?></span>
			<a class="addNew" id="popup_link_add" href="#">Add New Patient</a></h2>
	</div>
	<div class="box_text_content">
	<div class="box_text">

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="datagrid">
             
	  <tr>
		<th style="text-align:left;">Patient ID</th>
		<th style="text-align:left;">Name</th>
		<th style="text-align:left;">CNIC</th>
		<th style="text-align:left;">Date of Birth</th>
		<th style="text-align:left;">Gender</th>
		<th width="9%" style="text-align:left;">Operation</th>
	  </tr>
			  
			 <!-- Populating the List -->
			
		<?php if (count($pager->getResults())): ?>
			<?php foreach ($pager->getResults() as $patient): ?>
				<tr>
                <td align="center"><?php echo $patient->getId(); ?> </td>
				<td align="left"><?php echo link_to($patient->getName(),'Patient/detail?patient='.Utility::EncryptQueryString($patient->getId())); ?></td>
				<td align="left"><?php echo $patient->getCnic(); ?></td>
				<td align="center"><?php echo $patient->getDob('d-M-Y'); ?></td>
				<td align="center"><?php echo $patient->getGender(); ?>
				<td align="right">
				<?php echo link_to('&nbsp;','Patient/edit?id='.Utility::EncryptQueryString($patient->getId()),array('title'=>'Edit', 'class' => 'edit'))?>
				
				<?php echo link_to('&nbsp;','Patient/delete?id='.Utility::EncryptQueryString($patient->getId()), array('confirm'=>'Are you sure you want to Delete this?', 'title'=>'Delete', 'class' => 'delete')); ?>
				</td>
              </tr>
			<?php endforeach ?>
		
			   
			
			<tr>
				<td>
					<?php if ($pager->haveToPaginate()): ?>
					<?php echo link_to('&laquo;', 'Patient/list?page='.$pager->getFirstPage()) ?>
					<?php echo link_to('&lt;', 'Patient/list?page='.$pager->getPreviousPage()) ?>
					<?php $links = $pager->getLinks(); foreach ($links as $page): ?>
					<?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'Patient/list?page='.$page) ?>
					<?php if ($page != $pager->getCurrentMaxLink()): ?> - <?php endif ?>
					<?php endforeach ?>
					<?php echo link_to('&gt;', 'Patient/list?page='.$pager->getNextPage()) ?>
					<?php echo link_to('&raquo;', 'Patient/list?page='.$pager->getLastPage()) ?>
					<?php endif ?>
				</td>
				
				<td colspan="2" style="text-align:right;">Displaying results <?php echo $pager->getFirstIndice() ?> to  <?php echo $pager->getLastIndice() ?>.</td>
			</tr>
			
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

<?php echo form_tag('Patient/addPatient') ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding-left:10px" height="30"><span class="heading">Add New Patient</span></td>
    <td align="right" style="padding-right:10px"><a class="popup_closebox" href="#"><?php echo image_tag('btn_x.gif', 'border=0'); ?></a></td>
  </tr>
</table>


<table width="100%"  cellpadding="0" cellspacing="0" align="left" border="0" class="form" bgcolor="#eeeeee">
  
 
  <tr>
    <td width="155" align="left" height="30" style="padding-left:10px; padding-top:10px">Name:<span class="error"> *</span></td>
	<td width="445" align="left" height="30" style="padding-left:10px; padding-top:10px"> <?php echo input_tag('name','',array('style'=>'width:200px')) ?></td>
	<script type="text/javascript">
	var name = new LiveValidation('name', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	name.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script>
  </tr>
  
  <tr>
    <td width="155" align="left" height="30" style="padding-left:10px; padding-top:10px;" valign="top">CNIC:<span class="error"> *</span></td>
	<td width="445" align="left" height="30" style="padding-left:10px; padding-top:10px"> <?php echo input_tag('cnic','',array('style'=>'width:200px')) ?></td>
	<script type="text/javascript">
	var cnic = new LiveValidation('cnic', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	cnic.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script>
  </tr>
  
  <tr>
    <td width="155" align="left" height="30" style="padding-left:10px; padding-top:10px" valign="top">Date of Birth:</td>
	<td width="445" align="left" height="30" style="padding-left:10px; padding-top:10px"><?php echo input_date_tag('dob','',array('style'=>'width:100px', 'year_start'=>'1910', 'year_end'=>'2020', 'use_short_month'=>'true')); ?></td>
  </tr>
  
  <tr>
	<td width="155" align="left" height="30" style="padding-left:10px; padding-top:10px" valign="top">Gender:</td>
	<td width="445" align="left" height="30" style="padding-left:10px; padding-top:10px"> 
	<?php echo radiobutton_tag('gender[]', 'Male', true, array('class'=>'checkbox')) ?>Male &nbsp;&nbsp;&nbsp;
	<?php echo radiobutton_tag('gender[]', 'Female', false, array('class'=>'checkbox')) ?>Female
	</td>
  </tr>
  
   <tr>
	<td width="155" align="left" height="30" style="padding-left:10px; padding-top:10px" valign="top">Mobile Number:</td>
	<td width="445" align="left" height="30" style="padding-left:10px; padding-top:10px"><?php echo input_tag('contact_cell','','60'); ?>
			<script type="text/javascript">
				var contact_cell = new LiveValidation('contact_cell', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
				contact_cell.add( Validate.Format, { pattern: /^[+\d][\d\-\/\(\)]*$/,failureMessage: "<?php echo Constant::VALIDATION_INTEGER_FIELD;  ?>"} );
				</script></td>
 
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