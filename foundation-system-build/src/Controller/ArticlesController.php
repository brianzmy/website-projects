<?php
namespace App\Controller;

class ArticlesController extends AppController
{

    public function home()
    {
        // This view doesn't actually need to load any data to pass to the view,
        // because it is all hardcoded in the src/Templates/Articles/home.ctp template.
    }

}
