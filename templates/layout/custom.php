my code sidebar
<div class="sidebar">
    
<sidebar class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Related links') ?></h4>
            
            <?= $this->Html->link(__('       Users'), ['controller'=>'Users','action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('        Properties'), ['controller'=>'properties','action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('              Categories'), ['controller'=>'property-categories','action' => 'index'], ['class' => 'side-nav-item']) ?>
           
        </div>
</sidebar>

</div>