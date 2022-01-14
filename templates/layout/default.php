<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>


	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>

   
</head>

<body>
    
    
        
    <nav class="top-nav">
        <div class="top-nav-title">
        <?php echo $this->Html->image('logo.png', array('alt' => 'logo', 'border' => '0',' height'=>'70px')); ?>
            <a href="<?= $this->Url->build('/index') ?>"><span>88Acres</span></a>
        </div>
        <div class="top-nav-links">
            <a target="_blank" rel="noopener" >Porperty</a>
            </div>
            <?php   
            // if(!empty($this->Authentication->getIdentity())){
               
            //      $this->Html->link(__('Logout'), ['action' => 'logout'], ['class' => 'button float-right']) ;
            // }
            
            ?>
        </div></div>
    </nav></div>


    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?> 
            <?= $this->fetch('content') ?>
</div>
    </main>
    <footer>
    <!-- <script href="jquery-3.6.0.min.js"></script>
    <script href="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script href="regit.js"></script> -->
  <?php  echo $this->Html->script('jquery-3.6.0.min.js');
  echo $this->Html->script('jquery.validate.js');
echo $this->Html->script('extrafunctions.js');  

echo $this->Html->script('additional-methods.js');
// echo $this->Html->script('regit.js');
echo $this->Html->script('mmmm.js');
 ?>
    </footer>
</body>
</html>
