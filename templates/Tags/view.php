<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tag'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tags view content">
            <h3><?= h($tag->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Property') ?></th>
                    <td><?= $tag->has('property') ? $this->Html->link($tag->property->category_name, ['controller' => 'Properties', 'action' => 'view', $tag->property->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Tags Name') ?></th>
                    <td><?= h($tag->tags_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tag->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Property Tags') ?></h4>
                <?php if (!empty($tag->property_tags)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Tag Id') ?></th>
                            <th><?= __('Properties Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($tag->property_tags as $propertyTags) : ?>
                        <tr>
                            <td><?= h($propertyTags->id) ?></td>
                            <td><?= h($propertyTags->tag_id) ?></td>
                            <td><?= h($propertyTags->properties_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PropertyTags', 'action' => 'view', $propertyTags->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PropertyTags', 'action' => 'edit', $propertyTags->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PropertyTags', 'action' => 'delete', $propertyTags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyTags->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
