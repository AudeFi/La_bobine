$( "#name" ).keyup(function() {

		var name = $('#name').val();

		if ( $('#name').val() == "" ){
			name = " ";
		}

		console.log (name);

	    $.ajax({
        	url     : "config/form-add.php",
        	type    : "POST",
        	data    : { 'name':name },
        	success : function(data, status, xhr) {
				
				data = JSON.parse(data);
   				console.log(data);
    			$( "#name" ).autocomplete({
    				minLength: 3,
      				source: data
    			});	
        },
        error: function (jqXHR, status, errorThrown) {
           console.log ('error');

        }
    });
});