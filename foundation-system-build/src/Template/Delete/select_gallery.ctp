<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gallery $gallery
 */
?>
<h1><font color=#15E59A><b>T</b></font> PROJECTS | SELECT GALLERY</h1>
<div class='artist-info-form'>
    <div class='form-row'>
        <div class='form-column'>
    <?= $this->Form->create($gallery) ?>
    <fieldset>
        <?php
            echo $this->Form->control('artists._ids', [
                                'options' => $artists
                            ]);
        ?>
    </fieldset>
        </div>
    </div>
    <div style="display: flex">

        <div style="margin-left: 3%">
            <?= $this->Html->link(__('<i class="notika-icon notika-left-arrow " style="font-size:16px"></i>'), $this->request->referer(), ['class' => 'btn btn-default btn-icon-notika', 'escape' => false, 'title' => 'View Questionnaire']) ?>
        </div>
        <div style="margin-left: 86%">
            <?= $this->Form->button("Submit", array('type'=>'Submit', 'class' => "btn btn-success success-icon-notika"))?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
