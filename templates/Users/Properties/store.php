                       <!DOCTYPE html>
                       <html lang="en">

                       <body>

                         <div class="product-big-title-area">
                           <div class="container">
                             <div class="row">
                               <div class="col-md-12">
                                 <div class="product-bit-title text-center">
                                   <h2>Property That Match Your Requirements</h2>
                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>

                         <?php foreach ($properties as $property) : ?>


                           <div class="col-sm-3">
                             <div class="ibox">
                               <div class="ibox-content product-box">
                                 <div class="product-imitation">

                                   <td><a href='<?php echo $this->Url->build(['controller' => 'Properties', 'action' => 'view', $property->id]) ?> '>
                                       <?= $this->Html->image($property->property_image, ['height' => '500', 'width' => '300']) ?></a></td>
                                 </div>

                                 <div class="product-desc">
                                   <h4><b> <?= h($property->property_title); ?></b></h4>
                                 </div>
                                 <div class="m-t text-righ">
                                   Posted Date: <?= h($property->created_date) ?>

                                 </div>

                               </div>
                             </div>
                           </div>


                         <?php endforeach; ?>
                         <div class="row">
                           <div class="col-md-12">
                             <div class="product-pagination text-center">
                               <nav>
                                 <ul class="pagination">
                                   <li>
                                     <a href="#" aria-label="Previous">
                                       <span aria-hidden="true">&laquo;</span>
                                     </a>
                                   </li>
                                   <li><a href="#">1</a></li>
                                   <li><a href="#">2</a></li>
                                   <li><a href="#">3</a></li>
                                   <li><a href="#">4</a></li>
                                   <li><a href="#">5</a></li>
                                   <li>
                                     <a href="#" aria-label="Next">
                                       <span aria-hidden="true">&raquo;</span>
                                     </a>
                                   </li>
                                 </ul>
                               </nav>
                             </div>
                           </div>
                         </div>
                         </div>
                         </div>Registered



                       </body>

                       </html>