


<!DOCTYPE html>
<html lang="en">

<head>
  
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
      
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
     
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                          
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><?php    ?></a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Property Details</h3>
                                </div>
                                <!-- /.card-header -->
                              
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card">
                               
                                <!-- /.card-header -->
                                <div class="card-body">
                              
                                <table>
                <tr>
                    <th><?= __('Process') ?></th>
                    <td><?= h($appointment->process) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($appointment->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($appointment->id) ?></td>
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
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($appointment->modified_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Apo Links') ?></h4>
                <?php if (!empty($appointment->apo_links)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Appointment Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Properties Id') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created Date') ?></th>
                            <th><?= __('Modified Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($appointment->apo_links as $apoLinks) : ?>
                        <tr>
                            <td><?= h($apoLinks->id) ?></td>
                            <td><?= h($apoLinks->appointment_id) ?></td>
                            <td><?= h($apoLinks->user_id) ?></td>
                            <td><?= h($apoLinks->properties_id) ?></td>
                            <td><?= h($apoLinks->status) ?></td>
                            <td><?= h($apoLinks->created_date) ?></td>
                            <td><?= h($apoLinks->modified_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ApoLinks', 'action' => 'view', $apoLinks->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ApoLinks', 'action' => 'edit', $apoLinks->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ApoLinks', 'action' => 'delete', $apoLinks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apoLinks->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
   
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

</body>

</html>