<?=$this->Html->css('backtotopbutton')?>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="index.html">Dashboard One</a></li>
                                        <li><a href="index-2.html">Dashboard Two</a></li>
                                        <li><a href="index-3.html">Dashboard Three</a></li>
                                        <li><a href="index-4.html">Dashboard Four</a></li>
                                        <li><a href="analytics.html">Analytics</a></li>
                                        <li><a href="widgets.html">Widgets</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Email</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="inbox.html">Inbox</a></li>
                                        <li><a href="view-email.html">View Email</a></li>
                                        <li><a href="compose-email.html">Compose Email</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="#">Interface</a>
                                    <ul id="democrou" class="collapse dropdown-header-top">
                                        <li><a href="animations.html">Animations</a></li>
                                        <li><a href="google-map.html">Google Map</a></li>
                                        <li><a href="data-map.html">Data Maps</a></li>
                                        <li><a href="code-editor.html">Code Editor</a></li>
                                        <li><a href="image-cropper.html">Images Cropper</a></li>
                                        <li><a href="wizard.html">Wizard</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="#">Charts</a>
                                    <ul id="demolibra" class="collapse dropdown-header-top">
                                        <li><a href="flot-charts.html">Flot Charts</a></li>
                                        <li><a href="bar-charts.html">Bar Charts</a></li>
                                        <li><a href="line-charts.html">Line Charts</a></li>
                                        <li><a href="area-charts.html">Area Charts</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Tables</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="normal-table.html">Normal Table</a></li>
                                        <li><a href="data-table.html">Data Table</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demo" href="#">Forms</a>
                                    <ul id="demo" class="collapse dropdown-header-top">
                                        <li><a href="form-elements.html">Form Elements</a></li>
                                        <li><a href="form-components.html">Form Components</a></li>
                                        <li><a href="form-examples.html">Form Examples</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">App views</a>
                                    <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                        <li><a href="notification.html">Notifications</a>
                                        </li>
                                        <li><a href="alert.html">Alerts</a>
                                        </li>
                                        <li><a href="modals.html">Modals</a>
                                        </li>
                                        <li><a href="buttons.html">Buttons</a>
                                        </li>
                                        <li><a href="tabs.html">Tabs</a>
                                        </li>
                                        <li><a href="accordion.html">Accordion</a>
                                        </li>
                                        <li><a href="dialog.html">Dialogs</a>
                                        </li>
                                        <li><a href="popovers.html">Popovers</a>
                                        </li>
                                        <li><a href="tooltips.html">Tooltips</a>
                                        </li>
                                        <li><a href="dropdown.html">Dropdowns</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                    <ul id="Pagemob" class="collapse dropdown-header-top">
                                        <li><a href="contact.html">Contact</a>
                                        </li>
                                        <li><a href="invoice.html">Invoice</a>
                                        </li>
                                        <li><a href="typography.html">Typography</a>
                                        </li>
                                        <li><a href="color.html">Color</a>
                                        </li>
                                        <li><a href="login-register.html">Login Register</a>
                                        </li>
                                        <li><a href="404.html">404 Page</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->

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
                                    <?= $this->Form->create(null, ['method' => 'Post']) ?>

                                    <div class="row">

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group ic-cmp-int">
                                            <div class="form-ic-cmp">
                                                <i class="notika-icon notika-support"></i>
                                            </div>
                                            <div class="nk-int-st">

                                                <?= $this->Form->control('Artist name', array('class' => 'form-control','name' => "search"))?>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group ic-cmp-int">
                                                <div class="form-ic-cmp">
                                                    <i class="notika-icon notika-next"></i>
                                                </div>
                                                <div class="nk-int-st">
                                                    <?= $this->Form->control('Artist Website', array('class' => 'form-control','name' => "website"))?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group ic-cmp-int">
                                                <div class="form-ic-cmp">
                                                    <i class="notika-icon notika-map"></i>
                                                </div>
                                                <div class="nk-int-st">
                                                    <?= $this->Form->control('Origin', array('class'=>'form-control','name' => "origin", 'label' => 'Mobs Connected To'))?>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="row">
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
                                        <table class="table table-striped" id="filteredArtists">
                                            <thead>
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('website') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('origin', ['label' => 'Mobs Connected To']) ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php foreach ($filtered_artists as $artist): ?>
                                                <tr>
                                                    <td><?= h($artist->name) ?></td>
                                                    <td><?= h($artist->website) ?></td>
                                                    <td><?= h($artist->origin) ?></td>
                                                    <td class="actions">
                                                        <?= $this->Html->link(__('Details'), ['controller' => 'Client', 'action' => 'publicinfo', $artist->id]) ?> </br>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
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


