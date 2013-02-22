<?php
	@session_start();
	$prov = new provincias();	
	$provs = $prov->getAllRecords();
	
	if($_SESSION['u']['idgroupe'] == '2') {
		$empresa = new empresas();	
		$menus = $empresa->getRecord($_SESSION['u']['enterprise']);
	} else {
		$empresa = new empresas();	
		$menus = $empresa->getAllRecords();
	}
	global $lang;
//	var_dump($menus);
	//var_dump($_SESSION); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Enterprises</h2>
					<span onclick="window.location='?view=enterprise_data'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Nombre</th>
								<th>Codigo</th>
								<th>Number</th>
								<th>Telefono</th>
								<th>Provincia</th>
								<th width="64"></th>
							</tr> 
						</thead> 
						<tbody>
						<?php if($_SESSION['u']['idgroupe'] == '2') { ?>
							<tr id=""> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo $menus->nombre; ?></a></td>
								<td><a href="#"><?php echo $menus->codigo; ?></a></td>
								
								<td><?php echo $menus->numero; ?></td>
								<td><?php echo $menus->telefono; //var_dump($m->provincia); die; ?></td>
								<td><a href="#"><?php echo $empresa->getName($menus->provincia, 'provincias'); ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=enterprise_data&id=<?php echo $_SESSION['u']['enterprise']; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<?php if($_SESSION['u']['idgroupe'] == '1') { ?><a style="margin-left:2px;float:left" href="#" onclick="deleteEmpresas('<?php echo $menus->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a><?php } ?>
									<?php if($_SESSION['u']['idgroupe'] == '1') { ?><a title="Add users to the enterprise <?php echo $menus->nombre; ?>" style="margin-left:2px;float:left" href="?view=user&enterprise=<?php echo $menus->identificador; ?>" onclick="addusuario('<?php echo $menus->identificador; ?>')"><img src="images/icons/user_add.png" width="16" /></a><?php } ?>
									<a title="Manage Product final for <?php echo $menus->nombre; ?>" style="margin-left:2px;float:left" href="?view=empresa_productos_resultantes&enterprise=<?php echo $menus->identificador; ?>" onclick="addusuario('<?php echo $menus->identificador; ?>')"><img src="images/icons/block.png" width="16" /></a>
								</td>
							</tr>
						<?php } ?>
						<?php if($_SESSION['u']['idgroupe'] == '1') { ?>
						<?php foreach($menus as $m) { ?>
							<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo $m->nombre; ?></a></td>
								<td><a href="#"><?php echo $m->codigo; ?></a></td>
								
								<td><?php echo $m->numero; ?></td>
								<td><?php echo $m->telefono; //var_dump($m->provincia); die; ?></td>
								<td><a href="#"><?php echo $empresa->getName($m->provincia, 'provincias'); ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=enterprise_data&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<?php if($_SESSION['u']['idgroupe'] == '1') { ?><a style="margin-left:2px;float:left" href="#" onclick="deleteEmpresas('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a><?php } ?>
									<?php if($_SESSION['u']['idgroupe'] == '1') { ?><a title="Add users to the enterprise <?php echo $m->nombre; ?>" style="margin-left:2px;float:left" href="?view=user&enterprise=<?php echo $m->identificador; ?>" onclick="addusuario('<?php echo $m->identificador; ?>')"><img src="images/icons/user_add.png" width="16" /></a><?php } ?>
									<a title="Manage Product final for <?php echo $m->nombre; ?>" style="margin-left:2px;float:left" href="?view=empresa_productos_resultantes&enterprise=<?php echo $m->identificador; ?>" onclick="addusuario('<?php echo $m->identificador; ?>')"><img src="images/icons/block.png" width="16" /></a>
								</td>
							</tr>
						<?php } } ?> 
						</tbody> 
					</table>
					<button type="submit" class="red"><span>Delete</span></button>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="js/enterprise_data.js"></script>
<script type="text/javascript">
</script>