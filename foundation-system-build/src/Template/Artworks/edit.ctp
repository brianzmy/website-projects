<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artwork $artwork
 */
?>

<!doctype html>
<html class="no-js" lang="en">
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="form-element-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-element-list">
                    <div class="basic-tb-hd">
                        <h2>Edit Artwork</h2>
                    </div>
                    <?= $this->Form->create($artwork, ['type' => 'file']) ?>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-support"></i>
                                </div>
                                <div class="nk-int-st">

                                    <?= $this->Form->control('title', array('class' => 'form-control'))?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-mail"></i>
                                </div>
                                <div class="nk-int-st">


                                    <?= $this->Form->control('year', array('class' => 'form-control', 'type' => 'text'))?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-phone"></i>
                                </div>
                                <div class="nk-int-st">
                                    <?= $this->Form->control('location', array('class' => 'form-control'))?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <?= $this->Form->control('project_id', array('class' => 'form-control', 'options' => $projects, 'empty' => true))?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-map"></i>
                                </div>
                                <div class="nk-int-st">
                                    <?= $this->Form->control('gallery_id', array('class' => 'form-control', 'options' => $galleries, 'empty' => true ))?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-star"></i>
                                </div>
                                <div class="nk-int-st">
                                    <?=  $this->Form->control(
                                        'medium',
                                        ['class' => 'form-control', 'type'=>'select','options'=>$mediumList, 'label' => __('Medium'), 'empty' => 'Please select the medium.']);?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-star"></i>
                                </div>
                                <div class="nk-int-st">
                                    <?=  $this->Form->control(
                                        'style',
                                        ['class' => 'form-control', 'type'=>'select','options'=>$styleList, 'label' => __('Style'), 'empty' => 'Please select the style.']);?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-map"></i>
                                </div>
                                <div class="nk-int-st">
                                    <?= $this->Form->control('artwork_img',  array('type'=>'file', ))?>
                                    <?= $this->Html->image($artwork->has('artwork_img')?'../files/Artworks/artwork_img/'.$artwork->artwork_img:'')?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?=  $this->Form->control('artist_id',
                        ['options' => $artists,
                        'type' => 'hidden']);?>

                    <br>
                    <div style="display: flex">

                        <div style="margin-left: 3%">
                            <?= $this->Html->link(__('<i class="notika-icon notika-left-arrow " style="font-size:16px"></i>'), $this->request->referer(), ['class' => 'btn btn-default btn-icon-notika', 'escape' => false]) ?>
                        </div>
                        <div style="margin-left: 86%">
                            <?= $this->Form->button("Submit", array('type'=>'Submit', 'class' => "btn btn-success success-icon-notika"))?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

