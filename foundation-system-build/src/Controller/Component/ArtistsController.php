<?php
namespace App\Controller;

/**
 * @property bool|object Properties
 */
class ArtistsController extends AppController
{

    public function index()
    {
//        Connect to the database and load all the artists & clients for the search function
//        $this->loadModel('Artists');



//        Example
//        $this->loadModel('Properties');
//
//        // Load all properties from the database which are not yet sold.
//        $unsoldProperties = $this->Properties->find()->where(['sold_price IS' => null]);

        // Pass these to the view so that they can be shown to the user. Make them available
        // to the view in a variable called 'properties'.
//        $this->set('properties', $unsoldProperties);

        // At the end of this function, CakePHP will render the template in src/Templates/Properties/projects_index.ctp.
    }

    public function details($house_id=null){

//        $details = $this->Properties->get($house_id);
//
//        $this->set('details',$details);

    }
}
