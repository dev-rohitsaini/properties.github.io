<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php $this->disableAutoLayout(); 
 echo $this->Html->css('custom');    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
    .message-error{
        color:red;
    }
</style>



<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="users form">
                    <div class="card-header">
                        <?= $this->Flash->render() ?>
                        <h3>Login</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <!-- <span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span> -->
                        </div>
                        <?= $this->Form->create(null, ['id' => 'form', 'class' => 'form-control']) ?>
                    </div>
                    <div class="card-body">



                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>

                                <?= $this->Form->control('email', ['required' => false, 'class' => 'form-control']) ?>
                            </div>


                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                <?= $this->Form->control('password', ['required' => false, 'class' => 'form-control']) ?>
                            </div>


                        </div>

                        <div class="form-group">
                            <?= $this->Form->submit(__('Login'), [' class' => 'btn float-center login_btn']); ?>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">



                        <div class="form-group">
                        <?= $this->Html->link(__('Register Here'), ['action' => 'add'], ['class' => 'btn btn-danger']) ?>
                        <?= $this->Html->link(__('Forget Password'), ['action' => 'forget'], ['class' => 'btn btn-danger']) ?>
                    </div>  </div>

                </div>
            </div>
        </div>

</body>

</html>