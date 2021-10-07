<?=$this->Html->css('backtotopbutton')?>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


    <!-- Body area Start-->

    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-10">
                        <div class="curved-inner-pro">
                            <div class="curved-ctn">
                                <h2>Artist Search</h2>


                                <div id="searchForm">
                                    <?= $this->Form->create(null, ['mthod' => 'Post']) ?>

                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group ic-cmp-int">
                                                <div class="form-ic-cmp">
                                                    <i class="notika-icon notika-support"></i>
                                                </div>
                                                <div class="nk-int-st">

                                                    <?= $this->Form->control('Artist name', array('class' => 'form-control','name' => "search"))?>
                                                    <?php
                                                    if(!isset($_POST['search'])){
                                                        echo  "";

                                                    }
                                                    else{
                                                        if(empty($_POST['search']))
                                                        {
                                                            echo  "";

                                                        }
                                                        else{
                                                            echo  "<div class='s1' style='display: flex'>last search:</div> ". $_POST['search'];

                                                        }
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group ic-cmp-int">
                                                <div class="form-ic-cmp">
                                                    <i class="notika-icon notika-phone"></i>
                                                </div>
                                                <div class="nk-int-st">


                                                    <?= $this->Form->control('Artist Phone Number', array('class' => 'form-control', 'name' => "phone"))?>
                                                    <?php
                                                    if(!isset($_POST['phone'])){
                                                        echo  "";

                                                    }
                                                    else{
                                                        if(empty($_POST['phone']))
                                                        {
                                                            echo  "";

                                                        }
                                                        else{
                                                            echo  "<div class='s1' style='display: flex'>last search:</div> ". $_POST['phone'];

                                                        }
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group ic-cmp-int">
                                                <div class="form-ic-cmp">
                                                    <i class="notika-icon notika-house"></i>
                                                </div>
                                                <div class="nk-int-st">
                                                    <?= $this->Form->control('Artist address', array('class' => 'form-control', 'name' => "address"))?>
                                                    <?php
                                                    if(!isset($_POST['address'])){
                                                        echo  "";

                                                    }
                                                    else{
                                                        if(empty($_POST['address']))
                                                        {
                                                            echo  "";

                                                        }
                                                        else{
                                                            echo  "<div class='s1' style='display: flex'>last search:</div> ". $_POST['address'];

                                                        }
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group ic-cmp-int">
                                                <div class="form-ic-cmp">
                                                    <i class="notika-icon notika-mail"></i>
                                                </div>
                                                <div class="nk-int-st">
                                                    <?= $this->Form->control('Artist email', array('class' => 'form-control', 'name' => "email"))?>
                                                </div>
                                                <?php
                                                if(!isset($_POST['email'])){
                                                    echo  "";

                                                }
                                                else{
                                                    if(empty($_POST['email']))
                                                    {
                                                        echo  "";

                                                    }
                                                    else{
                                                        echo  "<div class='s1' style='display: flex'>last search:</div> ". $_POST['email'];

                                                    }
                                                }

                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group ic-cmp-int">
                                                <div class="form-ic-cmp">
                                                    <i class="notika-icon notika-next"></i>
                                                </div>
                                                <div class="nk-int-st">
                                                    <?= $this->Form->control('Artist Website', array('class' => 'form-control','name' => "website"))?>
                                                    <?php
                                                    if(!isset($_POST['website'])){
                                                        echo  "";

                                                    }
                                                    else{
                                                        if(empty($_POST['website']))
                                                        {
                                                            echo  "";

                                                        }
                                                        else{
                                                            echo  "<div class='s1' style='display: flex'>last search:</div> ". $_POST['website'];

                                                        }
                                                    }

                                                    ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group ic-cmp-int">
                                                <div class="form-ic-cmp">
                                                    <i class="notika-icon notika-map"></i>
                                                </div>
                                                <div class="nk-int-st">
                                                    <?= $this->Form->control('Mobs Connected To', array('class' => 'form-control', 'name' => "origin"))?>
                                                    <?php
                                                    if(!isset($_POST['origin'])){
                                                        echo  "";

                                                    }
                                                    else{
                                                        if(empty($_POST['origin']))
                                                        {
                                                            echo  "";

                                                        }
                                                        else{
                                                            echo  "<div class='s1' style='display: flex'>last search:</div> ". $_POST['origin'];

                                                        }
                                                    }

                                                    ?>
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
                                                    <?=  $this->Form->control(
                                                        'medium',
                                                        ['class'=>'form-control','type'=>'select','options'=> [
                                                            'Painting' => 'Painting',
                                                            'Drawing' => 'Drawing',
                                                            'Sculpture' => 'Sculpture',
                                                            'Printmaking' => 'Printmaking',
                                                            'Installation' => 'Installation',
                                                            'Performance' => 'Performance',
                                                            'Film' => 'Film',
                                                            'Digital' => 'Digital',
                                                            'Animation' => 'Animation',
                                                            'Projection' => 'Projection',
                                                            'Sound' => 'Sound',
                                                            'Flooring' => 'Flooring',
                                                            'Furniture' => 'Furniture',
                                                            'Public art' => 'Public art',
                                                            'Embedded art' => 'Embedded art',
                                                            'Environmental art' => 'Environmental art',
                                                            'Socially Engaged Practice' => 'Socially Engaged Practice',
                                                            'Other' => 'Other'
                                                        ], 'label' => __('Medium'), 'empty' => 'Please select the medium.']
                                                    );?>

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
                                                    'style',
                                                    ['class'=>'form-control','type'=>'select','options'=>[
                                                    'Conceptual' => 'Conceptual',
                                                    'Abstract' => 'Abstract',
                                                    'Figurative' => 'Figurative',
                                                    'Landscape' => 'Landscape',
                                                    'Digital' => 'Digital',
                                                    'Political' => 'Political',
                                                    'Humour' => 'Humour',
                                                    'Other' => 'Other'
                                                    ], 'label' => __('Style'), 'empty' => 'Please select the style.']
                                                    );
                                                    ?>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <br><br>
                                    <center><?= $this->Form->button("Search", array('class' => "button1"))?></center>

                                    <?= $this->Form->end() ?>



                                    <br>   <br>
                                    <h3>Results
                                       <button class="buttonone" style="float: right;"><?= $this->Html->Link('<div class="name1">Export </div>',['controller' => 'Admin', 'action' => 'export','_ext'=>'csv', $filtered_artists],['escape' => false])?></button>
                                    </h3>
                                    <div class="search_results" id="search_results">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="normal-table-list mg-t-30">
                                                <div class="bsc-tbl-st">
                                                    <table class="table table-striped" id="filteredArtists">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                                            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                                                            <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                                                            <th scope="col"><?= $this->Paginator->sort('indigenous', ['label' => 'Indigenous/Torres Strait Islander?']) ?></th>
                                                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php foreach ($filtered_artists as $artist): ?>
                                                            <tr>
                                                                <td><?= h($artist->name) ?></td>
                                                                <td><?= h($artist->email) ?></td>
                                                                <td><?= h($artist->phone) ?></td>
                                                                <td><?= h($artist->indigenous) ?></td>
                                                                <td class="actions">
                                                                    <?= $this->Html->link(__('Details'), ['controller' => 'Admin', 'action' => 'artistinfo', $artist->id]) ?> </br>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>

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
                        </div>



                        <div id="line-chart" class="flot-chart flot-chart-sts"></div>
</div>
                </div>

            </div>
        </div>
    </div>
    <!-- Body area Finish-->

    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2019
. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready( function () {
            $('#filteredArtists').DataTable();
        } );
    </script>
</body>
<div class = 'myBtn' ><button onclick="topFunction()" id="myBtn" title="Go to top">Top</button></div>
<script>
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
</script>
