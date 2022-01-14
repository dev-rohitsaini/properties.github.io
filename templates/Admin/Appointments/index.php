

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property[]|\Cake\Collection\CollectionInterface $properties
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>

    <!-- Google Font: Source Sans Pro -->
   
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
                                    <h3 class="card-title">Properties with Acitve and Inactive status</h3>
                                </div>
                                <!-- /.card-header -->
                              
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card">
                               
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                   
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('slot') ?></th>
                    <th><?= $this->Paginator->sort('Appointment Genrated Date') ?></th>
                    <th><?= $this->Paginator->sort('process') ?></th>
                              
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?= $this->Number->format($appointment->id) ?></td>
                    <td><?= h($appointment->date) ?></td>
                    <td><?= h($appointment->slot) ?></td>
                    <td><?= h($appointment->created_date) ?></td>
                    <td><?php if ($appointment->process == 1) : ?>
                                                            <?= $this->Form->postLink(__('Accept'), ['controller'=>'appointments','action' => 'status', $appointment->id, $appointment->process], ['confirm' => __('accpet the request # {0}?')]) ?>

                                                        <?php elseif($appointment->process == 2) : ?>
                                                            <?= $this->Form->postLink(__('complete this'), ['controller'=>'appointments','action' => 'status',  $appointment->id, $appointment->process], ['confirm' => __('request completed # {0}?')]) ?>
                                                      
                                                     
                                                        <?php endif; ?>


                                                        <?php if($appointment->process!=5) : ?>
                                                            <?= $this->Form->postLink(__('Reject'), ['controller'=>'appointments','action' => 'reject', $appointment->id,$appointment->process  ], ['confirm' => __('Are you sure you want to reject this request#?')])  ?>
                                                        <?php elseif($appointment->process==5) : ?>
                                                            <?= $this->Form->postLink(__('Rejected'), ['controller'=>'appointments','action' => 'reject', $appointment->id, $appointment->process], ['confirm' => __('Are you sure you want to reject this request?')]) ?>
                                                            <?php else : ?>
                                                            <?= $this->Form->postLink(__('Rejected'), ['controller'=>'appointments','action' => 'reject', $appointment->id, $appointment->process], ['confirm' => __('Are you sure you want to active # {0}?')]) ?>
                                                        <?php endif; ?></td>
    
                    
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $appointment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appointment->id]) ?>
      
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
    <!-- ./wrapper -->

    <!-- jQuery -->
   
</body>

</html>


