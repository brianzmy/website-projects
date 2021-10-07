<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artist[]|\Cake\Collection\CollectionInterface $artists
 */
?>

<div class="container">
    <h1>All Artists</h1>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="normal-table-list mg-t-30">
            <div class="bsc-tbl-st">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('origin') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($artists as $artist): ?>
                            <tr>
                                <td><?= h($artist->name) ?></td>
                                <td><?= h($artist->phone) ?></td>
                                <td><?= h($artist->email) ?></td>
                                <td><?= h($artist->origin) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Admin', 'action' => 'artistinfo', $artist->id]) ?> </br>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $artist->id]) ?> </br>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $artist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artist->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

