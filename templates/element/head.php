<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>88acres.com</title>
    <?php  echo $this->Html->script('jquery-3.6.0.min.js');
  
?>
    
    <?= $this->Html->CSS(['http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600','http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300','http://fonts.googleapis.com/css?family=Raleway:400,100','http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css','http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'])  ?>
    <?= $this->Html->CSS(['./../css/owl.carousel.css','./../css/style.css','./../css/responsive.css','http://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css'])  ?>

    <!-- Google Fonts -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'> -->
   
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
    
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
    
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                      
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1>88<a href="index.html"><span>Acres</span></a></h1>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.html">Cart <span class="cart-amunt"></span> <i class="fa fa-shopping-cart"></i> <span class="product-count">3</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?= $this->Url->build(['controller'=>'Properties','action'=>'index']) ?>">Home</a></li>
                        <li><a href="<?= $this->Url->build(['controller'=>'Properties','action'=>'store']) ?>">Properties</a></li>
                        <!-- <li><a href="single-product.html"></a></li> -->
                       
                        <li>
                            <a href="<?= $this->Url->build(['controller'=>'apo-links','action'=>'index']) ?>">Appontments</a></li>
                        <!-- <li><a href="checkout.html"></a></li> -->

                        <li><a href="#" >Contact</a></li>
                       
                       
                    </ul>
                    <div class="navbar-collapse collapse align-item-end">
                   
                   <div class="float-right "> <ul class="nav navbar-nav ">
                       
                    <li  ><a href="<?= $this->Url->build(['controller'=>'Users','action'=>'logout']) ?>"  class="nav-link btn btn-warning" >Logout</a></li>
                    </ul></div></div></div>
                  
            </div> </div> 
        </div>
    </div>
 
  </head>