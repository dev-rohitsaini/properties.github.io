<!DOCTYPE html>
<html lang="en">

<body class="hold-transition sidebar-mini">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | DataTables</title>
        <!-- Google Font: Source Sans Pro -->
    </head>
    <div class="wrapper">
        <!-- Navbar -->
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
                                    <h3 class="card-title">All Appointments</h3>
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
                                                <th><?= $this->Paginator->sort('Users_Id') ?></th>
                                                <th><?= $this->Paginator->sort('Properties_Id') ?></th>
                                                <th><?= $this->Paginator->sort('Appointments_Id') ?></th>
                                                <th><?= $this->Paginator->sort('Process') ?></th>
                                                <th><?= $this->Paginator->sort('status') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($hello as $user) : ?>
                                                <tr>
                                                   
                                                    <td><?= $this->Number->format($user->id) ?></td>
                                                    <td><?= h($user->user->user_profile->first_name.' '.$user->user->user_profile->last_name)?  $this->Html->link($user->user->user_profile->first_name.' '.$user->user->user_profile->last_name,['controller' => 'users', 'action' => 'usep', $user->user->id]) : '' ?></td>
                                                    
                                                    
                                                    
                                                    
                                                    <td><?= h($user->property->property_title)? $this->Html->link($user->property->property_title,['controller' => 'properties', 'action' => 'view', $user->property->id]) : '' ?></td>
                                                   
                                                   
                                                   
                                                   
                                                    <td><?= h($user->appointment_id)?  $this->Html->link($user->appointment_id,['controller' => 'appointments', 'action' => 'index', $user->appointment_id]) : '' ?></td>
                                                    <td>
                                                    <?php if ($user->appointment->process == 1) : ?>
                                                            <?= $this->Form->postButton(__('Accept'), ['controller'=>'appointments','action' => 'status', $user->appointment_id, $user->appointment->process], ['confirm' => __('accpet the request # {0}?'),'class'=>'btn btn-primary']) ?>

                                                        <?php elseif($user->appointment->process == 2) : ?>
                                                            <?= $this->Form->postButton(__('complete this'), ['controller'=>'appointments','action' => 'status',  $user->appointment_id, $user->appointment->process], ['confirm' => __('request completed # {0}?'),'class'=>'btn btn-primary']) ?>
                                                        <?php elseif($user->appointment->process == 4) : ?>
                                                           <?= "cancelled request"; ?> 
                                                           <?php elseif($user->appointment->process==3) : ?>
                                                           <?= "Request Completed" ?>
                                                     
                                                        <?php endif; ?>


                                                        <?php if($user->appointment->process!=5) : ?>
                                                            <?= $this->Form->postButton(__('Reject'), ['controller'=>'appointments','action' => 'reject', $user->appointment_id,$user->appointment->process  ], ['confirm' => __('Are you sure you want to reject this request#?'),'class'=>'btn btn-danger'])  ?>
                                                        <?php elseif($user->appointment->process==5) : ?>
                                                           <?= "Rejected" ?>
                                                         
                                                            <?php else : ?>
                                                            <?= $this->Form->postButton(__('Rejected'), ['controller'=>'appointments','action' => 'reject', $user->appointment_id, $user->appointment->process], ['confirm' => __('Are you sure you want to active # {0}?'),'class'=>'btn btn-danger']) ?>
                                                        <?php endif; ?>
                                                    </td>

                                                    <td>
                                                        <?php if ($user->status == 2) : ?>
                                                            <?= $this->Form->postButton(__('Active'), ['action' => 'status', $user->id, $user->status], ['confirm' => __('Are you sure you want to inactive # {0}?'),'class'=>'btn btn-secondary']) ?>
                                                        <?php else : ?>
                                                            <?= $this->Form->postButton(__('Inactive'), ['action' => 'status', $user->id, $user->status], ['confirm' => __('Are you sure you want to active # {0}?'),'class'=>'btn btn-secondary']) ?>
                                                        <?php endif; ?>
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

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->

</body>

</html>