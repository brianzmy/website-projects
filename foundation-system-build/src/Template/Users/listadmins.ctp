<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gallery[]|\Cake\Collection\CollectionInterface $galleries
 */
?>

<div class="container">
    <h1>All Admins</h1>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="normal-table-list mg-t-30">
            <div class="bsc-tbl-st">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('Username') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                        <th scope="col" class="actions"><?= __('Remove Admin') ?></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>

                            <td><?= h($user->username) ?></td>
                            <td><?= h($user->Email) ?></td>
                            <td class="actions">
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'deleteadmin', $user->user_ID], ['confirm' => __('Are you sure you want to delete this account?', $user->user_ID)]) ?>
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
