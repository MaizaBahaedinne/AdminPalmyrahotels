<main class="content">
				<div class="container-fluid">

					<div class="header">
						<h1 class="header-title">
							Prices | <?php echo $hotel->name ?>
						</h1>
						
					</div>
					<div class="row">

						<div class="col-12 col-xl-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Configured saisons</h5>
									
								</div>
								<div class="card-body">
									<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th width="5%">ID</th>
												<th width="15%">Saison</th>
												<th width="15%">statut</th>
												<th>Begin</th>
												<th>End</th>
												<th>Price</th>
												<th>supp S</th>
												<th>PD</th>
												<th>DP</th>
												<th>PC</th>
												<th>ALLS</th>
												<th>ALLH</th>
																			
											</tr>
										</thead>
										<tbody>
											<?php foreach ($Saisons as $saison ){ ?> 
											<tr>
												<td><?php echo $saison->priceId ?></td>
												<td><?php echo $saison->titre ?> 
												<td><?php 

												$date1 = new DateTime( 'now' );
			                                    $date2 = new DateTime( $saison->date_debut ) ;

												if ($date2 >  $date1  ){ 
												
			                                    $interval = $date1->diff($date2);
			                                     echo $interval->format('in %M mounth %D days');

			                                    }
			                                    else
			                                    {

			                                    	echo "<span class='badge bg-success'>Current</span>" ;
			                                    }



			                                     ?></td>
			                                     <td><?php echo $saison->date_debut ?> </td>
			                                     <td><?php echo $saison->date_fin ?> </td>

			                                     <td><?php echo $saison->price ?> </td>
			                                     <td><?php echo $saison->supS ?> </td>
			                                     <td><?php if($saison->PD != null){ echo $saison->price+$saison->PD ;} ?> </td>
			                                     <td><?php if($saison->DP != null){ echo $saison->price+$saison->DP ;} ?> </td>
			                                     <td><?php if($saison->PC != null){ echo $saison->price+$saison->PC ;} ?> </td>
			                                     <td><?php if($saison->ALLS != null){ echo $saison->price+$saison->ALLS ;} ?> </td>
			                                     <td><?php if($saison->ALLH != null){ echo $saison->price+$saison->ALLH ;} ?> </td>


												
											</tr>
										<?php } ?> 
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="col-12 col-xl-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Rooms</h5>
									<h6 class="card-subtitle text-muted">Palmyra <?php echo $hotel->name?>.</h6>
								</div>
								<div class="card-body">
									<table id="datatables" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Room</th>
												
												
												
												
											</tr>
										</thead>
										<tbody>
											<?php foreach ($rooms as $room ){ ?> 
											<tr>
												<td><?php echo $room->titre ?></td>
												
												
												
												
											</tr>
										<?php } ?> 
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-12 col-xl-8">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Actuel Price</h5>
									<h6 class="card-subtitle text-muted">Saisson : <?php echo $hotelPrice->titre ?> </h6> 
									<span style="text-align: right;"><strong>from</strong> <?php echo $hotelPrice->date_debut ?> <strong>To</strong> <?php echo $hotelPrice->date_fin ?></span> 
								</div>
								<div class="card-body">
									<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Pension</th>
												<th>Price</th>
												<?php foreach ($rooms as $room ){ ?><td><?php echo $room->titre ?></td> <?php } ?> 
																						 
												
											</tr>
										</thead>
										<tbody>
											
											
											
											<tr>
												<td>PD</td>
												<td>+<?php echo $hotelPrice->PD ?> <sup>DT</sup></td>
												<?php foreach ($rooms as $room ){ ?>
													<td><?php if($hotelPrice->DP>0){ if($room->capacity > 1){ echo $room->capacity * ($hotelPrice->PD +$hotelPrice->price )."<sup>DT</sup>" ; }  
																					  else {echo $room->capacity * ($hotelPrice->PD +$hotelPrice->price +  $hotelPrice->supS )."<sup>DT</sup>" ; } } ?></td> 
												<?php } ?> 
												
											</tr>
											<tr>
												<td>DP</td>
												<td>+<?php echo $hotelPrice->DP ?> <sup>DT</sup></td>
												<?php foreach ($rooms as $room ){ ?>
													<td><?php if($hotelPrice->DP>0){ if($room->capacity > 1){ echo $room->capacity * ($hotelPrice->DP +$hotelPrice->price )."<sup>DT</sup>" ; }  
																					  else {echo $room->capacity * ($hotelPrice->DP +$hotelPrice->price +  $hotelPrice->supS )."<sup>DT</sup>" ; } } ?></td> 
												<?php } ?>  
												
											</tr>
											<tr>
												<td>PC</td>
												<td>+<?php echo $hotelPrice->PC ?> <sup>DT</sup></td>
												<?php foreach ($rooms as $room ){ ?>
													<td><?php if($hotelPrice->PC>0){ if($room->capacity > 1){ echo $room->capacity * ($hotelPrice->PC +$hotelPrice->price )."<sup>DT</sup>" ; }  
																					  else {echo $room->capacity * ($hotelPrice->PC +$hotelPrice->price +  $hotelPrice->supS )."<sup>DT</sup>" ; } } ?></td> 
												<?php } ?> 
												
											</tr>
											<tr>
												<td>ALLS</td>
												<td>+<?php echo $hotelPrice->ALLS ?> <sup>DT</sup></td>
												<?php foreach ($rooms as $room ){ ?>
													<td><?php if($hotelPrice->ALLS>0){ if($room->capacity > 1){ echo $room->capacity * ($hotelPrice->ALLS +$hotelPrice->price )."<sup>DT</sup>" ; }  
																					  else {echo $room->capacity * ($hotelPrice->ALLS +$hotelPrice->price +  $hotelPrice->supS )."<sup>DT</sup>" ; } } ?></td> 
												<?php } ?>  
												
											</tr>
											<tr>
												<td>ALLH</td>
												<td>+<?php echo $hotelPrice->ALLH ?> <sup>DT</sup></td>
												<?php foreach ($rooms as $room ){ ?>
													<td><?php if($hotelPrice->ALLH>0){ if($room->capacity > 1){ echo $room->capacity * ($hotelPrice->ALLH +$hotelPrice->price )."<sup>DT</sup>" ; }  
																					  else {echo $room->capacity * ($hotelPrice->ALLH +$hotelPrice->price +  $hotelPrice->supS )."<sup>DT</sup>" ; } } ?></td> 
												<?php } ?> 
												
											</tr>

										
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="col-12 col-xl-8">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Rooms</h5>
									
								</div>
								<div class="card-body">
									<div id="fullcalendar"></div>
								</div>
							</div>
						</div>

						

						
					
					</div>

				
			</main>




	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});
		});
	</script>


		<script>
		document.addEventListener("DOMContentLoaded", function() {
			var calendarEl = document.getElementById('fullcalendar');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				themeSystem: 'bootstrap',
				initialView: 'dayGridMonth',
				
				headerToolbar: {
					left: 'prev,next',
					center: 'title',
					right: 'today'
				},
				events: [
					<?php foreach ($hotelPriceByroom as $price ){ ?> 
					{
						title: '<?php echo $price->titre   ?> :  <?php echo $price->price ?> DT ' ,
						start: '<?php echo $price->date_debut ?> 00:00:00',
						end: '<?php echo $price->date_fin ?> 00:00:00',
						groupId: '<?php echo $price->saisonId ?>',  
						backgroundColor: '<?php echo $price->color ?>'
					},
					<?php } ?> 
				]
			});
			setTimeout(function() {
				calendar.render();
			}, 400)
		});
	</script>