<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<body>
    <div class="login-background"> </div>
    <div class="login-content">
        <div class="nk-block toggled" id="l-forget-password">
            <div class="nk-form">
                <p><?php echo $this->Html->image('tprojects_logo.png')?></p>
                <p>Welcome to T Projects! To begin, please create an account.</p>
                <?= $this->Form->create() ?>
                    <div class="input-group">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                            <div class="nk-int-st">
                                <?= $this->Form->control('username', [
                                    'class' => 'form-control',
                                    'label' => false,
                                    'placeholder' => 'Username'
                                ])?>
                            </div>
                    </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                        <div class="nk-int-st">
                            <?= $this->Form->control('Email', [
                                'class' => 'form-control',
                                'label' => false,
                                'placeholder' => 'Email'
                            ])?>
                        </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-star"></i></span>
                    <div class="nk-int-st">
                        <?= $this->Form->control('Type', [
                            'class' => 'form-control',
                            'label' => false,
                            'options'=>[
                                'Artist'=>'Artist',
                                'Gallery'=>'Gallery',
                                'Client'=>'Client',
                            ],
                            'empty' => 'Account Type'
                        ])?>
                    </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                        <div class="nk-int-st">
                            <?= $this->Form->control('password', [
                                'class' => 'form-control',
                                'label' => false,
                                'placeholder' => 'Password'
                            ])?>
                        </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                        <div class="nk-int-st">
                            <?= $this->Form->control('conpass', [
                                'class' => 'form-control',
                                'label' => false,
                                'type' => 'password',
                                'placeholder' => 'Confirm Password'
                            ])?>
                        </div>
                </div>

                <data-ma-action="nk-login-switch" data-ma-block="#l-register" class="btn btn-login btn-success btn-float"><button type="create" class="notika-icon notika-right-arrow right-arrow-ant"></button></a>
                <?= $this->Form->end() ?>
                        </div>


            <div class="nk-navigation nk-lg-ic rg-ic-stl">
                <a href="/users/index" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-left-arrow"></i> <span>Back</span></a>
                <a href="/users/login" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-support"></i> <span>Sign In</span></a>
            </div>
        </div>
    </div>

</body>
