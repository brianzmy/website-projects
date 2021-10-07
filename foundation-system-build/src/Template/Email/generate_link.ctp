

<!doctype html>
<html class="no-js" lang="en">



<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->




<div class="form-element-area">
    <div class="container">
        <?= $this->Flash->render() ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-element-list">
                    <div class="basic-tb-hd">
                        <h2>Invite Artist</h2>
                    </div>
                    <?= $this->Form->create() ?>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-support"></i>
                                </div>
                                <div class="nk-int-st">


                                    <?= $this->Form->control('artName', array('class' => 'form-control', 'name'=>'artName',

                                        'required'=>'true',
                                        'label'=>'Artist Name'))?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-mail"></i>
                                </div>
                                <div class="nk-int-st">


                                    <?= $this->Form->control('artEmail', array('class' => 'form-control', 'name'=>'artEmail',

                                        'required'=>'true',
                                        'label'=>'Artist Email Address'))?>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

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


                        <div class="send email to" id="send email to">
                            <?php
                            if(empty($artEmail) || empty($artEmail)){

                            }
                            ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>


