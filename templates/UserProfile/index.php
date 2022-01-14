<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserProfile[]|\Cake\Collection\CollectionInterface $userProfile
 */
?>
<div class="userProfile index content">

    <h3><?= __('User Profile') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('contact') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('profile_image') ?></th>
        
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userProfile as $userProfile): ?>
                <tr>
                    <td><?= $this->Number->format($userProfile->id) ?></td>
                    <td><?= $userProfile->has('user') ? $this->Html->link($userProfile->user->id, ['controller' => 'Users', 'action' => 'view', $userProfile->user->id]) : '' ?></td>
                    <td><?= h($userProfile->first_name) ?></td>
                    <td><?= h($userProfile->last_name) ?></td>
                    <td><?= h($userProfile->contact) ?></td>
                    <td><?= h($userProfile->address) ?></td>
                    <td><?= $this->html->image($userProfile->profile_image) ?></td>
           
                    <td class="actions">
                   
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userProfile->id)]) ?>
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
