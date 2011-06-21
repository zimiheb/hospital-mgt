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
		<h2><span class="dark_blue">Pharma Information</span></h2>
		<span style="float:right"><?php echo image_tag('icon_addRight.jpg', 'width="2"', 'height="22"')?></span>
			<a class="addNew" id="popup_link_add" href="#">Add New Medicine</a>
		</h2>
	</div>
	<div class="box_text_content">
	<div class="box_text">

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="datagrid">
             
  <tr>
  	<th style="text-align:left;">Type</th>  	
	<th style="text-align:left;">Medicine Name</th>
	<th style="text-align:left;">Strength (mg)</th>
	<th style="text-align:left;">Company</th>
	<th style="text-align:left;">Price (per unit)</th>
	<th style="text-align:left;">Last Updated</th>
	<th style="text-align:left;">Operation</th>
  </tr>
  
 <!-- Populating the List -->
	
  <?php 
  
  if (count($pharmas)): ?>
	<?php 
	
	foreach ($pharmas as $j => $pharma) : ?>
	
  <tr>
  	<td align="left"><?php echo $pharma->getType(); ?> </td>
	<td align="left"><?php echo $pharma->getName(); ?> </td>
	<td align="left"><?php echo $pharma->getStrength(); ?> </td>
	<td align="left"><?php echo $pharma->getcompany(); ?> </td>
	<td align="left"><?php echo $pharma->getPrice(); ?> </td>
	<td align="center"><?php echo $pharma->getUpdatedAt('d-M-Y'); ?>
	<td align="right">
	<?php echo link_to('&nbsp;','Pharma/edit?id='.Utility::EncryptQueryString($pharma->getId()),array('title'=>'Edit', 'class' => 'edit'))?>
	
	<?php echo link_to('&nbsp;','Pharma/delete?id='.Utility::EncryptQueryString($pharma->getId()), array('confirm'=>'Are you sure you want to Delete this?', 'title'=>'Delete', 'class' => 'delete')); ?>
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

<?php echo form_tag('Pharma/add') ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
  <tr>
    <td style="padding-left:10px" height="30"><span class="heading">Add New Medicine</span></td>
    <td align="right" style="padding-right:10px"><a class="popup_closebox" href="#"><?php echo image_tag('btn_x.gif', 'border=0'); ?></a></td>
  </tr>
</table>


<table width="100%"  cellpadding="0" cellspacing="0" align="left" border="0" class="form" bgcolor="#eeeeee">
  
 <tr>
    <td width="155" align="left" height="30" style="padding-left:10px; padding-top:10px;">Medicine Type:<span class="error"> *</span></td>
	<td width="445" align="left" height="30" style="padding-left:10px; padding-top:10px;"> <?php echo input_tag('type','','size=38') ?></td>
	<script type="text/javascript">
	var type = new LiveValidation('type', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	type.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script>
  </tr>
  
  
  <tr>
    <td width="155" align="left" height="30" style="padding-left:10px;">Medicine Name:<span class="error"> *</span></td>
	<td width="445" align="left" height="30" style="padding-left:10px;"> <?php echo input_tag('name','','size=38') ?></td>
	<script type="text/javascript">
	var name = new LiveValidation('name', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	name.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script>
  </tr>
  
  <tr>
    <td width="155" align="left" height="30" style="padding-left:10px; padding-top:10px">Strength (mg):</td>
	<td width="445" align="left" height="30" style="padding-left:10px; padding-top:10px"> <?php echo input_tag('strength','','size=38') ?></td>
  </tr>
  
  <tr>
    <td width="155" align="left" height="30" style="padding-left:10px; padding-top:10px">Price (per unit):</td>
	<td width="445" align="left" height="30" style="padding-left:10px; padding-top:10px"> <?php echo input_tag('price','','size=38') ?></td>
	<script type="text/javascript">
	var price = new LiveValidation('price', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	price.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	price.add( Validate.Numericality, { failureMessage: "<?php echo Constant::VALIDATION_INTEGER_FIELD; ?>" } );
	</script>
  </tr>

  <tr>
    <td width="155" align="left" height="30" style="padding-left:10px; padding-top:10px">Manufacturing Company:</td>
	<td width="445" align="left" height="30" style="padding-left:10px; padding-top:10px"> <?php echo input_tag('company','','size=38') ?></td>
  </tr>
  
 
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