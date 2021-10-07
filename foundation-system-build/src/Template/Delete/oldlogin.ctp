<?php
/**
 * @var \App\View\AppView $this
 */
?>
<h1><font color=#15E59A><b>T</b></font> PROJECTS | LOGIN</h1>
<body>
<div class='artist-info-form'>
    <div class='form-row'>
        <div class='form-column'>
            <?= $this->Flash->render() ?>
            <?= $this->Form->create() ?>
            <fieldset>
                <?= $this->Form->control('username',[
                    'name'=>'username',
                    'placeholder'=>'Please enter your username',
                    'required'=>'true',
                    'label'=>'Username'
                ]) ?>
                <?= $this->Form->control('password',[
                    'password'=>'password',
                    'placeholder'=>'Please enter your password',
                    'required'=>'true',
                    'label'=>'Password'
                ]) ?>
            </fieldset>
            <div id="button">
                <?= $this->Form->button(__('Login')); ?>
                <button><?= $this->Html->link('Forgot Password', ['controller' => 'Users', 'action' => 'forgotpass'])?></button>


            </div>

            <?= $this->Form->end() ?>
        </div>

        <div class='form-column'></div>
    </div>
</div>

</body>
