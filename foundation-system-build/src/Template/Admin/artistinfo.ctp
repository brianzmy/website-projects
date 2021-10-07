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
                        <h4>Personal Information
                            <?php echo $this->Html->image("edit-icon.png", [
                                "alt" => "Edit",
                                'url' => ['controller' => 'Artists', 'action' => 'edit', $artists->id]]); ?>
                        </h4>
                        <b>Phone Number:</b> <?= h($artists->phone) ?></br>
                        <b>Address:</b> <?= h($artists->address) ?></br>
                        <b>Email:</b> <?= h($artists->email) ?></br>
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
                        <?php foreach($artist_resume as $resume): ?>
                        <?php echo $this->Html->image("edit-icon.png", [
                            "alt" => "Edit",
                            'url' => ['controller' => 'Resumes', 'action' => 'edit', $resume->id, $artists->id]]);
                        ?>
                    </h4>

                    <b>Description: </b><?= h($resume->description) ?></br>
                    <b>Experience Types: </b><?= h($resume->experienceType) ?></br>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        </br>

        <h1>Agent & Gallery Representation</h1>
        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="email-statis-inner notika-shadow">
                    <h4>Agent Details
                        <?php foreach($associated_agent as $agent): ?>
                            <?php echo $this->Html->image("edit-icon.png", [
                                "alt" => "Edit",
                                'url' => ['controller' => 'Agents', 'action' => 'edit', $artists->id, $agent->id]]); ?>
                        <?php endforeach ?>
                    </h4>

                    <?php foreach($associated_agent as $agents): ?>
                        <b>Name:</b> <?= h($agents->name) ?> </br>
                        <b>Email:</b> <?= h($agents->email) ?> </br>
                        <b>Phone Number:</b> <?= h($agents->phone) ?> </br>
                        <b>Website:</b> <?= h($agents->website) ?> </br>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="email-statis-inner notika-shadow">
                    <h4>
                        Galleries
                        <?php echo $this->Html->image("Add-icon.png", [
                            "alt" => "Add",
                            'url' => ['controller' => 'ArtistsGalleries', 'action' => 'add', $artists->id]
                        ]);
                        ?>
                    </h4>

                    <?php foreach($associated_gallery as $gallery): ?>
                        <b>Gallery name: </b><?= h($gallery->name) ?></br>
                        <b>Gallery email: </b><?= h($gallery->email) ?></br>
                        <b>Gallery phone: </b><?= h($gallery->phone) ?></br>
                        <b>Gallery website: </b><?= h($gallery->website) ?></br>
                        <button class="btn notika-btn-gray btn-reco-mg btn-xs btn-button-mg waves-effect"><?php echo $this->Html->link("Delete", ['controller' => 'ArtistsGalleries', 'action'=> 'delete', $artists->id, $gallery->id], ['confirm' => __('Are you sure you want to delete this gallery?')]) ?></button>
                        </p>
                    <?php endforeach ?>

                </div>
            </div>
        </div>
        </br>

        <h1>Past Projects & Artwork</h1>

        <div class="row">


            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="email-statis-inner notika-shadow">
                    <h4>Past Projects
                        <?php echo $this->Html->image("Add-icon.png", [
                            "alt" => "Add",
                            'url' => ['controller' => 'Projects', 'action' => 'add', $resume->id, $artists->id]
                        ]);
                        ?>
                    </h4>

                    <?php foreach($artist_project as $project): ?>
                        <b><u><?= h($project->name) ?></br></u></b>
                        <b>Type: </b><?= h($project->type) ?></br>
                        <b>Description: </b><?= h($project->description) ?></br>
                        <b>Location: </b><?= h($project->location) ?></br>
                        <b>Budget: </b><?= h($project->budget) ?></br>
                        <b>Commissioning Body/Client: </b><?= h($project->client) ?></br>
                        <button class="btn notika-btn-gray btn-reco-mg btn-xs btn-button-mg waves-effect"><?php echo $this->Html->link("Edit", ['controller' => 'Projects', 'action'=> 'edit', $project->id, $artists->id]) ?></button>
                        <button class="btn notika-btn-gray btn-reco-mg btn-xs btn-button-mg waves-effect"><?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $project->id, $artists->id], ['confirm' => __('Are you sure you want to delete this project?')]) ?></button>

                        <p></p>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                <div class="email-statis-inner notika-shadow scroll-box" >
                    <h4>Artworks
                        <?php echo $this->Html->image("Add-icon.png", [
                            "alt" => "Add",
                            'url' => ['controller' => 'Artworks', 'action' => 'add', $artists->id]
                        ]);
                        ?>
                        <button class="btn notika-btn-lightgreen btn-reco-mg btn-xs btn-button-mg waves-effect" style="margin-left:55%"><?php echo $this->Html->link("Export All Artwork", ['controller' => 'Admin', 'action'=> 'printartwork', $artists->id]) ?></button>
                    </h4>

                    <?php foreach($artist_artwork as $artwork): ?>
                        <b>Title: </b><?= h($artwork->title) ?></br>
                        <b>Year: </b><?= h($artwork->year) ?></br>
                        <b>Location: </b><?= h($artwork->location) ?></br>
                        <b>Medium: </b><?= h($artwork->medium) ?></br>
                        <b>Style: </b><?= h($artwork->style) ?></br>
                        <?= $this->Html->image($artwork->has('artwork_img')?'../files/Artworks/artwork_img/'.$artwork->artwork_img:'', ['alt' => 'artwork image', 'width'=> '100px' , 'class' => 'thumbnail', 'url' => ['controller' => 'Artworks', 'action' => 'viewimage', $artwork->id]])?>
                        <button class="btn notika-btn-gray btn-reco-mg btn-xs btn-button-mg waves-effect"><?php echo $this->Html->link("Edit", ['controller' => 'Artworks', 'action'=> 'edit', $artists->id, $artwork->id]) ?></button>
                        <button class="btn notika-btn-gray btn-reco-mg btn-xs btn-button-mg waves-effect"><?= $this->Form->postLink(__('Delete'), ['controller' => 'Artworks', 'action' => 'delete', $artwork->id, $artists->id], ['confirm' => __('Are you sure you want to delete this artwork?', $artists->id)]) ?></button>
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
                <button class="btn btn-danger notika-btn-danger waves-effect"><?= $this->Form->postLink(__('Delete'), ['controller' => 'Artists', 'action' => 'delete', $artists->id], ['confirm' => __('Are you sure you want to delete this artist?', $artists->id)]) ?></button>
            </div>
        </div>
    </div>

</div>
