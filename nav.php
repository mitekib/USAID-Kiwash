<?php
$page=@$_GET['v'];
$page2=@$_GET['page'];
?>
<style>
.menuzord-menu li
{
	/*text-transform:capitalize;*/
}
</style>
<header class="header">
    <div class="header-top bg-deep sm-text-center">
      <div class="container">
        <div class="row">
          
          <div class="col-md-12">
            <div class="widget no-border m-0" >
              
                <img src="images/slim-banner.jpg"  class='img-responsive'/>


            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav" style="border-style: solid;border-top-color: #9cacbb;border-left: 0px solid;border-right: 0px solid;border-bottom-color: #f5f8fd;">
      <div class="header-nav-wrapper   navbar-scrolltofixed bg-lightest">
        <div class="container">
          <nav id="menuzord-right" class="menuzord orange bg-lightest">
            <!--<a class="menuzord-brand" href="<;?>">
              <img src="$site;?>images/logo-wide.png" style="max-height:47px;" alt="">
            </a>-->
            <!--<div id="side-panel-trigger" class="side-panel-trigger"><a href="#"><i class="fa fa-bars font-24 text-gray"></i></a></div>-->
            <ul class="menuzord-menu">
              <li class="<?php if($page=="") {echo "active";} ?>"><a href="<?=$site;?>">Home</a></li>

              <li class="<?php if($page=="about") {echo "active";} ?>"><a href="<?=$site;?>?page=about&v=about">About</a>
               
              </li>

               <li class="<?php if($page=="water_supply" || $page=="Sanitation" || $page=="Nutrition_and_Hygiene" || $page=="WASH_Financing" || $page=="Governance_and_Policy" || $page=="Environmental_Sustainability") {echo "active";} ?>"><a href="#home">Our Focus</a>
                <ul class="dropdown">
                  <li><a href="<?=$site;?>?page=focus&v=water_supply">Water Supply </a></li>
                  <li><a href="<?=$site;?>?page=focus&v=Sanitation">Sanitation </a></li>
                  <li><a href="<?=$site;?>?page=focus&v=Nutrition_and_Hygiene">Nutrition and Health </a></li>
                  <li><a href="<?=$site;?>?page=focus&v=WASH_Financing">Finance </a></li>
                  <li><a href="<?=$site;?>?page=focus&v=Governance_and_Policy">Governance and Policy</a></li>
                  <li><a href="<?=$site;?>?page=focus&v=Environmental_Sustainability">Environmental Sustainability</a></li>
                </ul>
              </li>

              <li class="<?php if($page=="Busia" || $page=="Kakamega" || $page=="Kisumu" || $page=="Migori" || $page=="Nyamira" || $page=="Siaya" || $page=="Makueni" || $page=="Nairobi" || $page=="Kitui") {echo "active";} ?>"><a href="#home">Where We Work</a>
                <ul class="dropdown">
                  <li><a href="#">Western Kenya  </a>
                  	<ul class="dropdown">
                      <li><a href="<?=$site;?>?page=work&v=Busia">Busia</a></li>
                      <li><a href="<?=$site;?>?page=work&v=Kakamega">Kakamega</a></li>
                      <li><a href="<?=$site;?>?page=work&v=Kisumu">Kisumu</a></li>
                      <li><a href="<?=$site;?>?page=work&v=Migori">Migori</a></li>
                      <li><a href="<?=$site;?>?page=work&v=Nyamira">Nyamira</a></li>
                      <li><a href="<?=$site;?>?page=work&v=Siaya">Siaya</a></li>

                    </ul>
                  </li>

                   <li><a href="#">Eastern Kenya  </a>
                  	<ul class="dropdown">
                      <li><a href="<?=$site;?>?page=work&v=Kitui">Kitui</a></li>
                      <li><a href="<?=$site;?>?page=work&v=Makueni">Makueni</a></li>
                      <li><a href="<?=$site;?>?page=work&v=Nairobi">Nairobi</a></li>
                      

                    </ul>
                  </li>
                 
                </ul>
              </li>

                        

              <li class="<?php if($page=="resources" || $page=="knowledge_center" || $page=="grants" || $page=="opportunities") {echo "active";} ?>"><a href="#home">Resources</a>
                <ul class="dropdown">
                   
					<li ><a href="<?=$site;?>?page=resources&v=knowledge_center">Knowledge Center </a></li>
					<li ><a href="<?=$site;?>?page=resources&v=grants">Grants </a></li>
					<li ><a href="<?=$site;?>?page=resources&v=opportunities">Opportunities </a></li>
					

                </ul>
              </li>
 <li class="<?php if($page=="partners") {echo "active";} ?>"><a href="<?=$site;?>?page=partners&v=partners">Partners</a>
               
              </li>

             <li class="<?php if($page=="contacts") {echo "active";} ?>"><a href="<?=$site;?>?page=contacts&v=contacts">Contacts</a>
               
              </li>
             

              <li class="<?php if($page2=="blog") {echo "active";} ?>"><a href="<?=$site;?>blog">Blog</a>
                
              </li>



            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
 
