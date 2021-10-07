<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artwork $artwork
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Artwork'), ['action' => 'edit', $artwork->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Artwork'), ['action' => 'delete', $artwork->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artwork->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Artworks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artwork'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Galleries'), ['controller' => 'Galleries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gallery'), ['controller' => 'Galleries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Artists', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="artworks view large-9 medium-8 columns content">
    <h3><?= h($artwork->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($artwork->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($artwork->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Medium') ?></th>
            <td><?= h($artwork->medium) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Style') ?></th>
            <td><?= h($artwork->style) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $artwork->has('project') ? $this->Html->link($artwork->project->name, ['controller' => 'Projects', 'action' => 'view', $artwork->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gallery') ?></th>
            <td><?= $artwork->has('gallery') ? $this->Html->link($artwork->gallery->name, ['controller' => 'Galleries', 'action' => 'view', $artwork->gallery->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($artwork->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= $this->Number->format($artwork->year) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Artists') ?></h4>
        <?php if (!empty($artwork->artists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Website') ?></th>
                <th scope="col"><?= __('Origin') ?></th>
                <th scope="col"><?= __('Budget') ?></th>
                <th scope="col"><?= __('Agent Id') ?></th>
                <th scope="col"><?= __('Approval') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($artwork->artists as $artists): ?>
            <tr>
                <td><?= h($artists->id) ?></td>
                <td><?= h($artists->name) ?></td>
                <td><?= h($artists->phone) ?></td>
                <td><?= h($artists->address) ?></td>
                <td><?= h($artists->email) ?></td>
                <td><?= h($artists->website) ?></td>
                <td><?= h($artists->origin) ?></td>
                <td><?= h($artists->budget) ?></td>
                <td><?= h($artists->agent_id) ?></td>
                <td><?= h($artists->approval) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Artists', 'action' => 'view', $artists->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Artists', 'action' => 'edit', $artists->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Artists', 'action' => 'delete', $artists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artists->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
