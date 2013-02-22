<?php
	$c = new manejos_categorias();
	
	if(isset($_GET['id'])){
		$mic = $c->getRecord($_GET['id']);
	} else {
		$mic = new manejos_categorias();
		$vars = $mic->getAllFields();
		//echo "<pre>"; var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	$btc = new  tipos_basicos();	
	$btcs = $btc->getAllRecords();
	$manejo = new  manejos();	
	$manejos = $manejo->getAllRecords();
	
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Manejos Categorias</h2>
			<span onclick="window.location='?view=lfmanejosc'" class="add">List</span>
		</div>
		<div class="content forms">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Manejos y Categorias</legend>
					<div class="line microps">
						<div class="finput" id="btip">
							<label style="width:80px">Manejo</label>
							<select id="manejo" name="manejo">
								<option value="">Select Manejo</option>
								<?php foreach($manejos as $m) { ?>
								<option value="<?php echo $m->identificador; ?>" <?php if($m->identificador == $mic->manejo) echo "SELECTED" ?>><?php echo utf8_encode($m->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="finput" id="btip">
							<label style="width:80px">Basic Type</label>
							<select id="tipo_basico" name="tipo_basico">
								<option value="">Select Basic Type</option>
								<?php foreach($btcs as $b) { ?>
								<option value="<?php echo $b->identificador; ?>" <?php if($b->identificador == $mic->tipo_basico) echo "SELECTED" ?>><?php echo utf8_encode($b->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
						
						<div class="finput" id="btip">
							<label style="width:60px">Categoria</label>
							<select id="categoria" name="categoria">
								<option value="">Select Categoria</option>
								<?php foreach($cats as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="nextline microps">
						<div class="finput first" style="margin-right:25px">
							<label style="width:180px">EF3 (kg N<sub>2</sub>O-N/kg N excretado)</label>
							<input id="ef3" name="ef3" type="text" class="small" value="<?php echo $mic->ef3; ?>" />
						</div>
						<div class="sfinput">
							<label> Fuente</label>
							<input id="fuente_ef3" name="fuente_ef3" type="text" class="medium" value="<?php echo $mic->fuente_ef3; ?>" />
						</div>
						
						
					</div>
					<div class="line microps">
						<div class="finput first" style="margin-right:25px">
							<label style="width:280px">EF4 kg N<sub>2</sub>O-N (kg NH<sub>3</sub>-N + NOx-N volatilizado)^1</label>
							<input id="ef4" name="ef4" type="text" class="small" value="<?php echo $mic->ef4; ?>" />
						</div>
						<div class="sfinput">
							<label> Fuente</label>
							<input id="fuente_ef4" name="fuente_ef4" type="text" class="medium" value="<?php echo $mic->fuente_ef4; ?>" />
						</div>
						
						
					</div>
					<div class="line microps">
						<div class="finput first" style="margin-right:25px">
							<label style="width:260px">EF5 kg N<sub>2</sub>O-N/(kg N lixiviado/escurrido)^1</label>
							<input id="ef5" name="ef5" type="text" class="small" value="<?php echo $mic->ef5; ?>" />
						</div>
						<div class="sfinput">
							<label> Fuente</label>
							<input id="fuente_ef5" name="fuente_ef5" type="text" class="medium" value="<?php echo $mic->fuente_ef5; ?>" />
						</div>
						
						
					</div>
					<div class="line microps">
						<div class="finput first" style="margin-right:25px">
							<label style="width:360px">FracGasMS (Perdida de N debido a la volatilizacion de N-NH<sub>3</sub>)</label>
							<input id="fracgasms" name="fracgasms" type="text" class="small" value="<?php echo $mic->fracgasms; ?>" />
						</div>
						<div class="sfinput">
							<label> Fuente</label>
							<input id="fuente_fracgasms" name="fuente_fracgasms" type="text" class="medium" value="<?php echo $mic->fuente_fracgasms; ?>" />
						</div>
					</div>
					<div class="line microps">
						<div class="finput first" style="margin-right:25px">
							<label style="width:390px">FracPerdidaMS (Perdida del total de N producida par la gestion del estiercol)</label>
							<input id="fracperdidams" name="fracperdidams" type="text" class="small" value="<?php echo $mic->fracperdidams; ?>" />
						</div>
						<div class="sfinput">
							<label> Fuente</label>
							<input id="fuente_fracperdidams" name="fuente_fracperdidams" type="text" class="medium" value="<?php echo $mic->fuente_fracperdidams; ?>" />
						</div>
					</div>
					
					
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateFman(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addFman();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/fmanejosc.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){

  $("select#tipo_basico").change(function(){
    $.getJSON("_ajax/select_Cat_BasicType.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select Basic Category</option>';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#categoria-button").remove();
     $("select#categoria").html(options);
	  
        $("select#categoria").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    })
  });
})
</script>