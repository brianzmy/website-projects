<?php
namespace App\Controller;

use Cake\Mailer\Email;

class EmailController extends AppController
{

    public function index()
    {
    }


    public function generateLink()
    {
        $user = $this->Auth->user();

        if($user['type'] != 'Admin'){
            return $this->redirect($this->Auth->logout());
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        if($this->request->is('POST')) {
            $artistName = $this->request->getData('artName');
            $artistEmailAddress = $this->request->getData('artEmail');
            $message = "Dear " . $artistName . "," . "\n";
            $message .= "\n";
            $message .= "Welcome to the T Projects artists database, a bespoke database designed to accommodate our growing artists files.\n";
            $message .= "\n";
            $message .= "This database has been created to allow us to store artist’s contact details, artist’s representation details, galleries etc, artist’s statement, exhibiting and commissioning details and a selection of images to reflect current practice. Our artist files are managed and curated by the T Projects international team of consultants. Artists are added strictly by invitation only. Invited artists are responsible for their own content stored in this database.\n";
            $message .= "\n";
            $message .= "When creating your artist file, you are able to submit the information and images that you feel is most representative of your current practice. All images copyright remains with the artist. This database is strictly for the use of T Projects only. Images and information may be presented by T Projects to clients for consideration for commissioning projects. Third parties can not access this database.\n";
            $message .= "\n";
            $message .= "Please note that this is a confidential email and the following link must NOT be shared with anyone including family members, friends and/or acquaintances. \n";
            $message .= "\n";
            $message .= "To create your account, please go to the following link:";
            $link ='adda';

            $token =sha1($link);
            $message .= 'http://artsearch.com.au/tprojects/users/' .$link;
            $message .= "\n";
            $message .= "Yours Truly, \n";
            $message .= "T Projects \n";
            $message .= "tprojects.co \n";

            if (!empty($artistEmailAddress) && !empty($artistName)) {
                $email = new Email('default');
                $email->addTo($artistEmailAddress);
                $email->setSubject("T Projects Artist Database - New Artist");
                $email->send($message);
                //debug($email);
            } else {
                echo "Please fill the information.\n";
            };

            $this->Flash->success(__('The invitation has been sent to the artist.'));

            $this->redirect(['action' => 'generate_link']);
            //debug($email);
        }
    }

    public function galleryemail()
    {
        $user = $this->Auth->user();

        if($user['type'] != 'Admin'){
            return $this->redirect($this->Auth->logout());
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        if($this->request->is('POST')) {
            $artistName = $this->request->getData('artName');
            $artistEmailAddress = $this->request->getData('artEmail');
            $message = "Dear " . $artistName . "," . "\n";
            $message .= "\n";
            $message .= "Welcome to the T Projects artists database, a bespoke database designed to accommodate our growing artists files.\n";
            $message .= "\n";
            $message .= "This database has been created to allow us to store artist’s contact details, artist’s representation details, galleries etc, artist’s statement, exhibiting and commissioning details and a selection of images to reflect current practice. Our artist files are managed and curated by the T Projects international team of consultants. Artists are added strictly by invitation only. Invited artists are responsible for their own content stored in this database.\n";
            $message .= "\n";
            $message .= "Please note that this is a confidential email and the following link must NOT be shared with anyone including family members, friends and/or acquaintances. \n";
            $message .= "\n";
            $message .= "To create your account, please go to the following link:";

            $link ='addg';

            $token =sha1($link);
            $message .= 'http://artsearch.com.au/tprojects/users/' .$link;
            $message .= "\n";
            $message .= "Yours Truly, \n";
            $message .= "T Projects \n";
            $message .= "tprojects.co \n";

            if (!empty($artistEmailAddress) && !empty($artistName)) {
                $email = new Email('default');
                $email->addTo($artistEmailAddress);
                $email->setSubject("T Projects Artist Database - New Gallery");
                $email->send($message);
                //debug($email);
            } else {
                echo "Please fill the information.\n";
            };

            $this->Flash->success(__('The invitation has been sent to the gallery'));

            $this->redirect(['action' => 'galleryemail']);
        }
    }

    public function clientemail()
    {
        $user = $this->Auth->user();

        if($user['type'] != 'Admin'){
            return $this->redirect($this->Auth->logout());
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        if($this->request->is('POST')) {
            $artistName = $this->request->getData('artName');
            $artistEmailAddress = $this->request->getData('artEmail');
            $message = "Dear " . $artistName . "," . "\n";
            $message .= "\n";
            $message .= "Welcome to the T Projects artists database, a bespoke database designed to accommodate our growing artists files.\n";
            $message .= "\n";
            $message .= "This database has been created to allow us to store artist’s contact details, artist’s representation details, galleries etc, artist’s statement, exhibiting and commissioning details and a selection of images to reflect current practice. Our artist files are managed and curated by the T Projects international team of consultants. Artists are added strictly by invitation only. Invited artists are responsible for their own content stored in this database.\n";
            $message .= "\n";
            $message .= "Please note that this is a confidential email and the following link must NOT be shared with anyone including family members, friends and/or acquaintances. \n";
            $message .= "\n";
            $message .= "To create your account, please go to the following link:";
            $link ='addc';

            $token =sha1($link);
            $message .= 'http://artsearch.com.au/tprojects/users/' .$link;
            $message .= "\n";
            $message .= "Yours Truly, \n";
            $message .= "T Projects \n";
            $message .= "tprojects.co \n";

            if (!empty($artistEmailAddress) && !empty($artistName)) {
                $email = new Email('default');
                $email->addTo($artistEmailAddress);
                $email->setSubject("T Projects Artist Database - New Client");
                $email->send($message);
                //debug($email);
            } else {
                echo "Please fill the information.\n";
            };
            //debug($email);
            $this->Flash->success(__('The invitation has been sent to the client.'));

            $this->redirect(['action' => 'clientemail']);
        }
    }
}


