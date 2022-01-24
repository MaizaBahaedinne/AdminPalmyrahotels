<main class="content">
				<div class="container-fluid">

					<div class="header">
						<h1 class="header-title">
							Clients
						</h1>
						
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Clients</h5>
									
								</div>
								<div class="card-body">
									<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Saison ID</th>
												<th>titre</th>
												<th>date_debut</th>
												<th>date_fin</th>
												
												<th>Statut </th>
											
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($Saisons as $saison ){ ?> 
											<tr>
												<td><?php echo $saison->saisonId ?></td>
												<td><?php echo $saison->titre ?></td>
												<td><?php echo $saison->date_debut ?></td>
												<td><?php echo $saison->date_fin ?></td>
											
												<td>
												<?php 

												$date1 = new DateTime( 'now' );
			                                    $date2 = new DateTime( $saison->date_debut ) ;

												if ($date2 >  $date1  ){ 
												
			                                    $interval = $date1->diff($date2);
			                                    echo 'next '.$interval->d.' day' ; }
			                                    else
			                                    {

			                                    	echo "<span class='badge bg-success'>Current</span>" ;
			                                    }



			                                     ?></td>
												
												<td><i class="ion ion-ios-eye me-2"></i> </td>
											</tr>
										<?php } ?> 
										</tbody>
									</table>
								</div>
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