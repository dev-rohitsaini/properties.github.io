<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 * @var \Cake\Collection\CollectionInterface|string[] $propertyCategories
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
                                    <h3 class="card-title">   <legend><?= __('Add Property') ?></legend></h3>
                                </div>
                                <!-- /.card-header -->
                              
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card">
                               
                                <!-- /.card-header -->
                                <div class="card-body">
                                <?= $this->Form->create($property,['id'=>'form','enctype'=>'multipart/form-data']) ?>
            <fieldset>
             
                <?php
                    echo $this->Form->control('property_title',['required'=>false,'class'=>'form-control']);
                    echo $this->Form->control('property_description',['required'=>false,'class'=>'form-control']);
                    echo $this->Form->control('property_categories_id', ['options' => $propertyCategories,'class'=>'form-control'],['required'=>false]);
                    echo $this->Form->control('property_image',['type'=>'file','required'=>false,'class'=>'form-control']);
                    echo $this->Form->control('property_tags',['required'=>false,'class'=>'form-control']);
                    
                ?>
            </fieldset>
            
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
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








