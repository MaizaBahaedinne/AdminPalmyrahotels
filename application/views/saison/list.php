<main class="content">
				<div class="container-fluid">

					<div class="header">
						<h1 class="header-title">
							Saisons
						</h1>
						
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Saison</h5>
									
								</div>
								<div class="card-body">
									<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												
												<th width="50%">titre</th>
												<th>Statut </th>
												<th>start</th>
												<th>end</th>
												
												
											
												
											</tr>
										</thead>
										<tbody>
											<?php foreach ($Saisons as $saison ){ ?> 
											<tr>
												
												<td><?php echo $saison->titre ?></td>

												<td>
												<?php 

												$date1 = new DateTime( 'now' );
			                                    $date2 = new DateTime( $saison->date_debut ) ;

												if ($date2 >  $date1  ){ 
												
			                                    $interval = $date1->diff($date2);

			                                    echo $interval->format('in %M mounth %D days'); }
			                                    else
			                                    {

			                                    	echo "<span class='badge bg-success'>Current</span>" ;
			                                    }



			                                     ?></td>
												<td><?php echo $saison->date_debut ?></td>
												<td><?php echo $saison->date_fin ?></td>
											
												
												
											</tr>
										<?php } ?> 
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="col-7">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Sasison Calendar</h5>
									
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
				defaultView: 'year',
				yearColumns: 3,
				
				headerToolbar: {
					left: 'prev,next today',
					center: 'title',
					right: 'dayGridMonth'
				},
				events: [
					<?php foreach ($Saisons as $saison ){ ?> 
					{
						title: '<?php echo $saison->titre ?>',
						start: '<?php echo $saison->date_debut ?> 00:00:00',
						end: '<?php echo $saison->date_fin ?> 00:00:00',  
						eventColor: '<?php echo $saison->color ?>'
					},
					<?php } ?> 
				]
			});
			setTimeout(function() {
				calendar.render();
			}, 400)
		});
	</script>