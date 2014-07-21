jQuery(document).ready(function($) {

	(function(){
  "use strict";


		$(function ($) {

		   		if( !device.tablet() && !device.mobile() ) {
		   			$.okvideo({ source: video_url, //set your vimeo video source here
	        			loop: true,
	                    hd:true, 
	                    adproof: true
	                    
	                 });
		   		}
		   		else
		   		{

		   			/* displays a poster image if mobile device is detected*/ 
					$('#okplayer-mask').css('display','none');
					$('#okplayer').css('display','none');
					$('header + div').addClass('video-poster-image');
		   		}
		});
		// $(function ($)  : ends


	})();
	//  JSHint wrapper $(function ($)  : ends

});