<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyCategory[]|\Cake\Collection\CollectionInterface $propertyCategories
 */
?>
<div class="propertyCategories index content">
    <?= $this->Html->link(__('New Property Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Property Categories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('category_name') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th><?= $this->Paginator->sort('modified_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($propertyCategories as $propertyCategory): ?>
                <tr>
                    <td><?= $this->Number->format($propertyCategory->id) ?></td>
                    <td><?= h($propertyCategory->category_name) ?></td>
                    <td><?= h($propertyCategory->status) ?></td>
                    <td><?= h($propertyCategory->created_date) ?></td>
                    <td><?= h($propertyCategory->modified_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $propertyCategory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propertyCategory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propertyCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyCategory->id)]) ?>
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
