<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyTag $propertyTag
 * @var \Cake\Collection\CollectionInterface|string[] $tags
 * @var \Cake\Collection\CollectionInterface|string[] $properties
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Property Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propertyTags form content">
            <?= $this->Form->create($propertyTag) ?>
            <fieldset>
                <legend><?= __('Add Property Tag') ?></legend>
                <?php
                    echo $this->Form->control('tag_id', ['options' => $tags]);
                    echo $this->Form->control('properties_id', ['options' => $properties]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
