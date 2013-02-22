function checktype() {
	var cat;
	
}
function updateEResiduoTratamiento(u1, u2) {
	var data = $("#userform :input[name][name!='production']").serialize();
	//alert(data);
	//return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"updateEResiduoTratamiento.php",
		data: data+'&',
		cache: false,
		success: function(html){
			if(html==""){
			
				jQuery('#response').html('<span></span>Residuo tratamiento successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}
function updateEResiduo(user) {
	var data = $("#userform :input[name][name!='production']").serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addEresiduo.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Residuo successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}
function updateETransport(user) {
	var data = $("#userform :input[name][name!='production']").serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"updateETransport.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Residuo transporte successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}
function addEresiduo() {
	var data = $("#userform").serialize();
	
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	//data = data+"&es_fase_uso="+es_fase_uso;
	//alert(data); return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"addEresiduo.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Residuo successfully added.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
	resetForm($('#userform'));	
}

function addEtratamiento() {
	var data = $("#userform").serialize();
	
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	//alert(data); return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"addEtratamiento.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Residuo tratamiento successfully added.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
	resetForm($('#userform'));	
}

function addEtransport() {
	var data = $("#userform").serialize();
	
	var categoria = jQuery('#categoria').val();
	if(categoria == '') {
		alert('You must fill the Category!');
		return false;
	}
	//alert(data); return false;
	jQuery.ajax({
		type: "POST",
		url: ajax+"addEtransport.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Residuo transport successfully added.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
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
function delEresiduo(idc) {
	if (confirm("You want to delete the Residuo?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delEresiduo.php",
		  data: "identificador="+idc,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Residuo succesfully deleted.');
				jQuery('#message').fadeIn("slow");
				jQuery('#'+idc).fadeOut("slow");
				setTimeout(function() {
					$('#'+idc).remove();
				}, 1000);
			}
		  }
		});	
	} else {
			//alert('Non je supprime pas');
	}
}

function deleteTratamiento(idc) {
	if (confirm("You want to delete the Residuo tratamiento?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"deleteTratamiento.php",
		  data: "key="+idc,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Residuo tratamiento succesfully deleted.');
				jQuery('#message').fadeIn("slow");
				jQuery('#'+idc).fadeOut("slow");
				setTimeout(function() {
					$('#'+idc).remove();
				}, 1000);
			}
		  }
		});	
	} else {
			//alert('Non je supprime pas');
	}
}

function deleteTransporte(idc) {
	if (confirm("You want to delete the Residuo transporte?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"deleteTransporte.php",
		  data: "key="+idc,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Residuo transporte succesfully deleted.');
				jQuery('#message').fadeIn("slow");
				jQuery('#'+idc).fadeOut("slow");
				setTimeout(function() {
					$('#'+idc).remove();
				}, 1000);
			}
		  }
		});	
	} else {
			//alert('Non je supprime pas');
	}
}