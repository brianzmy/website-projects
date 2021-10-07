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
                <p>Welcome to T Projects! To begin, please create an account. If you already have an account, click <u><?= $this->Html->link('here', ['controller' => 'Users', 'action' => 'login']) ?></u> to login.</p>
                <?= $this->Form->create(null, ['method' => 'Post']) ?>
                    <div class="input-group">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                            <div class="nk-int-st">
                                <?= $this->Form->control('username', [
                                    'class' => 'form-control',
                                    'label' => false,
                                    'placeholder' => 'Username'
                                ])?>
                                <?php if(isset($username)): ?>
                                    <?= $username[0]; ?>
                                <?php endif; ?>
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
                            <?php if(isset($email)): ?>
                                <?= $email[0]; ?>
                            <?php endif; ?>
                            <?php if(isset($a_email)): ?>
                                <?= $a_email[0]; ?>
                            <?php endif; ?>
                        </div>
                </div>


                        <?= $this->Form->hidden('Type', [
                            'class' => 'form-control',
                            'label' => false,
                            'value'=>'Artist',
                        ])?>


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

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <?= $this->Form->control('name', [
                            'class' => 'form-control',
                            'label' => false,
                            'type' => 'text',
                            'placeholder' => 'Full Name'
                        ])?>
                        <?php if(isset($name)): ?>
                            <?= $name[0]; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-phone"></i></span>
                    <div class="nk-int-st">
                        <?= $this->Form->control('phone', [
                            'class' => 'form-control',
                            'label' => false,
                            'type' => 'text',
                            'placeholder' => 'Phone Number'
                        ])?>
                        <?php if(isset($phone)): ?>
                            <?= $phone[0]; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-house"></i></span>
                    <div class="nk-int-st">
                        <?= $this->Form->control('address', [
                            'class' => 'form-control',
                            'label' => false,
                            'type' => 'text',
                            'placeholder' => 'Address'
                        ])?>
                        <?php if(isset($address)): ?>
                            <?= $address[0]; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-next"></i></span>
                    <div class="nk-int-st">
                        <?= $this->Form->control('website', [
                            'class' => 'form-control',
                            'label' => false,
                            'type' => 'text',
                            'placeholder' => 'Website'
                        ])?>
                    </div>
                </div>


                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-dollar"></i></span>
                    <div class="nk-int-st">
                        <?= $this->Form->control('indigenous', [
                            'class' => 'form-control',
                            'label' => 'T Projects are often asked to develop site specific projects and whenever possible we support local artist to work within their communities. We actively support emerging and established Indigenous artists. ',
                            'type' => 'select',
                            'options' => $indigenousOptions,
                            'empty' => 'Select an Option'
                        ])?>
                    </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-map"></i></span>
                    <div class="nk-int-st">
                        <?= $this->Form->control('origin', [
                            'class' => 'form-control',
                            'label' => 'Which mobs are you connected to? Please note this question is entirely optional',
                            'type' => 'text',
                            'placeholder' => 'Enter the mobs you are connected to'
                        ])?>
                    </div>
                </div>


                <?= $this->Form->hidden('Type', [
                    'class' => 'form-control',
                    'label' => false,
                    'value'=>'Artist',
                ])?>

                <?=   $this->Form->control('approval', [
                    'default' => 'No',
                    'type' => 'hidden'

                ]);?>
                
                <?=   $this->Form->control('archived', [
                    'default' => 'No',
                    'type' => 'hidden'
                ]);?>

                </br>
                <button type="create" class="btn btn-success notika-btn-success waves-effect">Create Account</button>
                <?= $this->Form->end() ?>
                        </div>

        </div>
    </div>

</body>
