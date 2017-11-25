<script>
        $(document).ready( function(){
          $(".menu-sub").hide();
	  $(".menu").hover( function(){
		$(this).find('div:first').next().slideToggle(200);
	  });
          
          $("#input-image").change(function() {
             $("#image1").hide();
             $("#image2").hide();
             $("#image3").hide();
             $("#image4").hide();
             var img=$("#image1");
             for($i=0;$i<this.files.length;$i++){
             var reader = new FileReader();
             reader.onload = function(e) {
              img.attr('src', e.target.result);
              img.show();
              img=img.next();
             };
             reader.readAsDataURL(this.files[$i]);
             }
          });
    
         
        });
</script>
