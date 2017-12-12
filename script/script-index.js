
          $(document).ready( function(){//load body truoc
          $(".menu-sub").hide();
	  $(".menu").hover( function(){
		$(this).find('div:first').next().slideToggle(200);
	  });
          $('select').on('change', function (e) {
          var optionSelected = $("option:selected", this);
          var valueSelected = this.value;
          window.location=""+valueSelected;
          });
          $("#img_search").click( function(){
		var search=$('#search').val();
                var alt = $(this).attr("alt");
                window.location=""+alt+search;
	  });
          });


