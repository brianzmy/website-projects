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
            <?= $this->Form->create($user) ?>
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
                </div>
            </div>

            <?= $this->Form->hidden('Type', [
                'class' => 'form-control',
                'label' => false,
                'value'=>'Gallery',
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
