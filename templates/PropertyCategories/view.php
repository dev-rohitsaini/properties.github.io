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
            <?= $this->Html->link(__('Edit Property Category'), ['action' => 'edit', $propertyCategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Property Category'), ['action' => 'delete', $propertyCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyCategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Property Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Property Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propertyCategories view content">
            <h3><?= h($propertyCategory->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Category Name') ?></th>
                    <td><?= h($propertyCategory->category_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($propertyCategory->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($propertyCategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($propertyCategory->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($propertyCategory->modified_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
