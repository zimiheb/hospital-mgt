<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
  <title>Hospital Management System</title>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
	<?php include_javascripts() ?>
<script language="JavaScript" src="<?php echo _compute_public_path('livevalidation_standalone.compressed', 'js', 'js', false);  ?>"></script>
<script language="JavaScript" src="<?php echo _compute_public_path('json2', 'js', 'js', false);  ?>"></script>

<!--FOR Favicon-->
<link rel="favicon" href="<?php echo _compute_public_path('favicon', 'images', 'ico', true);  ?>"/> 
<link rel="shortcut icon" href="<?php echo _compute_public_path('favicon', 'images', 'ico', true);  ?>" />
<link rel="icon" href="<?php echo _compute_public_path('favicon', 'images', 'ico', true);  ?>" />

<!--FOR CSS File-->
<link href="<?php echo _compute_public_path('style', 'css', 'css', false);  ?>" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<link href="<?php echo _compute_public_path('iecss', 'css', 'css', false);  ?>" rel="stylesheet" type="text/css" />
<![endif]-->
  </head>
 
 <body>
    
	
	<div id="main_container">
	<div class="header">
    	<div id="logo"><img src="<?php echo _compute_public_path('logo', 'images', 'png', true);  ?>" alt="" title="" width="162" height="54" border="0" /></div>
    
    	<div class="right_header">
        	
            <div class="top_menu">
            <a href="#" class="login">login</a>
            <!--<a href="#" class="sign_up">signup</a>-->
            </div>
        
            <div id="menu">
                <ul>                                              
                    <li><a class="current" href="#" title="">Home</a></li>
                    <li><a href="#" title="">Contact Us</a></li>
                </ul>
            </div>
        
        </div>
    
    </div>
    
  <!--  <div id="middle_box">
    	<div class="middle_box_content"><img src="images/banner_content.jpg" alt="" title="" /></div>
    </div>
    
    <div class="pattern_bg">
    
    	<div class="pattern_box">
            <div class="pattern_box_icon"><img src="images/icon1.png" alt="" title="" width="70" height="112" /></div>
            <div class="pattern_content">
            <h1>My <span class="blue">Medicine</span></h1>
            <p class="pat">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            </div>
        </div>
        
    	<div class="pattern_box">
            <div class="pattern_box_icon"><img src="images/icon2.png" alt="" title="" width="70" height="112" /></div>
            <div class="pattern_content">
            <h1>Search <span class="blue"> Treatments</span></h1>
            <p class="pat">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            </div>
        </div>        
        
    </div>-->
    
	<?php if ($sf_user->hasFlash('SUCCESS_MESSAGE')): ?>
				<tr>
					<td align="center" colspan="2">
						<div class="success_bar">
							<?php echo $sf_user->getFlash('SUCCESS_MESSAGE');?>
						</div>
					</td>
				 </tr>
			<?php endif; ?>
	
	
			<?php if ($sf_user->hasFlash('ERROR_MESSAGE')): ?>
				<tr>
					<td align="center" colspan="2">
						<div class="error_bar">
							<?php echo $sf_user->getFlash('ERROR_MESSAGE');?>
						</div>
					</td>
				 </tr>
			<?php endif; ?>
			
		<!--This is the place where the main content will appear-->
          <?php echo $sf_content ?>  
            
     <div id="footer">
     	<!--<div class="copyright">
        <img src="images/footer_logo.gif" alt="" title="" />
        </div>-->
        <div class="center_footer">&copy; Hospital Management System 2011. All Rights Reserved <br />COMSATS Institute of Information Technology, Wah Campus</div>
    </div>


</div>
  </body>
</html>
