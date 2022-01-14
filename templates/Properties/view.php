<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Property'), ['action' => 'edit', $property->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Property'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Properties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Property'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="properties view content">
            <h3><?= h($property->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Property Title') ?></th>
                    <td><?= h($property->property_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Description') ?></th>
                    <td><?= h($property->property_description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Category') ?></th>
                    <td><?= $property->has('property_category') ? $this->Html->link($property->property_category->id, ['controller' => 'PropertyCategories', 'action' => 'view', $property->property_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Image') ?></th>
                    <td><?= h($property->property_image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Tags') ?></th>
                    <td><?= h($property->property_tags) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($property->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($property->id) ?></td>
                </tr>
             
       
            </table>
            <div class="rated">
                <h4><?= __('Related Property Comments') ?></h4>
                <?php //if (!empty($property->property_comments)) : ?> -->
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Property Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Comments') ?></th>
                  
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($property->property_comments as $propertyComments) : ?>
                        <tr>
                            <td><?= h($propertyComments->id) ?></td>
                            <td><?= h($propertyComments->property_id) ?></td>
                            <td><?= h($propertyComments->user_id) ?></td>
                            <td><?= h($propertyComments->comments) ?></td>
               
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PropertyComments', 'action' => 'view', $propertyComments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PropertyComments', 'action' => 'edit', $propertyComments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PropertyComments', 'action' => 'delete', $propertyComments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyComments->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php //endif; ?>
            </div>
        </div>
    </div>
</div>
