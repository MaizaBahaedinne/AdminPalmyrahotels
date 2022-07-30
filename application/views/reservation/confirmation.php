    <title>Palmyra Hotels &amp; <?php echo $pageTitle ; ?></title>

    <!-- PICK ONE OF THE STYLES BELOW -->

<script src="https://www.palmyrahotels.tn/assets/js/qrcode.js"></script>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<main class="content" >
   <div class="container-fluid" >
     
      <div class="row">
         
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                     <?php if($reservation->statut == 1 ) { ?>
                     <button class="btn btn-danger" style="float:right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">        Decline
                     </button>
                     <a  href="<?php echo base_url() ?>Confirmation/AcceptOrder/<?php echo $reservation->reservationId ?>" class="btn btn-success" style="float:right;" >
                     Accept
                     </a>
                     <?php } ?>

                     <?php if($reservation->statut == 2 ) { ?> <span class="badge bg-success" style="float:right;" >Order has been accepted <?php echo $reservation->approuvedDTM ;?></span> <?php  }?> 
                      <?php if($reservation->statut == 3 ) { ?> <span class="badge bg-danger"  style="float:right;color: white" >Order has been refused <?php echo $reservation->approuvedDTM ;?> <hr> <b>Cause :</b> <?php echo $reservation->cause ?> </span> <?php  }?> 
               </div>
               <div class="card-body">
                                    
                     <div    id="ivoic">
                        <div >
                           <div class="row">
                              <div class="col-12">
                                 <div class="invoice-title">
                                       
                                        <table width="100%" class="table ">
                           <tr>
                              <td width="30%" ><img src="https://www.palmyrahotels.tn/assets/img/logopage.png" width="120px"></td>
                              <td></td>
                              <td width="30%">
                                 <div id="qrcode" style="float:right;"></div>
                                 <script type="text/javascript">
                                    var qrcode = new QRCode("qrcode", {
                                                        text: "<?php echo $reservation->reservationId ?>",
                                                        width: 100,
                                                        height: 100,
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
                        <span class="pull-right"><?php echo $hotel->Adresse ?></span>
                     </div>
                     <hr>
                     <table width="100%">
                        <tr>
                           <td>
                              <address>
                                 <strong>From :</strong> <?php echo $reservation->checkin ?> 14:00 <br>
                                 <strong>To :</strong> <?php echo $reservation->checkout ?> 12:00 <br>
                                 <strong>Stay :</strong> <?php echo $reservation->nights ?> nghits <br>
                                 <strong>Pension:</strong> <?php if($reservation->pension == 'PD'  ){ echo 'Continental breakfast included' ;  } ?>
                                                                                <?php if($reservation->pension == 'DP'  ){ echo 'Continental breakfast & dinner included' ;  } ?>
                                                                                <?php if($reservation->pension == 'PC'  ){ echo 'Continental breakfast , lunch & dinner included' ;  } ?>
                                                                                <?php if($reservation->pension == 'ALLS'  ){ echo 'All in soft' ;  } ?>
                                                                                <?php if($reservation->pension == 'ALLH'  ){ echo 'All in hard' ;  } ?><br>
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
                        <div class="">
                            <table class="table table-bordered "  width="100%" border="1">
                              <thead>
                                 <tr>
                                    
                                    <td width="20%"><strong>Item</strong></td>
                                    <td class="text-center" width="5%"><strong>Adult</strong></td>
                                    <td class="text-center" width="5%"><strong>child</strong></td>
                                    <td class="text-center" width="20%"><strong>Guests</strong></td>
                                    <td class="text-center" width="15%"><strong>Options</strong></td>
                                    <td class="text-center" width="15%" ><strong>Price</strong></td>
                                    <td class="text-center" width="15%" ><strong>Total</strong></td>
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
                                     <td class="text-center"><?php echo $detail->price *  $reservation->nights  ?> <sup>DT</sup></td>
                                 </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
                           <table class=" "  width="100%"  >
                              <tbody>
                                 <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center" width="20%"><strong>Sub total</strong></td>
                                    <td class="thick-line text-right" width="10%"><?php echo $reservation->price ?><sup>DT</sup></td>
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
                                    <td class="no-line text-right"><?php echo $reservation->price + ( $reservation->adult * 2  *  $reservation->nights  ) ?><sup>DT</sup></td>
                                 </tr>
                              </tbody>
                           </table>

                           <b>thank you for your trust.<br>

                           Your reservation request will only be definitively confirmed after payment at the hotel </b>
                           <br>
                           <b style="color:palevioletred ;"> Amount to pay at the hotel: <?php echo $reservation->price + ( $reservation->adult * 2  *  $reservation->nights  ) ?>  <sup>DT</sup> </b>                                                         

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
   </div>
</main>


   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url() ?>Confirmation/RefuseOrder/<?php echo $reservation->reservationId ?>" >
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Decline cause</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
            <label>Please define the cause</label><br><small>* Private note for the administration</small>
            <textarea rows="10" name="cause" class="form-control" required></textarea>
         </div>
         <div class="modal-footer">
           
           <button type="submit" class="btn btn-primary">send</button>
         </div>
      </form>
    </div>
  </div>
</div>