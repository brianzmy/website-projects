<?php
/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 18/05/2019
 * Time: 2:29 PM
 */

namespace App\Controller;


class ExportController extends AppController
{
    public function export(){

        $this->loadModel('Artists');

        // Downloads the Excel File
        $this->response->withDownload('export.csv');

        // Collect the data (change to Retrieve Post data)
        // $data sets the properties of the table used for the CSV file
        // $export is used to tell View class what variables to use for rendering CSV
        $data = $this->Artists->find('all')->toArray();
        $_export = 'data';
//        $_header = ['Name', 'Phone', 'Address', 'Email', 'Website', 'Origin', 'Budget'];
//        $_extract = ['Name', 'Phone', 'Address', 'Email'];
//        $this->set(compact('data', '_export', '_header', '_extract'));
        $this->set(compact('data', '_export'));


        // Tells Cake to use CsvView class which renders the data for us without needing to make a View template
        $this->viewBuilder()->setClassName('CsvView.Csv');

        return;

//        return $this->redirect(['controller' => 'Admin', 'action' => 'index']);
    }
}