//About
(function ($) {
    'use strict';
   var //$dlID = $('#dl-nav ul'),
      // $feedbackMenuItem = $('#dl-nav ul li:nth-last-child(3)'),
       $ePaperMenuItem = $('#dl-nav ul li:last-child'),
       $homepage = $('#homeCarousel'),
       $feedback = $('.contact-form'),
       $headerbg = $('#dl-headnav.navbar'),
       $ePaper = $('#phocagallery');
   
   if (!$homepage.length) { //if not homepage
        $headerbg.css("cssText", "background: #fff !important;");       
        $('#dl-headnav >.container').attr('id','dl-nav');
        if($feedback.length){
             $('#dl-nav ul').before('<h2 class="dl-info-title">意见建议</h2>');
             $('#dl-nav ul li:nth-last-child(3)').css({background:'#b60005'});
             
             $('#dl-nav .navbar-left').css({marginLeft:'0'});
        };      
        
         if ($ePaper.length){//
         var $lastLiClass = $ePaperMenuItem.attr('class');
             console.log($lastLiClass); 
             console.log($ePaperMenuItem);
             $('#dl-nav ul').before('<h2 class="dl-info-title">电子报</h2>');
             $('#dl-nav ul li:last-child').css({background:'#b60005'});
            // $('a','#dl-nav ul li:last-child').css('color','#FFF');
             $('#dl-nav .navbar-left').css({marginLeft:'0'});
         }
       
    } 
    
})(jQuery);