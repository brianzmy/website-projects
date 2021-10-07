<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gallery $gallery
 */
?>
<div class="container">
    <h3><?= h($gallery->name) ?></h3>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="email-statis-inner notika-shadow">
            <h4>Details
                <?php echo $this->Html->image("edit-icon.png", [
                    "alt" => "Edit",
                    'url' => ['controller' => 'Galleries', 'action' => 'edit', $gallery->id]]);
                ?>
            </h4>
            <b>Email: </b><?= h($gallery->email) ?></br>
            <b>Phone: </b><?= h($gallery->phone) ?></br>
            <b>Website: </b><?= h($gallery->website) ?></br>
            <b>Contact Person: </b><?= h($gallery->contact_person) ?></br>
            <b>Address: </b><?= h($gallery->address) ?></br>
            <b>Second Address: </b><?= h($gallery->second_address) ?></br>

            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="email-statis-inner notika-shadow">
                <h4>Represented Artists</h4>
                    <div class="bsc-tbl">
                        <?php if (!empty($gallery->artists)): ?>
                        <table class="table table-sc-ex">
                            <tr>
                                <th scope="col"><?= __('Name') ?></th>
                                <th scope="col"><?= __('Phone') ?></th>
                            </tr>
                            <?php foreach ($gallery->artists as $artists): ?>
                            <tr>
                                <td><?= h($artists->name) ?></td>
                                <td><?= h($artists->phone) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>

            </div>
        </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="email-statis-inner notika-shadow">
                    <h4>Artwork at Gallery</h4>
                    <div class="bsc-tbl">
                        <?php if (!empty($gallery->artworks)): ?>
                        <table class="table table-sc-ex">
                            <tr>
                                <th scope="col"><?= __('Title') ?></th>
                                <th scope="col"><?= __('Year') ?></th>

                            </tr>
                            <?php foreach ($gallery->artworks as $artworks): ?>
                            <tr>
                                <td><?= h($artworks->title) ?></td>
                                <td><?= h($artworks->year) ?></td>

                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>


                </div>
            </div>
        </div>
        </br>
    <div style="display: flex">

        <div style="margin-right:0%">
            <?= $this->Html->link(__('<i class="notika-icon notika-left-arrow " style="font-size:16px"></i>'), $this->request->referer(), ['class' => 'btn btn-default btn-icon-notika', 'escape' => false]) ?>
        </div>
        <div style="margin-left: 91%">
            <button class="btn btn-danger notika-btn-danger waves-effect"><?= $this->Form->postLink(__('Delete'), ['controller' => 'Galleries', 'action' => 'delete', $gallery->id], ['confirm' => __('Are you sure you want to delete this gallery?')]) ?></button>
        </div>
    </div>

</div>
