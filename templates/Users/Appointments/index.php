<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment[]|\Cake\Collection\CollectionInterface $appointments
 */
?>

<div class="appointments index content">
    
    <h3><?= __('Appointments') ?></h3>
    <div class="table-responsive">
        <table   >
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Refernce number') ?></th>
                    <th><?= $this->Paginator->sort('Appontment date') ?></th>
                    <th><?= $this->Paginator->sort('Appontment  Timings') ?></th>
   
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('Request Genreated date and time') ?></th>

                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?= $this->Number->format($appointment->id) ?></td>
                    <td><?= h($appointment->date) ?></td>
                    <td><?= h($appointment->slot) ?></td>

                    <td><?php if($appointment->process == 1){
                        echo "requested";
                    }if($appointment->process == 2){
                        echo "Appointemnt Booked";
                    }if($appointment->process == 3){
                        echo "Request Completed";
                    }if($appointment->process == 4){
                        echo "Request Cancelled";
                    } if($appointment->process == 5){
                        echo "Can't process this request";
                    } ?></td>
                 
                    <td><?= h($appointment->created_date) ?></td>
             
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $appointment->id]) ?>
                        <?= $this->Html->link(__('Reschedule Appointment'), ['action' => 'edit', $appointment->id]) ?>
                     
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>



