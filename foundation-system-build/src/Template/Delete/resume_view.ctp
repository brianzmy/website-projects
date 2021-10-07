<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resume $resume
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Resume'), ['action' => 'edit', $resume->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Resume'), ['action' => 'delete', $resume->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resume->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Resume'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Resume'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Artists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="resume view large-9 medium-8 columns content">
    <h3><?= h($resume->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($resume->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ExperienceType') ?></th>
            <td><?= h($resume->experienceType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admin') ?></th>
            <td><?= $resume->has('artist') ? $this->Html->link($resume->artist->id, ['controller' => 'Artists', 'action' => 'view', $resume->artist->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($resume->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Projects') ?></h4>
        <?php if (!empty($resume->projects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Resume Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($resume->projects as $projects): ?>
            <tr>
                <td><?= h($projects->type) ?></td>
                <td><?= h($projects->name) ?></td>
                <td><?= h($projects->description) ?></td>
                <td><?= h($projects->id) ?></td>
                <td><?= h($projects->resume_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $projects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $projects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $projects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
