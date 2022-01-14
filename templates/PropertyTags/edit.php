<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyTag $propertyTag
 * @var string[]|\Cake\Collection\CollectionInterface $tags
 * @var string[]|\Cake\Collection\CollectionInterface $properties
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $propertyTag->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $propertyTag->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Property Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propertyTags form content">
            <?= $this->Form->create($propertyTag) ?>
            <fieldset>
                <legend><?= __('Edit Property Tag') ?></legend>
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
