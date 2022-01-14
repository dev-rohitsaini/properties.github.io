<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyCategory[]|\Cake\Collection\CollectionInterface $propertyCategories
 */
?>

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
        <!-- Navbar -->
       
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
                                <div class="col-md-8">   
                                <h3 class="card-title">Property_categories with Acitve and Inactive status</h3>
                                    </div><div class="text-right">
                                    <a href="<?= $this->Url->build(['action'=>'add']) ?>" class ="btn btn-primary "  >Add Categories</a>
                                </div></div>
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
                    <th><?= $this->Paginator->sort('category_name') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($propertyCategories as $propertyCategory): ?>
                <tr>
                    <td><?= $this->Number->format($propertyCategory->id) ?></td>
                    <td><?= h($propertyCategory->category_name) ?></td>
                    <td><?php if ($propertyCategory->status == 1): ?>
                           <?= $this->Form->postButton(__('Inactive'),['action' => 'status', $propertyCategory->id, $propertyCategory->status,'class'=>'btn btn-primary'], ['confirm' => __('Are you sure you want to inactive # {0}?', $propertyCategory->category_name),'class'=>'btn btn-secondary']) ?>
                            <?php else: ?>
                            <?= $this->Form->postButton(__('Active'), ['action' => 'status', $propertyCategory->id, $propertyCategory->status], ['confirm' => __('Are you sure you want to active # {0}?', $propertyCategory->category_name),'class'=>'btn btn-secondary']) ?>
                            <?php endif; ?></td>
                            
        
                    <td class="actions ">
                    <a class="btn btn-success" href="<?= $this->Url->build(['action'=>'view',$propertyCategory->id]) ?> ">View  </a>
                        <a class="btn btn-success" href="<?= $this->Url->build(['action'=>'edit',$propertyCategory->id]) ?> ">Edit  </a>



                        <?= $this->Form->postButton(__('Delete'),['action' => 'delete', $propertyCategory->id],['confirm' => __('Are you sure you want to delete # {0}?', $propertyCategory->category_name),'class'=>'btn btn-danger']) ?>
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



