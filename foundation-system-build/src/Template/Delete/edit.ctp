<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArtistsGallery $artistsGallery
 */
//debug($this->request->getParam('pass'));
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArtistsGallery $artistsGallery
 */
//debug($this->request->getParam('pass'));
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
                        <h2>Personal information</h2>
                    </div>
                    <?= $this->Form->create($artistsGallery) ?>

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-star"></i>
                                </div>
                                <div class="nk-int-st">
                                    <?php
                                    echo $this->Form->control('artist_id',
                                        ['options' => $artists,
                                            'type' => 'hidden']);
                                    ?>
                                    <div class="bootstrap-select fm-cmp-mg">
                                    <?=  $this->Form->input(
                                        'gallery_id',
                                        ['class'=>'form-control', 'type'=>'select','options'=>$listGalleries,'label' => __('gallery_id')]);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
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
            </div>
        </div>
    </div>
</body>
</html>




