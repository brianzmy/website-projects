<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArtistsGallery $artistsGallery
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Artists Gallery'), ['action' => 'edit', $artistsGallery->artist_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Artists Gallery'), ['action' => 'delete', $artistsGallery->artist_id], ['confirm' => __('Are you sure you want to delete # {0}?', $artistsGallery->artist_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Artists Galleries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artists Gallery'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Artists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Galleries'), ['controller' => 'Galleries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gallery'), ['controller' => 'Galleries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="artistsGalleries view large-9 medium-8 columns content">
    <h3><?= h($artistsGallery->artist_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Admin') ?></th>
            <td><?= $artistsGallery->has('artist') ? $this->Html->link($artistsGallery->artist->id, ['controller' => 'Artists', 'action' => 'view', $artistsGallery->artist->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gallery') ?></th>
            <td><?= $artistsGallery->has('gallery') ? $this->Html->link($artistsGallery->gallery->name, ['controller' => 'Galleries', 'action' => 'view', $artistsGallery->gallery->id]) : '' ?></td>
        </tr>
    </table>
</div>
