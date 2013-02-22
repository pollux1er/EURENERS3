<?php
	$c = new factores_no_relacionados();
	
	$mic = $c->getRecord(1);
	
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
			<h2>Factores Emision No Relacionados</h2>
			
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
					<legend>Factores Emision No Relacionados</legend>
					
					<div class="nextline microps" style="margin-top:0;">
						<div class="finput first" style="margin-right:25px">
							<label style="width:100px">FracGASF </label>
							<input id="fracgasf" name="fracgasf" type="text" class="small" value="<?php echo $mic->fracgasf; ?>" />
							<span style="font-weight:bold;margin-left:10px;margin-right:95px">(kg NH<sub>3</sub>-N + NOx-N) (kg N aplicado)-1 </span>
						</div>
						<div class="sfinput">
							<label style="width:40px"> Fuente</label>
							<input id="fuente_fracgasf" name="fuente_fracgasf" type="text" class="medium" value="<?php echo $mic->fuente_fracgasf; ?>" />
						</div>
						
						
					</div>
					<div class="line microps">
						<div class="finput first" style="margin-right:25px">
							<label style="width:100px">FracGASM </label>
							<input id="fuente_fracgasm" name="fuente_fracgasm" type="text" class="small" value="<?php echo $mic->fracgasm; ?>" />
							<span style="font-weight:bold;margin-left:10px;margin-right:20px">(kg NH<sub>3</sub>-N + NOx-N) (kg N aplicado o depositado)-1 </span>
						</div>
						<div class="sfinput">
							<label style="width:40px"> Fuente</label>
							<input id="fuente_fracgasm" name="fuente_fracgasm" type="text" class="medium" value="<?php echo $mic->fuente_fracgasm; ?>" />
						</div>
						
						
					</div>
					<div class="line microps">
						<div class="finput first" style="margin-right:25px">
							<label style="width:100px">FracLIXIVIACION </label>
							<input id="fraclixiviacion" name="fraclixiviacion" type="text" class="small" value="<?php echo $mic->fraclixiviacion; ?>" />
							<span style="font-weight:bold;margin-left:10px;margin-right:20px;width:283px;white-space:nowrap;overflow:hidden">kg N (kg N agregado o par deposicion de animales en pastero)-1 </span>
						</div>
						<div class="sfinput">
							<label style="width:40px"> Fuente</label>
							<input id="fuente_lixiviacion" name="fuente_lixiviacion" type="text" class="medium" value="<?php echo $mic->fuente_lixiviacion; ?>" />
						</div>
						
						
					</div>
					<div class="line microps">
						<div class="finput first" style="margin-right:155px">
							<label style="width:100px">EF1 </label>
							<input id="ef1" name="ef1" type="text" class="small" value="<?php echo $mic->ef1; ?>" />
							<span style="font-weight:bold;margin-left:10px;margin-right:95px">kg N<sub>2</sub>O-N/kg N</span>
						</div>
						<div class="sfinput">
							<label style="width:40px"> Fuente</label>
							<input id="fuente_ef1" name="fuente_ef1" type="text" class="medium" value="<?php echo $mic->fuente_ef1; ?>" />
						</div>
					</div>
					
					<div class="line microps">
						<div class="finput first" style="margin-right:25px">
							<label style="width:100px">EFcaliza</label>
							<input id="efcaliza" name="efcaliza" type="text" class="small" value="<?php echo $mic->efcaliza; ?>" />
							<span style="font-weight:bold;margin-left:10px;margin-right:125px">ton de C (ton de piedra caliza)-1</span>
						</div>
						<div class="sfinput">
							<label style="width:40px"> Fuente</label>
							<input id="fuente_caliza" name="fuente_caliza" type="text" class="medium" value="<?php echo $mic->fuente_caliza; ?>" />
						</div>
					</div>
					<div class="line microps">
						<div class="finput first" style="margin-right:25px">
							<label style="width:100px">EFdolomita</label>
							<input id="efdolomita" name="efdolomita" type="text" class="small" value="<?php echo $mic->efdolomita; ?>" />
							<span style="font-weight:bold;margin-left:10px;margin-right:110px">ton de C (ton de piedra dolomita)-1</span>
						</div>
						<div class="sfinput">
							<label style="width:40px"> Fuente</label>
							<input id="fuente_dolomita" name="fuente_dolomita" type="text" class="medium" value="<?php echo $mic->fuente_dolomita; ?>" />
						</div>
					</div>
					<div class="line microps">
						<div class="finput first" style="margin-right:25px">
							<label style="width:100px">EFurea</label>
							<input id="efurea" name="efurea" type="text" class="small" value="<?php echo $mic->efurea; ?>" />
							<span style="font-weight:bold;margin-left:10px;margin-right:170px">ton de C (ton de urea)-1</span>
						</div>
						<div class="sfinput">
							<label style="width:40px"> Fuente</label>
							<input id="fuente_urea" name="fuente_urea" type="text" class="medium" value="<?php echo $mic->fuente_urea; ?>" />
						</div>
					</div>
					
					
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
					<input type="hidden" name="identificador" value="1" id="identificador" />
					<button class="green medium" type="button" onclick="updateFnr();"><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/factoresnr.js"></script>
<script type="text/javascript" charset="utf-8">

</script>