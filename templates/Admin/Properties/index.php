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
                                    <a href="<?= $this->Url->build(['controller'=>'Properties','action'=>'add']) ?>" class="nav-link btn btn-parimary text-right" >                                <i class="nav-icon btn btn-primary " value="Logout" >Add Properties</i></a>
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
                    <th><?= $this->Paginator->sort('property_title') ?></th>
                    <th><?= $this->Paginator->sort('property_description') ?></th>
                    <th><?= $this->Paginator->sort('categories') ?></th>
                  
                    <th><?= $this->Paginator->sort('property_tags') ?></th>
                    <th><?= $this->Paginator->sort('Posted Date') ?></th>

                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('property_image') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($properties as $property): ?>
                <tr>
                    <td><?= $this->Number->format($property->id) ?></td>
                    <td><?= h($property->property_title) ?></td>
                    <td><?= h($property->property_description) ?></td>
                    <td><?= $property->has('property_category') ? $this->Html->link($property->property_category->category_name, ['controller' => 'PropertyCategories', 'action' => 'view', $property->property_category->id]) : '' ?></td>
                   
                    <td><?= h($property->property_tags) ?></td>
                    <td><?= h($property->created_date) ?></td>

                        <td><?php if ($property->status == 1): ?>
                            <?= $this->Form->postLink(__('Inactive'), ['action' => 'status', $property->id, $property->status], ['confirm' => __('Are you sure you want to inactive # {0}?', $property->property_title)]) ?>
                            <?php else: ?>
                            <?= $this->Form->postLink(__('Active'), ['action' => 'status', $property->id, $property->status], ['confirm' => __('Are you sure you want to active # {0}?', $property->property_title)]) ?>
                            <?php endif; ?></td>
                            <td> <?php echo $this->Html->link(
    $this->Html->image($property->property_image,array('height' => '100', 'width' => '150', 'onmouseover'=>'bigImg(this)' ,'onmouseout'=>'normalImg(this)')),['action' => 'view', $property->id]
  , array('escape' => false)
);?>
                
             
</td>
                    <td class="actions">
                    
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $property->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->property_title)]) ?>
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


