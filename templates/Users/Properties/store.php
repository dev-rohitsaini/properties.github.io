                       <!DOCTYPE html>
                       <html lang="en">
                       <script src="http://code.jquery.com/jquery-latest.js"></script>

                       <?php
                        echo $this->Html->script('custom');
                        ?>

                       <body>
                       <table>
                         <form >
                         <input type="text" id="search" class="form" autocomplete="off">
                         </form>
                         <tr><td id="table">

                         </td></tr>
                       </table>
                         <table>
                         </table>



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


                         <table id="example" class="display table" width="100%" cellspacing="0" style="margin-left: 25px;">
                           <thead>
                             <tr>
                               <th>Property Title</th>
                               <th>Posted Date</th>
                               <th>Image</th>
                             </tr>
                           </thead>
                          
                           <?php foreach ($properties as $property) : ?>

                             <tr>
                               <td><?= h($property->property_title); ?></td>
                               <td><?= h($property->created_date) ?></td>
                               <td><a href='<?php echo $this->Url->build(['controller' => 'Properties', 'action' => 'view', $property->id]) ?> '>
                                   <?= $this->Html->image($property->property_image, ['height' => '500', 'width' => '300']) ?></a></td>
                             </tr>
                           <?php endforeach; ?>

                         </table>
                     
                       </body>

                       </html>
                       <?php echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
                       <script>
                         var csrfToken = $('meta[name="csrfToken"]').attr('content');
                       </script>
                       <script>
                         $(document).ready(function() {
                           $.ajaxSetup({
                             headers: {
                               'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
                             },
                           });
                           $('#search').on("keydown", function() {
                             var search_term = $(this).val();
                             var targeturl = "/users/Properties/search";

                             $.ajax({
                               url: targeturl,
                               type: "GET",
                               data: {
                                 search: search_term
                               },                            
                               success: function(data) {
           $("#table").html(data);
         }
                             });

                           });

                         });
                       </script>