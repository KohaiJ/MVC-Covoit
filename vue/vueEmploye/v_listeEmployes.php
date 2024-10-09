<div class ="row">
 	<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Mat</th>
						<th>Nom</th>
						<th>Actions</th>
						</tr>
				</thead>
			<?php foreach($data as $ligne){ ?>
					
				<tr>
						<td><?php echo $ligne['id']; ?></td>
						<td><?php echo $ligne['mat'];?></td>
						<td><?php echo $ligne['nom'];?></td>
						<td>
						<a href="index.php?ctl=employe&action=supprimer&id=<?php echo $ligne['id'];?>">
							<img src=".\vue\images\remove.png"width=20px height=20px>
						</a>
						<a href="index.php?ctl=employe&action=fiche&id=<?php echo $ligne['id'];?>">
							<img src=".\vue\images\editer.png"width=20px height=20px>
						</a>
						
						</td>
					</tr>
				<?php	
				}
				echo "</table>";
			?>

 
</div>

