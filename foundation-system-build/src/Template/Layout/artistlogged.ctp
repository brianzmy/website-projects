<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title', 'Welcome to T Projects!') ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>


<body>




<div class="container">


    <div class="d_1">

        <p></p>
        <ul id="home-buttons">
            <li>
                <p></p><?= $this->Html->link('Artist Profile', ['controller' => 'admin', 'action' => 'artistinfo', $this->getRequest()->getSession()->read('Auth.User.artist_id')]) ?>
            </li>
            <li>
                <p></p><?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']) ?>
            </li>
    </div>
    <?= $this->fetch('content') ?>

</div>



</body>





</html>
