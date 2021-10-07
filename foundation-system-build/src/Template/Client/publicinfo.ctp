<?php
$this->assign('title', 'Admin Information');
?>

<div class="notika-email-post-area">

    <div class="container">
        <?php foreach($selected_artists as $artists): ?>
            <h1><?= h($artists->name) ?></h1>
        <?php endforeach ?>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="email-statis-inner notika-shadow">
                    <?php foreach($selected_artists as $artists): ?>
                        <h4>Personal Information</h4>
                        <b>Website:</b> <?= h($artists->website) ?></br>
                        <b>Aboriginal or Torres Strait Islander:</b> <?= h($artists->indigenous) ?></br>
                        <b>Mobs Connected To:</b> <?= h($artists->origin) ?></br>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="email-statis-inner notika-shadow">
                    <h4>
                        Experience Details
                    </h4>
                    <?php foreach($artist_resume as $resume): ?>
                        <b>Description: </b><?= h($resume->description) ?></br>
                        <b>Experience Types: </b><?= h($resume->experienceType) ?></br>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        </br>


        <h1>Past Projects & Artwork</h1>
        <div class="row">


            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="email-statis-inner notika-shadow">
                    <h4>Past Projects</h4>
                    <?php foreach($artist_project as $project): ?>
                        <b><u><?= h($project->name) ?></br></u></b>
                        <b>Type: </b><?= h($project->type) ?></br>
                        <b>Description: </b><?= h($project->description) ?></br>
                        <b>Location: </b><?= h($project->location) ?></br>
                        <b>Budget: </b><?= h($project->budget) ?></br>
                        <b>Commissioning Body/Client: </b><?= h($project->client) ?></br>
                        <p></p>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                <div class="email-statis-inner notika-shadow scroll-box" >
                    <h4>Artworks
                        <button class="btn notika-btn-lightgreen btn-reco-mg btn-xs btn-button-mg waves-effect" style="margin-left:55%"><?php echo $this->Html->link("Export All Artwork", ['controller' => 'Admin', 'action'=> 'printartwork', $artists->id]) ?></button>
                    </h4>

                    <?php foreach($artist_artwork as $artwork): ?>
                        <b>Title: </b><?= h($artwork->title) ?></br>
                        <b>Year: </b><?= h($artwork->year) ?></br>
                        <b>Location: </b><?= h($artwork->location) ?></br>
                        <b>Medium: </b><?= h($artwork->medium) ?></br>
                        <b>Style: </b><?= h($artwork->style) ?></br>
                        <?= $this->Html->image($artwork->has('artwork_img')?'../files/Artworks/artwork_img/'.$artwork->artwork_img:'', ['alt' => 'artwork image', 'width'=> '100px' , 'class' => 'thumbnail', 'url' => ['controller' => 'Artworks', 'action' => 'viewimage', $artwork->id]])?>
                        <p></p>
                    <?php endforeach ?>

                </div>
            </div>
        </div>
        </br>


        <div style="display: flex">

            <div style="margin-right:0%">
                <?= $this->Html->link(__('<i class="notika-icon notika-left-arrow " style="font-size:16px"></i>'), $this->request->referer(), ['class' => 'btn btn-default btn-icon-notika', 'escape' => false]) ?>
            </div>
            <div style="margin-left: 91%">

            </div>
        </div>
    </div>

</div>
