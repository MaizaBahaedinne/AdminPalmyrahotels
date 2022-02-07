<link href="https://www.palmyrahotels.tn/assets/css/admin-1.css" rel="stylesheet">
<link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet">
<script src="https://www.palmyrahotels.tn/assets/js/qrcode.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js"></script>
<main class="content">
   <div class="container-fluid">
      <div class="header">
         <h1 class="header-title">
            Booking : <?php echo $reservation->reservationId ?>
         </h1>
      </div>
      <div class="row">
         <div class="col-8">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title"></h5>
               </div>
               <div class="card-body">
                  <div id="tabs" class="tabs">
                     <button type="button" onclick="printJS('ivoic', 'html')">
                     Print Form
                     </button>
                     <div class="content" style=" padding: 35px;border-radius: 30px;   background: url('https://www.palmyrahotels.tn/assets/img/logopageBG.png') ; background-repeat: no-repeat ; background-size: 50% auto; background-color: white; background-position: center; "  id="ivoic">
                        <div class="container">
                           <div class="row">
                              <div class="col-12">
                                 <div class="invoice-title">
                                    <table width="100%">
                                       <tr>
                                          <td width="30%" ><img src="https://www.palmyrahotels.tn/assets/img/logopage.png" width="150px"></td>
                                          <td></td>
                                          <td width="30%">
                                             <div id="qrcode" style="float:right;"></div>
                                             <script type="text/javascript">
                                                var qrcode = new QRCode("qrcode", {
                                                                    text: "<?php echo $reservation->reservationId ?>",
                                                                    width: 128,
                                                                    height: 128,
                                                                    colorDark : "#000000",
                                                                    colorLight : "#ffffff",
                                                                    correctLevel : QRCode.CorrectLevel.H
                                                                });
                                                qrcode.clear(); // clear the code.
                                                qrcode.makeCode("<?php echo $reservation->reservationId ?>"); // make another code.
                                             </script>
                                          </td>
                                       </tr>
                                    </table>
                                    <h3 class="pull-right">Order # <?php echo $reservation->reservationId ?></h3>
                                    <h3 class="pull-right">Palmyra <?php echo $hotel->name ?></h3>
                                    <span class="pull-right"><?php echo $hotel->Adresse ?></h3>
                                 </div>
                                 <hr>
                                 <table width="100%">
                                    <tr>
                                       <td>
                                          <address>
                                             <strong>From :</strong> <?php echo $reservation->checkin ?> 14:00 <br>
                                             <strong>To :</strong> <?php echo $reservation->checkout ?> 12:00 <br>
                                             <strong>Stay :</strong> <?php echo $reservation->nights ?> nghits <br>
                                             <strong>Pension:</strong> <?php echo $reservation->pension ?><br>
                                          </address>
                                       </td>
                                       <td>
                                          <address>
                                             <strong>Shipped To:</strong><br>
                                             <?php echo $reservation->client->name ?><br>
                                             <?php echo $reservation->client->address ?><br>
                                             <?php echo $reservation->client->city ?> <?php echo $reservation->client->country ?><br>
                                             <?php echo $reservation->client->zip ?>
                                          </address>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <address>
                                             <strong>Payment Method:</strong><br>
                                             Visa ending **** 4242<br>
                                             <?php echo $reservation->client->email ?>
                                          </address>
                                       </td>
                                       <td width="30%">
                                          <address>
                                             <strong>Order Date:</strong><br>
                                             <?php echo $reservation->createdDTM ?><br><br>
                                          </address>
                                       </td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                                 </div>
                                 <div class="panel-body">
                                    <div class="table-responsive">
                                      <table class="table "  width="100%">
                              <thead>
                                 <tr>
                                    
                                    <td width="20%"><strong>Item</strong></td>
                                    <td class="text-center" width="5%"><strong>Adult</strong></td>
                                    <td class="text-center" width="5%"><strong>child</strong></td>
                                    <td class="text-center" width="20%"><strong>Guests</strong></td>
                                    <td class="text-center" width="25%"><strong>Options</strong></td>
                                    <td class="text-center" width="10%" ><strong>Price</strong></td>
                                    <td class="text-center" width="10%" ><strong>Total</strong></td>
                                 </tr>
                              </thead>
                              <tbody>
                                 <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                 <?php foreach ( $reservation->details as $detail ) {  ?>
                                 <tr>
                                    
                                    <td><?php echo $detail->room->titre ?></td>
                                    <td class="text-center"><?php echo $detail->adult ?></td>
                                    <td class="text-center"><?php echo $detail->children ?></td>
                                    <td> <?php foreach ( json_decode($detail->guests) as $gt) { echo '<li>'.$gt.'</li>' ; }  ?>   </td>
                                    <td >
                                       <ul>
                                          <?php foreach ($detail->opts as $option ){ echo "<li>".$option->option."</li>" ; } ?>
                                       </ul>
                                    </td>
                                    <td class="text-center"><?php echo $detail->price ?> <sup>DT</sup></td>
                                     <td class="text-center"><?php echo $detail->price *  $reservation->nights *  $reservation->adult  ?> <sup>DT</sup></td>
                                 </tr>
                                 <?php } ?>

                                 <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Sub total</strong></td>
                                    <td class="thick-line text-right"><?php echo $reservation->price ?><sup>DT</sup></td>
                                 </tr>
                                 <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="no-line text-center"><strong>Taxe</strong></td>
                                    <td class="no-line text-right"><?php  echo $reservation->adult * 2 *  $reservation->nights ?><sup>DT</sup></td>
                                 </tr>
                                  <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right"><?php echo $reservation->price + ( $reservation->adult * 2) ?><sup>DT</sup></td>
                                 </tr>
                              </tbody>
                           </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xxl-4">
                <div class="card">
                        <div class="card-header">
                                <div class="card-actions float-end">
                                        <a href="#" class="me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw align-middle"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                                        </a>
                                        <div class="d-inline-block dropdown show">
                                                <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                        </div>
                                </div>
                                <h5 class="card-title mb-0"><?php echo $reservation->client->name ?></h5>
                        </div>
                        <div class="card-body">
                                <div class="row g-0">
                                        <div class="col-sm-3 col-xl-12 col-xxl-4 text-center">
                                                <img src="https://www.palmyrahotels.tn/img/avatars/<?php echo $reservation->client->avatar ?>" width="64" height="64" class="rounded-circle mt-2" alt="<?php echo $reservation->client->name ?>">
                                        </div>
                                        <div class="col-sm-9 col-xl-12 col-xxl-8">
                                                <strong>Address</strong>
                                                <p><?php echo $reservation->client->address ?>
                                                <?php echo $reservation->client->country ?>
                                                <?php echo $reservation->client->zip ?></p>
                                                
                                        </div>
                                </div>

                                <table class="table table-sm my-2">
                                        <tbody>
                                                <tr>
                                                        <th>Name</th>
                                                        <td><?php echo $reservation->client->name ?></td>
                                                </tr>
                                                <tr>
                                                        <th>Country</th>
                                                        <td><?php echo $reservation->client->country ?></td>
                                                </tr>
                                                <tr>
                                                        <th>Country code</th>
                                                        <td><?php echo $reservation->client->country_code ?></td>
                                                </tr>
                                                <tr>
                                                        <th>Phone</th>
                                                        <td><?php echo $reservation->client->phone ?></td>
                                                </tr>
                                                <tr>
                                                        <th>Email</th>
                                                        <td><?php echo $reservation->client->email ?></td>
                                                </tr>
                                               
                                                
                                                <tr>
                                                        <th>Status</th>
                                                        <td><span class="badge bg-success">Active</span></td>
                                                </tr>
                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>
      </div>
   </div>
</main>