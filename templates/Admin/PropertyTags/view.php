<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyTag $propertyTag
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Property Tag'), ['action' => 'edit', $propertyTag->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Property Tag'), ['action' => 'delete', $propertyTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyTag->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Property Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Property Tag'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propertyTags view content">
            <h3><?= h($propertyTag->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tag') ?></th>
                    <td><?= $propertyTag->has('tag') ? $this->Html->link($propertyTag->tag->id, ['controller' => 'Tags', 'action' => 'view', $propertyTag->tag->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Property') ?></th>
                    <td><?= $propertyTag->has('property') ? $this->Html->link($propertyTag->property->category_name, ['controller' => 'Properties', 'action' => 'view', $propertyTag->property->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($propertyTag->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
