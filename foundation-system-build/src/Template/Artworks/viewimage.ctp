<?php
?>

<div class="container">
    <?php foreach($selected_artwork as $artwork_id): ?>
        <h2><?= h($artwork_id->title) ?></h2><p></p>
        <?= $this->Html->image($artwork_id->has('artwork_img')?'../files/Artworks/artwork_img/'.$artwork_id->artwork_img:'', ['width' => '800px'])?>
    <?php endforeach ?>

    <p></p>
    <div style="display: flex">
        <div style="margin-right:0%">
            <?= $this->Html->link(__('<i class="notika-icon notika-left-arrow " style="font-size:16px"></i>'), $this->request->referer(), ['class' => 'btn btn-default btn-icon-notika', 'escape' => false]) ?>
        </div>
    </div>
</div>
</div>




