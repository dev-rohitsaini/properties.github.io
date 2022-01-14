<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyCategory $propertyCategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Property Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propertyCategories form content">
            <?= $this->Form->create($propertyCategory) ?>
            <fieldset>
                <legend><?= __('Add Property Category') ?></legend>
                <?php
                    echo $this->Form->control('category_name');
                    echo $this->Form->control('status');
                    echo $this->Form->control('created_date');
                    echo $this->Form->control('modified_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
