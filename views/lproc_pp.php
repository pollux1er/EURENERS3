<?php
	@session_start();
	$menu = new empresa_productos_final();	
	$menus = $menu->getAllRecordsE();	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Transformacion for enterprise</h2>
					<span onclick="window.location='?view=proc_pp'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Producto final</th>
								<th>Cantidad</th>
								<th>Unidad</th>
								<th width="70"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><?php echo utf8_encode($menu->getNameProduct($m->producto_final)); ?></td>
								<td><a href="#"><?php echo $m->cantidad; ?></a></td>
								<td><a href="#"><?php echo $m->unidad;  ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=proc_pp&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteProcP('<?php echo $m->identificador ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
									<a title="Manage Transformations" style="margin-left:2px;float:left" href="?view=lproc_p&producto_final=<?php echo $m->identificador; ?>"><img src="images/icons/process.png" height="18" alt="edit" /></a>
									<a title="Manage Materia prima" style="margin-left:2px;float:left" href="?view=lproc_mp&producto_final=<?php echo $m->identificador; ?>"><img src="images/icons/prima.png" height="18" alt="edit" /></a>
								</td>
							</tr>
						<?php } ?> 
						</tbody> 
					</table>
					<button type="submit" class="red"><span>Delete</span></button>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="js/proc-pp.js"></script>