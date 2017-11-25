<script>
          $(document).ready( function(){//load body truoc
          $(".menu-sub").hide();
	  $(".menu").hover( function(){
		$(this).find('div:first').next().slideToggle(200);
	  });
        });
</script>

