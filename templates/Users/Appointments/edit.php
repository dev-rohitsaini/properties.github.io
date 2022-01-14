<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment $appointment
 */
?>


<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment $appointment
 */
?>

                       
                       
<!DOCTYPE html>
<html lang="en">
  
  <body>
                       
                       <div class="product-big-title-area ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="product-bit-title text-center">
                                                    <h2>*88*</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>        
<div class="row"><div class="text-center">
    <div class="column-responsive column-80 "     >
        <div class="appointments form content">
            <?= $this->Form->create($appointment) ?>
            <fieldset>
                <legend><?= __('Edit Appointment') ?></legend>
                <div class="col-md-3 float-right" style="margin-left:600px" >
                
                <?=   $this->Form->control('date',['class'=>'form-control','margin-left'=>'100px']);?>
               
                   <?=  $this->Form->control('slot',['class'=>'form-control']);?>
                </div>
                
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
                  
                </div>
            </div>
        </div>
    </div>
    





  </body>
</html>