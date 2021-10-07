<?php /** @noinspection PhpDeprecationInspection */
include 'header.ctp';
?>

<!DOCTYPE html>
<html>
<?php
    $this->assign('title', 'T PROJECTS | ARTIST SEARCH');
?>
<h1><font color=#15E59A><b>T</b></font> PROJECTS | SEARCH</h1>
<body class="main">
<div class="d_2">
    <div class="d_3">
        <div class="s_2">
            <button class="b_1" onclick="openMenu()" style="cursor:pointer; background-color: transparent; border-color: black;">
            </button>
        </div>

        <?= $this->Form->create(null, ['url' => ['controller' => 'Admin', 'action' => 'search'], 'method' => 'POST'], array( 'class' => 's_4')) ?>
            <?= $this->Form->control('Search', ['class' => 's_3', 'name' => 'search'])?>
            <?= $this->Form->button('Search', ['controller' => 'Admin', 'action' => 'search', 'type' => 'submit'], array('name' => "submit-search", 'class' => 'b_2'))?>
        <?= $this->Form->end() ?>

        <div class="f_1" id="searchForm">
            <?= $this->Form->create(null, ['url' => ['controller' => 'Admin', 'action' => 'filtered-search'], 'method' => 'POST'], array( 'class' => 'a_1')) ?>
                <?= $this->Form->unlockField('budget')?>
                <?= $this->Form->control('Enter artist name', array('class' => 's_3', 'name' => "search"))?>
                <?= $this->Form->control('Enter artist phone number', array('class' => 's_3', 'name' => "phone"))?>
                <?= $this->Form->control('Enter artist address', array('class' => 's_3', 'name' => "address"))?>
                <?= $this->Form->control('Enter artist email', array('class' => 's_3', 'name' => "email"))?>
                <?= $this->Form->control('Enter artist website', array('class' => 's_3', 'name' => "website"))?>
                <?= $this->Form->control('Enter an origin location', array('class' => 's_3', 'name' => "origin"))?>
                <?php echo $this->Form->submit("Search", array('class' => 'b_3')) ?>
                <button class="b_4" style="cursor:pointer" onclick="closeMenu()">Close</button>
            <?= $this->Form->end() ?>
        </div>

        <div class="s_5">
            <?php foreach($filtered_artists as $artists):?>
                    <div class='query_result' style='border-width: 2px; border-style: solid; border-color: black; padding: 20px 25px 20px';>
                        <b>Name: </b> <?= h($artists->name) ?></br>
                        <b>Phone Number:</b> <?= h($artists->phone) ?></br>
                        <b>Address:</b> <?= h($artists->address) ?></br>
                        <b>Email:</b> <?= h($artists->email) ?></br>
                        <b>Website:</b> <?= h($artists->website) ?></br>
                        <b>Origin:</b> <?= h($artists->origin) ?></br>
                        <b>Budget:</b> <?= h($artists->budget) ?></br>
                        <?php echo $this->Html->link("More Info", ['controller' => 'Admin', 'action'=> 'artistinfo', $artists->id]) ?>
                    </div>
            <?php endforeach ?>
            <?= $this->Html->link('export', [
                'controller' => 'Export',
                'action' => 'export',
                '_ext' => 'csv'
            ]) ?>

        </div>
    </div>

    <script>
        function openMenu(){
            document.getElementById("searchForm").style.display = "block";
        }

        function closeMenu(){
            document.getElementById("searchForm").style.display = "hidden";
        }
    </script>
</div>
</body>
</html>
