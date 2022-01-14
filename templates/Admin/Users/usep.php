<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | User Profile</title>

</head>
<body class="hold-transition sidebar-mini">

 

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                  <?= $this->html->image($user->user_profile->profile_image,array('height'=>'100px','width'=>'150px')) ?>
                      
                </div>

                <h3 class="profile-username text-center">  <td><?= h($user->user_profile->first_name) ?></td>
                                                <td><?= h($user->user_profile->last_name) ?></td></h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b><th>User_id</th></b> <p class="float-right"><?= $this->Number->format($user->id) ?></p>
                  </li>
                  <li class="list-group-item">
                    <b><th>Email</th></b> <p class="float-right"><?= h($user->email) ?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Contact</b> <p class="float-right"><?= h($user->user_profile->contact) ?></p>
                  </li>
                  
                </ul>

              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted"><?= h($user->user_profile->address) ?></p>

               

               

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
         


                  </div>
                
                </div>
              
              </div>
      
      
    
   

 


 




</body>
</html>

