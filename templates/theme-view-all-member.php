<div class="wrap">
	<?php 
	 $clubmembers = cm_get_all_clubmembers();
	?>

	<table class="clubmember-all">
		<thead>
			<tr>
				<th>SL</th>
				<th>Name</th>
				<th>Department</th>
				<th>Semester</th>
				<th>Class Roll</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if($clubmembers){ 
			$serialNo=1;
			foreach ($clubmembers as $members) {
		?>
			<tr>
				<td><?php echo $serialNo++ ?></td>
				<td><?php echo $members->full_name ?></td>
				<td><?php echo $members->department ?></td>
				<td><?php echo $members->semester ?></td>
				<td><?php echo $members->class_roll ?></td>
				<td><?php 
					$mem_date= new DateTime($members->membership_date);
					$cur_date = new DateTime('now');
					$mem_date->add(new DateInterval('P'.$members->membership_duration.'M'));
					if($cur_date >  $mem_date){
						echo "Expired";
					}else{
						
						echo "Active Until ". $mem_date->format("d M Y"); 
					}
					?>
				</td>
			</tr>

		<?php } ?>
		<?php }else{ ?>
			<tr>
				<td colspan="8">
					Not found
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>