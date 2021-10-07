<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gallery[]|\Cake\Collection\CollectionInterface $galleries
 */
?>

<div class="container">
    <h1>All Galleries</h1>

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
                    <?php foreach ($galleries as $gallery): ?>
                        <tr>

                            <td><?= h($gallery->name) ?></td>
                            <td><?= h($gallery->email) ?></td>
                            <td><?= h($gallery->phone) ?></td>
                            <td><?= h($gallery->website) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $gallery->id]) ?> </br>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gallery->id]) ?> </br>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gallery->id], ['confirm' => __('Are you sure you want to delete this gallery?', $gallery->id)]) ?>
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


