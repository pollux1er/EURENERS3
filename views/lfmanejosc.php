<?php
	@session_start();
	$menu = new manejos_categorias();	
	$menus = $menu->getAllRecords();	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Crops</h2>
					<span onclick="window.location='?view=fmanejosc'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Manejo</th>
								<th>Categoria</th>
								<th>EF3</th>
								<th>EF4</th>
								<th>EF5</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->manejo, 'manejos')); ?></a></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->categoria, 'categorias')); ?></a></td>
								<td><a href="#"><?php echo utf8_encode($m->ef3); ?></a></td>
								<td><a href="#"><?php echo utf8_encode($m->ef4); ?></a></td>
								<td><a href="#"><?php echo utf8_encode($m->ef5); ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=fmanejosc&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteFman('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/fmanejosc.js"></script>
<script type="text/javascript">

</script>