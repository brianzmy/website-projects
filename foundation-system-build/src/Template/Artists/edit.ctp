<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artist $artist
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
                        <h2>Edit Personal Information</h2>
                    </div>
                    <?= $this->Form->create($artist) ?>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-support"></i>
                                </div>
                                <div class="nk-int-st">
                                    <?= $this->Form->control('name', array('class' => 'form-control'))?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-mail"></i>
                                </div>
                                <div class="nk-int-st">
                                    <?= $this->Form->control('email', array('class' => 'form-control', 'type' => 'text'))?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-phone"></i>
                                </div>
                                <div class="nk-int-st">
                                    <?= $this->Form->control('phone', array('class' => 'form-control', 'type' => 'text'))?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-house"></i>
                                </div>
                                <div class="nk-int-st">
                                    <?= $this->Form->control('address', array('class' => 'form-control'))?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <?= $this->Form->control('website', array('class' => 'form-control'))?>
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
                                    'indigenous',
                                    ['class'=> 'form-control','type'=>'select','options'=>$indigenousOptions, 'label' => __('T Projects are often asked to develop site specific projects and whenever possible we support local artist to work within their communities. We actively support emerging and established Indigenous artists. Do you identify as Aboriginal or Torres Strait Islander?'), 'empty' => 'Please select an option.']);?>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-map"></i>
                            </div>
                            <div class="nk-int-st">
                                <?= $this->Form->control('origin', array('class' => 'form-control', 'label' => 'Which mobs are you connected to? Please note this question is entirely optional' ))?>
                            </div>
                        </div>
                    </div>




                        </div>

                    <?=   $this->Form->control('approval', [
                        'default' => 'No',
                        'type' => 'hidden'

                    ]);?>
                    <br>
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
    </div>
</body>
</html>
