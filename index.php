<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />   
    <jdoc:include type="head" />   
    
    <link href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template; ?>/css/dl-style.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <title>dl-Responsive-template</title>
  </head>

  <body>
	<!--menu position-->
	<jdoc:include type="modules" name="menu" style="none" />
 <!--   <jdoc:include type="modules" name="top-login" style="none" />  --> 
	<?php if ($this->countModules('showcase')) : ?>
    <jdoc:include type="modules" name="showcase" style="none" />
	<?php endif ?>
    <div id="maincontent" class="container">
      <!-- row of columns -->
   <?php if ($this->countModules('showcase')) : ?>   
     <div id="home-jumbotron">
      <div class="row">
        <div class="col-md-4" >
			<?php if($this->countModules('block1')) : ?>
			 <jdoc:include type="modules" name="block1" style="xhtml" />
			<?php endif ?>
        </div>
        <div class="col-md-4">
			<?php if($this->countModules('block2')): ?>
				<jdoc:include type="modules" name="block2" style="xhtml" />
			<?php endif ?>
       </div>
        <div class="col-md-4">
			<?php if ($this->countModules('block3')) : ?>
		     <jdoc:include type="modules" name="block3" style="xhtml" />
			<?php endif ?>
        </div>
      </div>

	  <div class="row">
        <div class="col-md-4">
			<?php if($this->countModules('block4')) : ?>
			 <jdoc:include type="modules" name="block4" style="xhtml" />
			<?php endif ?>
        </div>
        <div class="col-md-4">
			<?php if($this->countModules('block5')): ?>
				<jdoc:include type="modules" name="block5" style="xhtml" />
			<?php endif ?>
       </div>
        <div class="col-md-4">
			<?php if ($this->countModules('block6')) : ?>
		     <jdoc:include type="modules" name="block6" style="xhtml" />
			<?php endif ?>
        </div>
      </div>
	  
	  <div class="row">
        <div class="col-md-4">
			<?php if($this->countModules('block7')) : ?>
			 <jdoc:include type="modules" name="block7" style="xhtml" />
			<?php endif ?>
        </div>
        <div class="col-md-4">
			<?php if($this->countModules('block8')): ?>
				<jdoc:include type="modules" name="block8" style="xhtml" />
			<?php endif ?>
       </div>
        <div class="col-md-4">
			<?php if ($this->countModules('block9')) : ?>
		     <jdoc:include type="modules" name="block9" style="xhtml" />
			<?php endif ?>
        </div>
      </div>
	  
	  <div class="row">
        <div class="col-md-4">
			<?php if($this->countModules('block10')) : ?>
			 <jdoc:include type="modules" name="block10" style="xhtml" />
			<?php endif ?>
        </div>
        <div class="col-md-4">
			<?php if($this->countModules('block11')): ?>
				<jdoc:include type="modules" name="block11" style="xhtml" />
			<?php endif ?>
       </div>
        <div class="col-md-4">
			<?php if ($this->countModules('block12')) : ?>
		     <jdoc:include type="modules" name="block12" style="xhtml" />
			<?php endif ?>
        </div>
        
      </div>
	 </div><!--end home jumbotron-->  
  <?php endif ?>    <!--End blocks-->
      <hr>
		<!--error message -->
		<jdoc:include type="message" />
		<!-- main content--> 
        <?php if (!$this->countModules('showcase')) :?>
        <jdoc:include type="modules" name="sidebar-l" style="xhtml" />
         <jdoc:include type="component" />
		 <?php endif; ?>     
    </div> <!-- container -->
      
<footer>
  
            
    <!--footer2-->
                
        <div class="footer-nav">
            <?php if($this->countModules('footer')) : ?>
                            
                <jdoc:include type="modules" name="footer" />
                            
            <?php endif; ?>
                    
        </div>
    <nav id="footer-logo" class="nav navbar">
                <div class="container">
          <!--footer logo-->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="http://ny2.usqiaobao.com">                                       
							<img src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/imgs/logo.jpg" style="width:180px;height:61px;float:left;cursor:pointer"                                />    
						  </a>            
                    </div>
					
                    <div class="link2">
                       	
                        <ul class="nav navbar-nav navbar-left">
                            <li>友情连接:</li>
                            <li><a href="#" title="美国中文电视">美国中文电视</a></li>
                            <li><a href="#" title="侨报网">侨报网</a></li>
                            <li><a href="#" title="中国新闻网">中国新闻网</a></li>
                            <li><a href="#" title="中国侨网">中国侨网</a></li>
                        </ul>
                    </div>
                    
                <div class="copyright navbar-left">
                 <?php echo 'Copyright &#169; 1990'. '-'.date('Y'). '侨报纽约网,'.' 版权所有 保留所有权利. THE CHINA PRESS All rights reserved.' ?>
                </div> <!--end copyright--> 
            </div>     <!--end  container--> 
            </nav>
    
</footer>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      
      
    <script src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/js/dl-js.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
<script src="js/ie10-viewport-bug-workaround.js"></script>
-->
    
  </body>
</html>
