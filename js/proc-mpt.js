function checktype() {
	var cat;
	
	//alert(cat);
	

}

function updateMatPT(user) {
	var data = $("#userform2").serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"updateMatPT.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Transport of Materia Prima successfully updated.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}

function addProdP() {
	var data = $("#userform").serialize();
	
	var producto_final = jQuery('#producto_final').val();
	if(producto_final == '') {
		alert('You must fill the producto final!');
		return false;
	}
	jQuery.ajax({
		type: "POST",
		url: ajax+"addProdP.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Producto final successfully added.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
	resetForm($('#userform'));	
}

function addMatPT() {
	var data = $("#userform2").serialize();
	
	var maquinaria = jQuery('#maquinaria').val();
	if(maquinaria == '') {
		alert('You must fill the vehiculo!');
		return false;
	}
	jQuery.ajax({
		type: "POST",
		url: ajax+"addMatPT.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Transport of Materia prima successfully added.');
				jQuery('#message').fadeIn("slow");
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
	resetForm($('#userform2'));	
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
function deleteCrop(idc) {
	if (confirm("You want to delete the Cultivos?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delCrop.php",
		  data: "cultivo="+idc,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Crop succesfully deleted.');
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

function deleteMpt(idc) {
	if (confirm("You want to delete the Transport?")) { 
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"dellMpt.php",
		  data: "identificador="+idc,
		  cache: false,
		  success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Transport succesfully deleted.');
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