<?php
	@session_start();
	// $categoria = new categorias();	
	// $cats = $categoria->getAllRecords();
	
	// $maquinaria = new maquinarias();	
	// $maqs = $maquinaria->getAllRecords();
	
	// $mat = new materias();	
	// $mats = $mat->getAllRecords();
	
	$producto = new empresa_unidades_funcionales();	
	$products = $producto->getAllRecordsFromEmpresa($_SESSION['u']['enterprise']);
	
	$process = new proceso_maquinarias();
	$procesos = $process->getProcesosMaquinaria();
	//var_dump($products); die;
	$prod = new empresa_productos_final();
	if(isset($_GET['id'])){
		$pr = $prod->getRecord($_GET['id']);
	} else {
		$pr = new empresa_productos_final();
		$vars = $pr->getAllFields();
		foreach($vars as $var)
			$pr->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Productos Finales y Procesos de Transformacion</h2>
			<!--<span onclick="window.location='?view=proc_mp'" class="addy">Manage Materia prima</span>-->
			<span onclick="window.location='?view=lproc_pp'" class="add">List</span>
		</div>
		<div class="content forms tabs" style="height:160px;">
			<div class="tabmenu">
				<ul> 
					<li><a href="#tabs-1">Production</a></li> 
						<!--<li><a href="#tabs-2">Materias Primas</a></li>
				<li><a href="#tabs-3">Transporte</a></li>-->
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
					<legend>Productos y Procesos</legend>
						<div id="lesinputs users">
							<div class="finput" id="btip">
								<label style="width:60px">Producto</label>
								<select id="producto_final" name="producto_final">
								<option value="">Select Producto</option>
								<?php foreach($products as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $pr->producto_final) echo "SELECTED" ?>><?php echo utf8_encode($prod->getName($t->producto_final, 'productos_finales')); ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="sfinput">
								<label >Candidad</label>
								<input id="cantidad" type="text" name="cantidad" class="small" value="<?php echo $pr->cantidad ?>" />
							</div>
							<div class="sfinput">
								<label >Unidad</label>
								<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $pr->unidad ?>" READONLY=READONLY />
							</div>
						</div>
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center; height : 50px; float : left">
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateProdP(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addProdP();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
				<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
				<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" id="identificador" value="<?php echo $_GET['id']; ?>" /><?php } ?>
			</form>	
		</div>
		
		</div>
	</div>
</div>
<script type="text/javascript" src="js/proc-pp.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){

	 $("select#producto_final").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/getProductoFinalEnterprise.php",{id: $(this).val(), ajax: 'true'}, function(obj){
		jQuery("#unidad").val(obj.unidad);
    })
  });

  $("select#proceso_transformacion").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/select_Maq_Proceso.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select Maquinaria</option>';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#maquinaria-button").remove();
     $("select#maquinaria").html(options);
	  
        $("select#maquinaria").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    })
  });
  
  $("select#maquinaria").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/getMaquinaria.php",{id: $(this).val(), ajax: 'true'}, function(obj){		
		jQuery("#emision_co2").val(obj.emision_co2);		
		jQuery("#emision_n2o").val(obj.emision_n2o);		
		jQuery("#emision_n2o").val(obj.emision_n2o);		
		jQuery("#emision_ch4").val(obj.emision_ch4);		
		jQuery("#emision_co2_eq").val(obj.emision_co2_eq);	
    })
  })
})
</script>