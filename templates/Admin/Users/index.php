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
                                    <h3 class="card-title">Users with Acitve and Inactive status</h3>
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
                                            <th><?= $this->Paginator->sort('first_name') ?></th>
                                            <th><?= $this->Paginator->sort('last_name') ?></th>
                                            <th><?= $this->Paginator->sort('email') ?></th>
                                            <th><?= $this->Paginator->sort('contact') ?></th>
                                            <th><?= $this->Paginator->sort('address') ?></th>
                        
                        
                                            
                                            <th><?= $this->Paginator->sort('status') ?></th>
                                            <th><?= $this->Paginator->sort('Profile_image') ?></th>
                                            <th class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user) : ?>
                                            <tr>
                                                <td><?= $this->Number->format($user->id) ?></td>
                                                <td><?= h($user->user_profile->first_name) ?></td>
                                                <td><?= h($user->user_profile->last_name) ?></td>
                        
                                                <td><?= h($user->email) ?></td>
                                                <td><?= h($user->user_profile->contact) ?></td>
                                                <td><?= h($user->user_profile->address) ?></td>
                        
                                    
                        
                                                <td>
                                                    <?php if ($user->status == 2) : ?>
                                                        <?= $this->Form->postLink(__('Active'), ['action' => 'status', $user->id, $user->status], ['confirm' => __('Are you sure you want to inactive # {0}?', $user->user_profile->first_name.' '.$user->user_profile->last_name)]) ?>
                                                    <?php else : ?>
                                                        <?= $this->Form->postLink(__('Inactive'), ['action' => 'status', $user->id, $user->status], ['confirm' => __('Are you sure you want to active # {0}?', $user->user_profile->first_name.' '.$user->user_profile->last_name)]) ?>
                                                    <?php endif; ?>
                                                
                                                </td>
                                                
                                                <td>
                                                <?php echo $this->Html->link(
    $this->Html->image($user->user_profile->profile_image,array('height' => '100', 'width' => '150', 'onmouseover'=>'bigImg(this)' ,'onmouseout'=>'normalImg(this)')),['action'=>'usep',$user->id]
  , array('escape' => false)
);?>    
                                                
                                                
                                                
                                               </td>
                                                <td class="actions">
                        
                                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_profile->first_name.' '.$user->user_profile->last_name)]) ?>
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