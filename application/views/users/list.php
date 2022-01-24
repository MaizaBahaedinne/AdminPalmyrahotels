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
												<th>clientId</th>
												<th>Name</th>
												<th>country</th>
												<th>phone</th>
												<th>email</th>
												<th>created</th>
											
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($Users as $user ){ ?> 
											<tr>
												<td><?php echo $user->userId ?></td>
												<td><?php echo $user->name ?></td>
												<td> <?php echo $user->country ?></td>
												<td><a href="tel:+<?php echo $user->country_code ?><?php echo $user->phone ?>">+<?php echo $user->country_code ?> <?php echo $user->phone ?></a></td>
												<td><a href="mailto:<?php echo $user->email ?>"><?php echo $user->email ?></a></td>
												<td><?php echo $user->createdDtm ?></td>
												
												<td>
													<i class="ion ion-ios-eye me-2"></i>  
													<a href="<?php echo base_url()?>Users/edit/<?php echo $user->userId ?>">
														<i class="align-middle me-2 fas fa-fw fa-pencil-alt"></i>
													</a> 
												</td>
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