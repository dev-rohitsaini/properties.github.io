<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
           
     
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create( $user, ['id'=>'form','enctype'=>'multipart/form-data']); ?>
            <fieldset>
                
               
                <div class="col-md-6 " style="margin-left:18%;">
                <legend><?= __('Add User') ?></legend>
                <?php        echo $this->Form->control('user_profile.first_name',['id'=>'first_name','required'=>false,'class'=>'form-control']);
                    echo $this->Form->control('user_profile.last_name',['id'=>'last_name','required'=>false,'class'=>'form-control']);
                    echo $this->Form->control('email',['required'=>false,'class'=>'form-control']);
                    echo $this->Form->control('user_profile.contact',['id'=>'contact','required'=>false,'class'=>'form-control']);
                    echo $this->Form->control('user_profile.address',['id'=>'address','required'=>false,'class'=>'form-control']);
                
                    echo $this->Form->control('user_profile.profile_image',['id'=>'img', 'type' =>'file','required'=>false,'class'=>'form-control']);
                    echo $this->Form->control('password',['required'=>false,'class'=>'form-control']);
                    echo $this->Form->control('confirm_password',['type'=>'password','required'=>false,'class'=>'form-control']);
               ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class'=>'form-control']) ?> </div>
            <?= $this->Form->end() ?><?= $this->Html->link(__('Login'), ['action' => 'login'], ['class' => 'button float-right']) ?>
        </div>
    </div>
</div>
