<?php
$this->assign('title', 'Admin Information');
?>

<div class="notika-email-post-area">

    <div class="container">
        <?php foreach($selected_artists as $artists): ?>
            <h1><?= h($artists->name) ?></h1>
        <?php endforeach ?>
        <div class="row">

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
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
                        <b>Origin:</b> <?= h($artists->origin) ?></br>
                        <b>Budget:</b> <?= h($artists->budget) ?></br>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
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
                        <b>Phone number:</b> <?= h($agents->phone) ?> </br>
                        <b>Website:</b> <?= h($agents->website) ?> </br>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
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
                        <?php echo $this->Html->link("Edit", ['controller' => 'ArtistsGalleries', 'action'=> 'edit', $artists->id, $gallery->id]) ?>
                    <?php endforeach ?>

                </div>
            </div>
        </div>
        </br>

        <h1>
            Resume
        </h1>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="email-statis-inner notika-shadow">
                    <h4>
                        Experience Details
                        <?php foreach($artist_resume as $resume): ?>
                        <?php echo $this->Html->image("edit-icon.png", [
                            "alt" => "Edit",
                            'url' => ['controller' => 'Resumes', 'action' => 'edit', $resume->id, $artists->id]]);
                        ?>
                    </h4>

                    <b>Description:</b><?= h($resume->description) ?></br>
                    <b>Experience Types:</b><?= h($resume->experienceType) ?></br>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
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
                        <b>Project type: </b><?= h($project->type) ?></br>
                        <b>Project description: </b><?= h($project->description) ?></br>
                        <?php echo $this->Html->link("Edit", ['controller' => 'Projects', 'action'=> 'edit', $project->id, $artists->id]) ?>
                        <p></p>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="email-statis-inner notika-shadow">
                    <h4>Artworks
                        <?php echo $this->Html->image("Add-icon.png", [
                            "alt" => "Add",
                            'url' => ['controller' => 'Artworks', 'action' => 'add', $artists->id]
                        ]);
                        ?>
                    </h4>

                    <?php foreach($selected_artwork as $artwork): ?>
                        <b>Title: </b><?= h($artwork->title) ?></br>
                        <b>Year: </b><?= h($artwork->year) ?></br>
                        <b>Location: </b><?= h($artwork->location) ?></br>
                        <b>Medium: </b><?= h($artwork->medium) ?></br>
                        <b>Style: </b><?= h($artwork->style) ?></br>
                        <b><?= $this->Html->image($artwork->has('artwork_img')?'../files/Artworks/artwork_img/'.$artwork->artwork_img:'')?></b>
                        <?php echo $this->Html->link("Edit", ['controller' => 'Artworks', 'action'=> 'edit', $artists->id, $artwork->id]) ?>
                        <?php echo $this->Html->link("Export", ['controller' => 'Admin', 'action'=> 'printartwork', $artists->id]) ?>
                        <p></p>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <button class="btn btn-success notika-btn-success waves-effect"><?= $this->Html->link(__('Back'), $this->request->referer()) ?></button>
        <button class="btn btn-danger notika-btn-danger waves-effect"><?= $this->Form->postLink(__('Delete'), ['controller' => 'Artists', 'action' => 'delete', $artists->id], ['confirm' => __('Are you sure you want to delete this artist?', $artists->id)]) ?></button>

    </div>

</div>
