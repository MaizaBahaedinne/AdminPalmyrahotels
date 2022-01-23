<main class="content">
				<div class="container-fluid">

					<div class="header">
						<h1 class="header-title">
							Edit <?php echo $hotel->name ?>
						</h1>
						
					</div>
					<div class="row">
						<div class="col-12 col-xl-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Hotel</h5>
									<h6 class="card-subtitle text-muted">Palmyra <?php echo $hotel->name?>.</h6>
								</div>
								<div class="card-body">
									<form>
										<div class="mb-3 ">
											<label class="form-label">Name</label>
											<input type="name" class="form-control" placeholder="Name" value="<?php echo $hotel->name ?>">
										</div>

										<div class="mb-3 ">
											<label class="form-label">description</label>
											<textarea class="form-control" placeholder="description" rows="2"><?php echo $hotel->Adresse ?></textarea>
										</div>
										<div class="mb-3 ">
											<label class="form-label">Password</label>
											
												<input type="password" class="form-control" placeholder="Password">
											
										</div>
									

										<fieldset class="mb-3">
											<div class="row">
												<label class="form-label">Statut</label>
												<div class="col-sm-10">
													<label class="form-check">
														<input name="radio-3" type="radio" class="form-check-input" <?php if ($hotel->statut == 0 ){ echo "checked" ; }  ?> >
														<span class="form-check-label">Actif</span>
													</label>
													<label class="form-check">
														<input name="radio-3" type="radio" class="form-check-input"  <?php if ($hotel->statut == 1 ){ echo "checked" ; }  ?>>
														<span class="form-check-label">Closed</span>
													</label>
													
												</div>
											</div>
										</fieldset>
										
										
										<button type="submit" class="btn btn-primary">Submit</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-12 col-xl-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Contact</h5>
									<h6 class="card-subtitle text-muted">Palmyra <?php echo $hotel->name?>.</h6>
								</div>
								<div class="card-body">
									<form>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">Maps</label>
											<div class="col-sm-10">
												 <iframe id="map" class="map" src="<?php echo $hotel->longitude ?>" style="border:0;" allowfullscreen="true" loading="lazy"></iframe>
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">phone</label>
											<div class="col-sm-10">
												<input type="tel" class="form-control" placeholder="phone" value="<?php echo $hotel->phone ?>">
											</div>

										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">mail</label>
											<div class="col-sm-10">
												<input type="email" class="form-control" placeholder="mail" value="<?php echo $hotel->mail ?>">
											</div>
										</div>
										
										
										<div class="mb-3 row">
											<div class="col-sm-10 ms-sm-auto">
												<button type="submit" class="btn btn-primary">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="col-12 col-xl-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Rooms</h5>
									<h6 class="card-subtitle text-muted">Palmyra <?php echo $hotel->name?>.</h6>
								</div>
								<div class="card-body">
									<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Room</th>
												<th>Capacity</th>
												<th>options</th>
												
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($rooms as $room ){ ?> 
											<tr>
												<td><?php echo $room->titre ?></td>
												<td><?php echo $room->capacity ?></td>
												<td><?php foreach ($room->options as $option) { echo $option->option."<br>" ;  }?></td>
												
												<td></td>
												
											</tr>
										<?php } ?> 
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="col-12 col-xl-6">
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
												<th>Room</th>
												<th>Price</th>
												<td>TT Price</td>
											</tr>
										</thead>
										<tbody>
											
											<tr>
												<td>Room</td>
												<td><?php echo $hotelPrice->price ?> DT</td>
											</tr>
											<tr>
												<td>Sup Single</td>
												<td>+<?php echo $hotelPrice->supS ?> DT</td>
												<td>+<?php echo $hotelPrice->supS + $hotelPrice->price ?> DT</td>
											</tr>
											<tr>
												<td>PD</td>
												<td>+<?php echo $hotelPrice->PD ?> DT</td>
												<td>+<?php echo $hotelPrice->PD + $hotelPrice->price ?> DT</td>
											</tr>
											<tr>
												<td>DP</td>
												<td>+<?php echo $hotelPrice->DP ?> DT</td>
												<td>+<?php echo $hotelPrice->DP + $hotelPrice->price ?> DT</td>
											</tr>
											<tr>
												<td>PC</td>
												<td>+<?php echo $hotelPrice->PC ?> DT</td>
												<td>+<?php echo $hotelPrice->PC + $hotelPrice->price ?> DT</td>
											</tr>
											<tr>
												<td>ALLS</td>
												<td>+<?php echo $hotelPrice->ALLS ?> DT</td>
												<td>+<?php echo $hotelPrice->ALLS + $hotelPrice->price ?> DT</td>
											</tr>
											<tr>
												<td>ALLH</td>
												<td>+<?php echo $hotelPrice->ALLH ?> DT</td>
												<td>+<?php echo $hotelPrice->ALLH + $hotelPrice->price ?> DT</td>
											</tr>

										
										</tbody>
									</table>
								</div>
							</div>
						</div>

					
						
					</div>

				</div>
			</main>