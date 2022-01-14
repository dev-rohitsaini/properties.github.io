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
            <h2>Appointments Details</h2>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="col-md-12" >
    <div class="ibox">
      <div class="ibox-content product-box">
        <table>
          <tr>
            <th><?= __('Id') ?></th>
            <td margin-left="100px"><?= $this->Number->format($appointment->id) ?></td>
          </tr>
          <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($appointment->date) ?></td>
          </tr>
          <tr>
            <th><?= __('Slot') ?></th>
            <td><?= h($appointment->slot) ?></td>
          </tr>
          <tr>
            <th><?= __('Created Date') ?></th>
            <td><?= h($appointment->created_date) ?></td>
          </tr>
          <tr>
            <th><?= __('Status') ?></th>

            <td><?php if ($appointment->process == 1) : ?>
                <?= $this->Form->postLink(__('Canel Request'), ['action' => 'status', $appointment->id, $appointment->process], ['confirm' => __('Are you sure you want to Canecl the request # {0}?', $appointment->id)]) ?>
              <?php else : ?>
                <?= "Request cancelled"; ?>
              <?php endif; ?></td>
          </tr>
          <th>Action</th>
          <td>
            <a href="<?php echo $this->Url->build(['action' => 'edit', $appointment->id]) ?>"></i>Reschedule Appointment </a>
          </td>
        </table>
      </div>

    </div>
  </div>







</body>

</html>