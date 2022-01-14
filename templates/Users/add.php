<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create( $user ,array(
'id' => 'form'
  )); ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('user_profile.first_name',['id'=>'first_name']);
                    echo $this->Form->control('user_profile.last_name',['id'=>'last_name']);
                    echo $this->Form->control('email');
                    echo $this->Form->control('user_profile.contact',['id'=>'contact']);
                    echo $this->Form->control('user_profile.address',['id'=>'address']);
                    echo $this->Form->control('user_profile.profile_image',['id'=>'img']);
                    echo $this->Form->control('password');
                    echo $this->Form->control('confirm_password',['type'=>'password']);
               ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
