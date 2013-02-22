function checktype() {
	var cat;
	cat = jQuery('#cat:checked').val();
	//alert(cat);
	if(cat=='basic') {
		jQuery('#btip').hide();
	} else {
		jQuery('#btip').show();
	}

}

function updateFman(user) {
	var data = $('#userform').serialize();
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	var manejo = jQuery('#manejo').val();
	if(manejo == '') {
		alert('You must fill the Manejo!');
		return false;
	}
	jQuery.ajax({
		type: "POST",
		url: ajax+"addFman.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Manejo Categoria successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			} else {
				jQuery('#response').removeClass('green');
				jQuery('#response').addClass('red');
				jQuery('#response').html('<span></span>'+html);
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 4000);	
			}
		}
	});
}

function addFman() {
	var data = $('#userform').serialize();
	
	// if($('#nombre').val() == ''){
		// alert('Please fill the name');
		// return false;
	// }
	
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	var manejo = jQuery('#manejo').val();
	if(manejo == '') {
		alert('You must fill the Manejo!');
		return false;
	}
	//alert(data);return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"addFman.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Manejo Categoria successfully added.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			} else {
				jQuery('#response').removeClass('green');
				jQuery('#response').addClass('red');
				jQuery('#response').html('<span></span>'+html);
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 4000);	
			}
		}
	});
	resetForm($('#userform'));	
}

function resetForm(ele) {
	
    $(ele).find(':input').each(function() {
        switch(this.type) {
            case 'password':
            case 'select-multiple':
            case 'select-one':
            case 'text':
            case 'textarea':
                $(this).val('');
                break;
            case 'checkbox':
            case 'radio':
                this.checked = false;
        }
    });

}
function deleteFman(id) {
	if (confirm("You want to delete the Manejo Categoria?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delFman.php",
		  data: "identificador="+id,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Manejo Categoria succesfully deleted.');
				jQuery('#message').fadeIn("slow");
				jQuery('#'+id).fadeOut("slow");
				setTimeout(function() {
					$('#'+id).remove();
				}, 1000);
			}
		  }
		});	
	} else {
			//alert('Non je supprime pas');
	}
}