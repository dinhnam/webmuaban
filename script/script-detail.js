$(document).ready( function(){
          $(".menu-sub").hide();
	  $(".menu").hover( function(){
		$(this).find('div:first').next().slideToggle(200);
	  });
          $k=0;
          $temp=0;
          $('#id0').show();
          $("#next").click( function(){
               $temp=$k+1;
               if($('#id'+$temp).length){
                   $('.img_product').hide();
                   $k=$k+1;
                   if($k>3){
                   $k=0;
                   }
                   $('#id'+$k).show();
               }   
	  });
          $("#back").click( function(){
               $temp=$k-1;
               if($('#id'+$temp).length){
                   $('.img_product').hide();
                   $k=$k-1;
                   if($k<0){
                   $k=3;
                   }
                   $('#id'+$k).show();
               }
               
	  });
          $(window).scroll(function(){
		if($(window).scrollTop() - $(".image").position().top < 0){
		$('.image').css({'position':'relative'});
		}else{
		$('.image').css({'position':'fixed'});
		}
	  });
});

