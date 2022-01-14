<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyTag[]|\Cake\Collection\CollectionInterface $propertyTags
 */
?>
<div class="propertyTags index content">
    <?= $this->Html->link(__('New Property Tag'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Property Tags') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('tag_id') ?></th>
                    <th><?= $this->Paginator->sort('properties_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($propertyTags as $propertyTag): ?>
                <tr>
                    <td><?= $this->Number->format($propertyTag->id) ?></td>
                    <td><?= $propertyTag->has('tag') ? $this->Html->link($propertyTag->tag->id, ['controller' => 'Tags', 'action' => 'view', $propertyTag->tag->id]) : '' ?></td>
                    <td><?= $propertyTag->has('property') ? $this->Html->link($propertyTag->property->category_name, ['controller' => 'Properties', 'action' => 'view', $propertyTag->property->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $propertyTag->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propertyTag->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propertyTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyTag->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
