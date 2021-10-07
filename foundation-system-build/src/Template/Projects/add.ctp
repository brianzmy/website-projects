
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
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
                        <h2>Add Project</h2>
                    </div>
                    <?= $this->Form->create($project) ?>
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
                                    <i class="notika-icon notika-star"></i>
                                </div>
                                <div class="nk-int-st">
                                    <?=  $this->Form->control(
                                        'type',
                                        ['class'=>'form-control','type'=>'select','options'=>$projectList, 'label' => __('Project Type'), 'empty' => 'Please select a project type.'])        ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-dollar"></i>
                                </div>
                                <div class="nk-int-st">
                                    <?=  $this->Form->control(
                                        'budget',
                                        ['class'=> 'form-control','type'=>'select','options'=>$budgetList, 'label' => __('Budget'), 'empty' => 'Please select your budget.']);?>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-edit"></i>
                                </div>
                                <div class="nk-int-st">
                                    <b>Description</b>
                                    <?= $this->Form->control('description', ['type' => 'textarea', 'rows' => '2', 'cols'=> '43', 'label'=>false]); ?>
                                </div>

                            </div>
                        </div>

                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-map"></i>
                                </div>
                                <div class="nk-int-st">
                                <?= $this->Form->control('location', array('class' => 'form-control'))?>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-next"></i>
                            </div>
                            <div class="nk-int-st">
                            <?= $this->Form->control('client', array('class' => 'form-control', 'label' => 'Commissioning Body or Client'))?>
                            </div>

                        </div>
                        </div>



                        <?php   echo $this->Form->control('resume_id', [
                        'options' => $resume,
                        'type' => 'hidden'
                        ]);
                        ?>
                    </div>
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


