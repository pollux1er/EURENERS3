<?php
$categoria = new categorias();	
$cats = $categoria->getAllRecords();
	
$cultivo = new productos_finales();
$culti = $cultivo->getAllRecords();

$residuo = new residuos();
$residuos = $residuo->getAllRecords();

$c = new empresa_residuos();
if(isset($_GET['id'])){
	$mic = $c->getRecord($_GET['id']);
} else {
	$mic = new empresa_residuos();
	$vars = $mic->getAllFields();
	//var_dump($vars); die();
	foreach($vars as $var)
		$mic->$var = '';
}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Residuos y Tratamiento</h2>
			<span onclick="window.location='?view=lproc_wt'" class="add">List</span>
		</div>
		<div class="content forms tabs" style="height:280px;">
			<div class="tabmenu">
				<ul> 
					<li><a href="#tabs-1">Residuos</a></li>
				</ul>
			</div>
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			
		<div id="tabs-1">
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Producto y Residuos</legend>
						<div id="lesinputs users">
							<div class="finput" id="btip">
								<label style="width:60px">Producto</label>
								<select id="producto_final" name="producto_final">
									<option value="">Select Producto</option>
									<?php foreach($culti as $c) { ?>
									<option value="<?php echo $c->identificador; ?>" <?php if($c->identificador == $mic->producto_final) echo "SELECTED" ?>><?php echo utf8_encode($c->nombre); ?></option>
									<?php } ?>
								</select>
							</div>
							<fieldset>
							<legend>Residuos</legend>
							<div class="line">
								<div class="finput" id="btip">
									<label style="width:60px">Categorias</label>
									<select id="categoria" name="categoria">
										<option value="">Select Categorias</option>
										<?php foreach($cats as $t) { ?>
										<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
										<?php } ?>
									</select>								
								</div>
								<div class="finput" id="btip">
									<label >Residuo</label>
									<select id="residuo" name="residuo" >
										<option value="">Select Residuo</option>
										<?php foreach($residuos as $t) { ?>
										<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->residuo) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="sfinput">
									<label >LER</label>
									<input id="codigo_ler" type="text" name="codigo_ler" class="small" value="<?php echo $mic->codigo_ler ?>" />
								</div>
								<div class="finput">
									<label >Descripcion</label>
									<input id="descripcion" type="text" name="descripcion" class="small" value="<?php echo $mic->descripcion ?>" />
								</div>
								
							</div>
							<div class="nextline">
								<div class="sfinput">
									<label >Candidad</label>
									<input id="cantidad" type="text" name="cantidad" class="small" value="<?php echo $mic->cantidad; ?>" />
								</div>
								<div class="sfinput">
									<label >Unidad</label>
									<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $mic->unidad; ?>" />
								</div>
								<div class="finput" id="btip">
								<label >Tipo de Gestion</label>
								<select id="tipo_gestion" name="tipo_gestion">
									<option value="">Select Tipo de Gestion</option>
									<option value="Gestor" <?php if($mic->tipo_gestion == 'Gestor') echo "SELECTED"; ?>>Gestor</option>
									<option value="Quema" <?php if($mic->tipo_gestion == 'Quema') echo "SELECTED"; ?>>Quema</option>
									<option value="Campo" <?php if($mic->tipo_gestion == 'Campo') echo "SELECTED"; ?>>Campo</option>
								</select>
								</div>
								
					
								<input type="radio" name="es_fase_uso" id="radio-1" value="1" <?php if($mic->es_fase_uso == '1') echo "CHECKED"; ?> /> 
								<label for="radio-1">Fase de Uso</label>
								
								<input type="radio" name="es_fase_uso" id="radio-2" value="0" <?php if($mic->es_fase_uso == '0') echo "CHECKED"; ?> /> 
								<label for="radio-2">Transformacion</label>
								
								<input type="hidden" name="es_produccion" value="0" id="es_produccion" />
								<input type="hidden" name="es_transformacion" value="1" id="es_transformacion" />
								<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
								<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
				
							</div>
							</fieldset>
						</div>
						
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateEResiduo(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addEresiduo();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form>
		</div>
	</div>
	
</div> 
</div>
<script type="text/javascript" src="js/pcrop-wastetr.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){

	$("select#categoria").change(function(){
    $.getJSON("_ajax/select_Cat_Residuos.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select Residuo</option>';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#residuo-button").remove();
     $("select#residuo").html(options);
	  
        $("select#residuo").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    })
  });

  $("select#residuo").change(function(){
    $.getJSON("_ajax/getLerFromResiduo.php",{id: $(this).val(), ajax: 'true'}, function(obj){
		jQuery("#codigo_ler").val(obj.codigo_ler);
    })
  });
  
  $("select#producto_final").change(function(){
    $.getJSON("_ajax/getUnidadFromProductoFinal.php",{id: $(this).val(), ajax: 'true'}, function(obj){
		jQuery("#unidad").val(obj.unidad);
    })
  })
});
</script>