
function updateConsumable(user) {
	var data = $('#userform').serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addConsumable.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Consumable successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}

function addConsumable() {
	var cat = jQuery('#categoria').val();
	if($('#nombre').val() == ''){
		alert('Please fill the name');
		return false;
	}
	if(cat == '') {
		alert('Please select the Category');
		return false;
	}
	var data = $('#userform').serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addConsumable.php",
		data: data,
		
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Consumable successfully added.');
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
function deleteConsumable(id) {
	if (confirm("You want to delete the Consumable?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delConsumable.php",
		  data: "identificador="+id,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Consumable succesfully deleted.');
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