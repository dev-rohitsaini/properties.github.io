

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
                                <h3><td><?= h($property->property_title) ?></td></h3>
            <table id="example1" class="table table-bordered table-striped">
                <tr><tr><?= $this->html->image($property->property_image,array('height' => '500', 'width' => '700'))  ?>
                    <th><?= __('Property Id') ?></th>
                    <th><?= h($property->id) ?></th>
                </tr>
                <tr>
                    <th><?= __('Property Description') ?></th>
                    <td><?= h($property->property_description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Category') ?></th>
                    <td><?= $property->has('property_category') ? $this->Html->link($property->property_category->category_name, ['controller' => 'PropertyCategories', 'action' => 'view', $property->property_category->id]) : '' ?></td>
                </tr>
               
                <tr>
                    <th><?= __('Property Tags') ?></th>
                    <td><?= h($property->property_tags) ?></td>
                </tr>
                <tr><th><?= __('Status') ?></th>
                <td><?php if ($property->status == 1): ?>
                            <?= $this->Form->postLink(__('Inactive'), ['action' => 'status', $property->id, $property->status], ['confirm' => __('Are you sure you want to inactive # {0}?', $property->property_title)]) ?>
                            <?php else: ?>
                            <?= $this->Form->postLink(__('Active'), ['action' => 'status', $property->id, $property->status], ['confirm' => __('Are you sure you want to active # {0}?', $property->property_title)]) ?>
                            <?php endif; ?></td>
                            <td> 
                </tr>
               
             
       
            </table>
            <div class="related">
                <h4><?= __('Related Property Comments') ?></h4>
                <?php if (!empty($property->property_comments)) : ?>
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <tr>
                            <th><?= __('Id') ?></th>
                           
                            <th><?= __('Name') ?></th>
                            <th><?= __('Comments') ?></th>
                  
                
                        </tr>
                        <?php foreach ($property->property_comments as $propertyComments) : ?>
                        <tr>
                            <td><?= h($propertyComments->id) ?></td>
                          
                            <td><?= h($comm[$propertyComments->user_id]) ?></td>
                            <td><?= h($propertyComments->comments) ?></td>
               
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