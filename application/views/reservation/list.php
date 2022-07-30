<main class="content">
				<div class="container-fluid">

					<div class="header">
						<h1 class="header-title">
							<?php echo $pageTitle ?>
						</h1>
						
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title"><?php echo $pageTitle ?></h5>
									
								</div>
								<div class="card-body">
									<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Booking ID</th>
												<th>Name</th>
												<th>Room</th>
												<th>Pension</th>
												<th>Age</th>
												<th>Start date</th>
												<th>Nights</th>
												<th>Price</th>
												<th>statut</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($bookings as $book ){ ?> 
											<tr>
												<td><?php echo $book->reservationId ?></td>
												<td><?php echo $book->client->name ?></td>
												<td><?php echo $book->room ?></td>
												<td><?php echo $book->pension ?></td>
												<td><?php echo $book->adult ?> adult / <?php echo $book->children ?> child </td>
												<td><?php echo $book->checkin ?></td>
												<td><?php
			                                    $date1 = new DateTime( $book->checkin  );
			                                    $date2 = new DateTime( $book->checkout ) ;
			                                    $interval = $date1->diff($date2);
			                                     echo $interval->d ; ?></td>
			                                     <td><?php echo $book->price ?> DT</td>
			                                     <td> 
			                                     	<?php if ($book->statut == 3  ){  ?>
                                                		<span class="badge bg-danger">Refused</span>
		                                            <?php } ?>
			                                     	<?php if ($book->statut == 2  ){  ?>
                                                		<span class="badge bg-success">Accepted</span>
		                                            <?php } ?>
		                                            
		                                            <?php if ($book->statut == 1  ){  ?>
		                                                <span class="badge bg-warning">Pending</span>
		                                            <?php } ?></td>
												<td><a href="<?php echo base_url() ?>Reservation/view/<?php echo $book->reservationId ?>"><i class="ion ion-ios-eye me-2"></i></a> </td>
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