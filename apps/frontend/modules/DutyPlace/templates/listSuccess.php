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
		<h2><span class="dark_blue">Duty Places Information</span></h2>
		<span style="float:right"><?php echo image_tag('icon_addRight.jpg', 'width="2"', 'height="22"')?></span>
			<a class="addNew" id="popup_link_add" href="#">Add new Place</a>
		</h2>
	</div>
	<div class="box_text_content">
	<div class="box_text">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="datagrid">
             
			  <tr>
				<th style="text-align:left";>Place of Duty</th>
				<th style="text-align:left";>Status</th>
				<th style="text-align:left";>Last Updated</th>
                <th style="text-align:left;">Operation</th>
              </tr>
			  
			 <!-- Populating the List -->
				
			  <?php 
			  
			  if (count($duty_places)): ?>
				<?php 
				
				foreach ($duty_places as $j => $duty_place) : ?>
				
              <tr>
                <td align="left"><?php echo $duty_place->getTitle(); ?> </td>
				<td align="center"><?php echo Constant::GetRecordStatusTitle($duty_place->getStatus()); ?></td>
				<td align="center"><?php echo $duty_place->getUpdatedAt('d-M-Y'); ?>
				<td align="right">
				<?php echo link_to('&nbsp;','DutyPlace/edit?id='.Utility::EncryptQueryString($duty_place->getId()),array('title'=>'Edit', 'class' => 'edit'))?>
				
				<?php echo link_to('&nbsp;','DutyPlace/delete?id='.Utility::EncryptQueryString($duty_place->getId()), array('confirm'=>'Are you sure you want to Delete this?', 'title'=>'Delete', 'class' => 'delete')); ?>
				</td>
              </tr>
			  
			  <?php endforeach; ?>
			  <tr>
			  	<td class="last">&nbsp;</td>
			  </tr>
			   <?php else:?>
			  
					<tr>
						<td colspan="6" style="background:none; text-align:center;"><?php echo Constant::RECORD_NOT_FOUND; ?></Td></tr>
					
			  <?php endif; ?>
            </table>
			</div>
	
	</div>
	
	</div>

<div class="clear"></div>    
</div>
			
<div id="popup_add" class="popup" style="width:600px" >

<?php echo form_tag('DutyPlace/add') ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
  <tr>
    <td style="padding-left:10px" height="30"><span class="heading">Add a Duty Place</span></td>
    <td align="right" style="padding-right:10px"><a class="popup_closebox" href="#"><?php echo image_tag('btn_x.gif', 'border=0'); ?></a></td>
  </tr>
</table>


<table width="100%"  cellpadding="0" cellspacing="0" align="left" border="0" class="form" bgcolor="#eeeeee">
  
 
  <tr>
    <td width="155" align="left" height="30" style="padding-left:10px; padding-top:10px">Place Name:<span class="error"> *</span></td>
	<td width="445" align="left" height="30" style="padding-left:10px; padding-top:10px"> <?php echo input_tag('title','','size=38') ?></td>
	<script type="text/javascript">
	var title = new LiveValidation('title', { validMessage: "<?php echo Constant::VALIDATION_SUCCESS; ?>"});
	title.add( Validate.Presence,{ failureMessage: "<?php echo Constant::VALIDATION_REQUIRED_FIELD; ?>"});
	</script>
  </tr>
  
    <tr>
    <td width="155" align="left" height="50" style="padding-left:10px; vertical-align:top;">Description:</td>
	<td width="445" align="left" height="50" style="padding-left:10px; vertical-align:top;"> <?php echo textarea_tag('description',$duty_place->getDescription(),'size=35x2'); ?></td>
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