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
                                    <h3 class="card-title text-center">My appointments</h3>
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
                                                <th><?= $this->Paginator->sort('Properties_name') ?></th>
                                                <th><?= $this->Paginator->sort('Appointments_Id') ?></th>
                                                <th><?= $this->Paginator->sort('Status') ?></th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($hello as $user) : ?>
                                            
                                                <tr>
                                                    <td><?= $this->Number->format($user->id) ?></td>
                                                    <?php foreach ($helo as $uer) : ?>
                                                    <td><?= h($uer->first_name.' '.$uer->last_name) ?></td>
                                                    <?php endforeach; ?>
                                                    <td><?= h($user->property->property_title)? $this->Html->link($user->property->property_title,['controller' => 'properties', 'action' => 'view', $user->property->id]) : '' ?></td>
                                                   
                                                   
                                                   
                                                   
                                                    <td><?= h($user->appointment_id)?  $this->Html->link('See Details',['controller' => 'appointments', 'action' => 'view', $user->appointment_id]) : '' ?></td>
                                                    <td>
                                                    <?php if ($user->appointment->process == 1) : ?>
                                                            <?= "Requested for appointment"; ?>

                                                        <?php elseif($user->appointment->process == 2) : ?>
                                                            <?= "Appointment Booked"; ?>
                                                        <?php elseif($user->appointment->process == 3) : ?>
                                                           <?= "Requested Completed"; ?> 
                                                           <?php elseif($user->appointment->process == 4) : ?>
                                                           <?= "cancelled request"; ?> 
                                                           <?php elseif($user->appointment->process == 4) : ?>
                                                           <?= "request Rejected"; ?> 
                                                     
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


