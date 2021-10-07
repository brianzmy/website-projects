<?php
/**
 * @var \App\View\AppView $this
 */
?>
<body>
<div class="login-background"> </div>
<div class="login-content">
<div class="nk-block toggled" id="l-forget-password">
            <div class="nk-form">
                <p><?php echo $this->Html->image('tprojects_logo.png')?></p>
                <p>Please enter the email address associated with your account to reset your password. If you do not currently have an account, please contact T Projects.</p>

                <?= $this->Form->create() ?>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                    <div class="nk-int-st">
                        <?= $this->Form->control('useremail',[
                            'email'=>'useremail',
                            'class'=>'form-control',
                            'placeholder'=>'Email Address',
                            'required'=>'true',
                            'label'=> false
                        ]) ?>
                    </div>
                </div>
                </br>

                <button class="btn notika-btn-gray btn-reco-mg btn-button-mg waves-effect"><?= $this->Html->link(__('Back'), $this->request->referer()) ?></button>

                <button type="submit" class="btn btn-success notika-btn-success waves-effect">Submit</button>
            <?= $this->Form->end() ?>
            </div>

        </div>
    </div>

</body>