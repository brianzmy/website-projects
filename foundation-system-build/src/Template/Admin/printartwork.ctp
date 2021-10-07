<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artwork $artwork
 */
?>
<?= $this->Layout('blank')?>
<?= $this->Html->css('style.css') ?>
<div class="container">
    <?php foreach($selected_artwork as $artwork): ?>
        <div class="page-break">
            <h2><?= h($artwork->title) ?></h2>
            <p><?= $this->Html->image($artwork->has('artwork_img')?'../files/Artworks/artwork_img/'.$artwork->artwork_img:'', ['width' => '800px'])?></p>
            <b>Year: </b><?= h($artwork->year) ?></br>
            <b>Location: </b><?= h($artwork->location) ?></br>
            <b>Medium: </b><?= h($artwork->medium) ?></br>
            <b>Style: </b><?= h($artwork->style) ?></br>
        </div>
    <?php endforeach ?>

</div>

<script type = "text/javascript">
    window.print();
</script>
