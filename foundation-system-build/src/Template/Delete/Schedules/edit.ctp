<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>
<h1><font color=#15E59A><b>T</b></font> PROJECTS | EDIT AVAILABILITY</h1>

<div class='artist-info-form'>
    <div class='form-row'>
        <div class='form-column'>
            <?= $this->Form->create($schedule) ?>
             <fieldset>
                <?php
                    echo $this->Form->control('startDate');
                    echo $this->Form->control('endDate');
                    echo $this->Form->control('location');
                    echo $this->Form->control('artist_id',
                    ['options' => $artists,
                    'type' => 'hidden']);
                ?>
             </fieldset>
         </div>
     <div class='form-column'></div>
    </div>
            <?= $this->Form->button(__('Submit')) ?>
            <div class="delete-button"><?= $this->Html->link("Delete", ['controller' => 'Schedules', 'action' => 'delete', $schedule->id])?></div>

            <div class="back-button"><?= $this->Html->link(__('Back'), $this->request->referer()) ?></div>
            <?= $this->Form->end() ?>
</div>
