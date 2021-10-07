<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artists $artists
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Admin'), ['action' => 'index']) ?></li>
    </ul>
</nav>

<div class="artist form large-9 medium-8 columns content">
    <?= $this->Form->create($artists) ?>
    <fieldset>
        <legend><?= __('Add Admin') ?></legend>
        <?php
        echo $this->Form->control('artistName');
        echo $this->Form->control('artistPhone');
        echo $this->Form->control('artistAddress');
        echo $this->Form->control('artistEmail');
        echo $this->Form->control('artistWebsite');
        echo $this->Form->control('artistOrigin');
        echo $this->Form->control('artistBudget');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>