<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment $appointment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Appointments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="appointments form content">
            <?= $this->Form->create($appointment) ?>
            <fieldset>
                <legend><?= __('Add Appointment') ?></legend>
                <?php
                    echo $this->Form->control('date',['type'=>'date','class'=>'form-control']);
                    echo $this->Form->control('slot',['type'=>'time','class'=>'form-control']);
                  
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class'=>'btn  btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


