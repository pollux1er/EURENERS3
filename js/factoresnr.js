function updateFnr() {
	var data = $('#userform').serialize();
	jQuery.ajax({
		type: "POST",
		url: ajax+"addFnr.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').html('<span></span>Factores Emision No Relacionados successfully updated.');
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
