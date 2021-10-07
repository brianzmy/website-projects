<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use function PHPSTORM_META\type;
use Cake\Utility\Security;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property \App\Model\Table\ArtistsTable $Artists
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */



class UsersController extends AppController
{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['adda','addadmin','addg','addc', 'login', 'forgotpass','index','changepass','view','delete']);
        $this->Auth->allow(['controller' => 'Artists', 'action' => 'adda','action' => 'addadmin','action' => 'addg','action' => 'addc']);
    }

    /**
     * @return \Cake\Http\Response|null
     */
    public function adda()
    {
        $this->viewBuilder()->layout('userslayout');
        $this->loadModel('Artists');

        $artist_table = TableRegistry::get('Artists');

        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
//            $artist = $this->Artists->patchEntity($artist, $this->request->getData());
            $artist = $this->Artists->newEntity($this->request->getData(), ['validate' => 'Default']);

            if($artist->errors('name')){
                foreach($artist->errors('name') as $errors){
                    $name_msg[] = $errors;
                }

                $this->set('name', $name_msg);
            }

            if($artist->errors('phone')){
                foreach($artist->errors('phone') as $errors){
                    $phone_msg[] = $errors;
                }

                $this->set('phone', $phone_msg);
            }

            if($artist->errors('address')){
                foreach($artist->errors('address') as $errors){
                    $address_msg[] = $errors;
                }

                $this->set('address', $address_msg);
            }

            if($artist->errors('email')){
                foreach($artist->errors('email') as $errors){
                    $a_email_msg[] = $errors;
                }

                $this->set('a_email', $a_email_msg);
            }

            $artist->name = $this->request->getData('name');
            $artist->email = $this->request->getData('Email');
            $artist->phone = $this->request->getData('phone');
            $artist->address = $this->request->getData('address');
            $artist->website = $this->request->getData('website');
            $artist->origin = $this->request->getData('origin');
            $artist->budget = $this->request->getData('budget');
            $artist->indigenous = $this->request->getData('indigenous');
            $artist->approval = $this->request->getData('approval');

            if ($this->Artists->save($artist)) {

                $resume_table = TableRegistry::get('resumes');
                $resumeUser = $resume_table->newEntity();

                $query = $artist_table->find('all', ['order' => ['id' => 'DESC']]);
                $thisID = $query->first()->toArray()['id'];

                $resumeUser->description = "";
                $resumeUser->experienceType = "";
                $resumeUser->artist_id = $thisID;

                if ($resume_table->save($resumeUser)) {

                }

                $agents_table = TableRegistry::get("agents");
                $agent = $agents_table->newEntity();

                $agent->name = "";
//                        $agent->email = "";
                $agent->phone = "";
                $agent->website = "";
                $agent->artist_id = $thisID;

                $agents_table->save($agent);
            }

            $userP = $this->request->getData('password');
            $userCP = $this->request->getData('conpass');

            if($userP == $userCP){
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->type = $this->request->getData('Type');
                $user->artist_id = $artist->id;

                $this->Users->checkRules($user);

                if($user->errors('username')){
                    foreach($user->errors('username') as $errors){
                        $username_msg[] = $errors;
                    }

                    $this->set('username', $username_msg);
                }

                if($user->errors('Email')){
                    foreach($user->errors('Email') as $errors){
                        $email_msg[] = $errors;
                    }

                    $this->set('email', $email_msg);
                }

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your artist account has been created, please login.'));
                    $artistName = $this->request->getData('username');
                    $artistEmailAddress = $this->request->getData('Email');
                    $message = "Hi there,\n";
                    $message .="Thank you for creating an account with T Projects. Your login details are below: \n";
                    $message .="Username: " . $artistName . "\n";
                    $message .="Password: the password you set during sign up \n";
                    $message .= "\n";
                    $message .= "To log in, please navigate to http://localhost:8765/users/login \n";
                    $message .= "\n";
                    $message .= "Yours Truly, \n";
                    $message .= "T Projects \n";
                    $message .= "tprojects.co \n";

                    $email = new Email('default');
                    $email->addTo($artistEmailAddress);
                    $email->setSubject("Welcome to T Projects!");
                    $email->send($message);

                    return $this->redirect(['action' => 'login']);
                }
                else{
                    $this->Flash->error(__('Your account could not be created, please try again..'));
                }
            }
            else{
                $this->Flash->error(__('The password is not the same. Please try again.'));
            }


        }

        $indigenousOptions = array(
            'Yes' => 'Yes',
            'No' => 'No',
            'Prefer Not To Answer' => 'Prefer Not To Answer'
        );

        $artists = $this->Users->Artists->find('list', ['limit' => 200]);
        $this->set(compact('user', 'artists', 'indigenousOptions'));
    }


    public function c49b96db6ccfbd6d7afdde9234ddace9a326b4c2()
    {
        $this->viewBuilder()->layout('userslayout');

        $artist_table = TableRegistry::get('Artists');
        $artist = $artist_table->newEntity();

        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
//            $artist = $this->Artists->patchEntity($artist);
            $artist->name = $this->request->getData('name');
            $artist->email = $this->request->getData('Email');
            $artist->phone = $this->request->getData('phone');
            $artist->address = $this->request->getData('address');
            $artist->website = $this->request->getData('website');
            $artist->origin = $this->request->getData('origin');
            $artist->budget = $this->request->getData('budget');
            $artist->indigenous = $this->request->getData('indigenous');

            if ($artist_table->save($artist)) {

                $resume_table = TableRegistry::get('resumes');
                $resumeUser = $resume_table->newEntity();

                $query = $artist_table->find('all', ['order' => ['id' => 'DESC']]);
                $thisID = $query->first()->toArray()['id'];

                $resumeUser->description = "";
                $resumeUser->experienceType = "";
                $resumeUser->artist_id = $thisID;

                if ($resume_table->save($resumeUser)) {

                }

                $agents_table = TableRegistry::get("agents");
                $agent = $agents_table->newEntity();

                $agent->name = "";
//                        $agent->email = "";
                $agent->phone = "";
                $agent->website = "";
                $agent->artist_id = $thisID;

                $agents_table->save($agent);
            }

            $userP = $this->request->getData('password');
            $userCP = $this->request->getData('conpass');

            if($userP == $userCP){
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->type = $this->request->getData('Type');
                $user->artist_id = $artist->id;

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your artist account has been created, please login.'));
                    $artistName = $this->request->getData('username');
                    $artistEmailAddress = $this->request->getData('Email');
                    $message = "Hi there,\n";
                    $message .="Thank you for creating an account with T Projects. Your login details are below: \n";
                    $message .="Username: " . $artistName . "\n";
                    $message .="Password: the password you set during sign up \n";
                    $message .= "\n";
                    $message .= "To log in, please navigate to http://localhost:8765/users/login \n";
                    $message .= "\n";
                    $message .= "Yours Truly, \n";
                    $message .= "T Projects \n";
                    $message .= "tprojects.co \n";

                        $email = new Email('default');
                        $email->addTo($artistEmailAddress);
                        $email->setSubject("Welcome to T Projects!");
                        $email->send($message);
                }
                else{
                    $this->Flash->error(__('Your account could not be created, please try again..'));
                }
            }
            else{
                $this->Flash->error(__('The password is not the same. Please try again.'));
            }

            return $this->redirect(['action' => 'login']);
        }

        $indigenousOptions = array(
            'Yes' => 'Yes',
            'No' => 'No',
            'Prefer Not To Answer' => 'Prefer Not To Answer'
        );

        $artists = $this->Users->Artists->find('list', ['limit' => 200]);
        $this->set(compact('user', 'artists', 'indigenousOptions'));
    }
    public function c9bb26e0efc4e3b224bfc81b889de07141721ccf()
    {
        $this->viewBuilder()->layout('userslayout');
        $this->loadModel('Artists');

        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {

            $userP = $this->request->getData('password');
            $userCP = $this->request->getData('conpass');

            if($userP == $userCP){
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->type = $this->request->getData('Type');

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your gallery account has been created, please login.'));
                    $artistName = $this->request->getData('username');
                    $artistEmailAddress = $this->request->getData('Email');
                    $message = "Hi there,\n";
                    $message .="Thank you for creating an account with T Projects. Your login details are below: \n";
                    $message .="Username: " . $artistName . "\n";
                    $message .="Password: the password you set during sign up \n";
                    $message .= "\n";
                    $message .= "To log in, please navigate to http://localhost:8765/users/login \n";
                    $message .= "\n";
                    $message .= "Yours Truly, \n";
                    $message .= "T Projects \n";
                    $message .= "tprojects.co \n";

                    $email = new Email('default');
                    $email->addTo($artistEmailAddress);
                    $email->setSubject("Welcome to T Projects!");
                    $email->send($message);
                }
                else{
                    $this->Flash->error(__('Your account could not be created, please try again..'));
                }
            }
            else{
                $this->Flash->error(__('The password is not the same. Please try again.'));
            }

            return $this->redirect(['action' => 'login']);
        }
        $artists = $this->Users->Artists->find('list', ['limit' => 200]);
        $this->set(compact('user', 'artists'));
    }

    public function addg()
    {
        $this->viewBuilder()->layout('userslayout');
//        $this->loadModel('galleries');
//
//        $gallery_table = TableRegistry::get('Galleries');

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $userP = $this->request->getData('password');
            $userCP = $this->request->getData('conpass');

            if($userP == $userCP){
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $this->Users->checkRules($user);
                $user->type = $this->request->getData('Type');

                if($user->errors('username')){
                    foreach($user->errors('username') as $errors){
                        $username_msg[] = $errors;
                    }

                    $this->set('username', $username_msg);
                }

                if($user->errors('Email')){
                    foreach($user->errors('Email') as $errors){
                        $email_msg[] = $errors;
                    }

                    $this->set('email', $email_msg);
                }

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your gallery account has been created, please login.'));
                    $artistName = $this->request->getData('username');
                    $artistEmailAddress = $this->request->getData('Email');
                    $message = "Hi there,\n";
                    $message .="Thank you for creating an account with T Projects. Your login details are below: \n";
                    $message .="Username: " . $artistName . "\n";
                    $message .="Password: the password you set during sign up \n";
                    $message .= "\n";
                    $message .= "To log in, please navigate to http://localhost:8765/users/login \n";
                    $message .= "\n";
                    $message .= "Yours Truly, \n";
                    $message .= "T Projects \n";
                    $message .= "tprojects.co \n";

                    $email = new Email('default');
                    $email->addTo($artistEmailAddress);
                    $email->setSubject("Welcome to T Projects!");
                    $email->send($message);

                    return $this->redirect(['action' => 'login']);
                }
            }
            else{
                $this->Flash->error(__('The password is not the same. Please try again.'));
            }
        }
        $artists = $this->Users->Artists->find('list', ['limit' => 200]);

        $this->set(compact('user', 'artists'));
    }

    public function b8f054014b1c16f2cfbf4216c9da3d8ab7d56a2a()
    {
        $this->viewBuilder()->layout('userslayout');

        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {

            $userP = $this->request->getData('password');
            $userCP = $this->request->getData('conpass');

            if($userP == $userCP){
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->type = $this->request->getData('Type');

                if($user->errors('username')){
                    foreach($user->errors('username') as $errors){
                        $username_msg[] = $errors;
                    }

                    $this->set('username', $username_msg);
                }

                if($user->errors('Email')){
                    foreach($user->errors('Email') as $errors){
                        $email_msg[] = $errors;
                    }

                    $this->set('email', $email_msg);
                }

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your client account has been created, please login.'));
                    $artistName = $this->request->getData('username');
                    $artistEmailAddress = $this->request->getData('Email');
                    $message = "Hi there,\n";
                    $message .="Thank you for creating an account with T Projects. Your login details are below: \n";
                    $message .="Username: " . $artistName . "\n";
                    $message .="Password: the password you set during sign up \n";
                    $message .= "\n";
                    $message .= "To log in, please navigate to http://localhost:8765/users/login \n";
                    $message .= "\n";
                    $message .= "Yours Truly, \n";
                    $message .= "T Projects \n";
                    $message .= "tprojects.co \n";

                    $email = new Email('default');
                    $email->addTo($artistEmailAddress);
                    $email->setSubject("Welcome to T Projects!");
                    $email->send($message);
                }
                else{
                    $this->Flash->error(__('Your account could not be created, please try again..'));
                }
            }
            else{
                $this->Flash->error(__('The password is not the same. Please try again.'));
            }

            return $this->redirect(['action' => 'login']);
        }
        $artists = $this->Users->Artists->find('list', ['limit' => 200]);
        $this->set(compact('user', 'artists'));
    }

    public function addc()
    {
        $this->viewBuilder()->layout('userslayout');

        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {

            $userP = $this->request->getData('password');
            $userCP = $this->request->getData('conpass');

            if($userP == $userCP){
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $this->Users->checkRules($user);
                $user->type = $this->request->getData('Type');

                if($user->errors('username')){
                    foreach($user->errors('username') as $errors){
                        $username_msg[] = $errors;
                    }

                    $this->set('username', $username_msg);
                }

                if($user->errors('Email')){
                    foreach($user->errors('Email') as $errors){
                        $email_msg[] = $errors;
                    }

                    $this->set('email', $email_msg);
                }

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your client account has been created, please login.'));
                    $artistName = $this->request->getData('username');
                    $artistEmailAddress = $this->request->getData('Email');
                    $message = "Hi there,\n";
                    $message .="Thank you for creating an account with T Projects. Your login details are below: \n";
                    $message .="Username: " . $artistName . "\n";
                    $message .="Password: the password you set during sign up \n";
                    $message .= "\n";
                    $message .= "To log in, please navigate to http://localhost:8765/users/login \n";
                    $message .= "\n";
                    $message .= "Yours Truly, \n";
                    $message .= "T Projects \n";
                    $message .= "tprojects.co \n";

                    $email = new Email('default');
                    $email->addTo($artistEmailAddress);
                    $email->setSubject("Welcome to T Projects!");
                    $email->send($message);

                    return $this->redirect(['action' => 'login']);
                }
                else{
                    $this->Flash->error(__('Your account could not be created, please try again..'));
                }
            }
            else{
                $this->Flash->error(__('The password is not the same. Please try again.'));
            }
        }
        $artists = $this->Users->Artists->find('list', ['limit' => 200]);
        $this->set(compact('user', 'artists'));
    }
    public function addadmin()
    {
        $this->viewBuilder()->layout('default');

        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {

            $userP = $this->request->getData('password');
            $userCP = $this->request->getData('conpass');

            if($userP == $userCP){
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->type = $this->request->getData('Type');

                if ($this->Users->save($user)) {
                    return $this->redirect(['action' => 'listadmins']);
                }
                else{
                    $this->Flash->success(__('Your account could not be created, please try again.'));
                }
            }
            else{
                $this->Flash->success(__('The password is not the same. Please try again.'));
            }
        }
        $artists = $this->Users->Artists->find('list', ['limit' => 200]);
        $this->set(compact('user', 'artists'));
    }


    public function login()
    {
      $this->viewBuilder()->layout('userslayout');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                if($this->Auth->user('type') == 'Admin'){
                    return $this->redirect(['controller' => 'Admin', 'action' => 'index']);
                }

                if(isset($user['type']) && $user['type'] === 'Artist'){
                    $artistID = $this->getRequest()->getSession()->read('Auth.User.artist_id');
                    $userID = $this->Auth->user('id');

                    if($artistID != null){
                        $this->loadComponent('Auth', [
                            'authorize' =>array('Controller'),
                            'loginRedirect' => array('controller' => 'admin', 'action' => 'artistinfo', $artistID)
                        ]);
                        return $this->redirect(['controller' => 'admin', 'action' => 'artistinfo', $artistID]);
                    }
                    else {
                        $this->loadComponent('Auth', [
                            'authorize' =>array('Controller'),
                            'loginRedirect' => array()
                        ]);
                        return $this->redirect(['controller' => 'artists', 'action' => 'add', $userID]);
                    }
                }

                if($this->Auth->user('type') == 'Gallery'){
                    $galleryID = $this->getRequest()->getSession()->read('Auth.User.gallery_id');
                    $userID = $this->Auth->user('id');

                    if($galleryID != null){
                        $this->loadComponent('Auth', [
                            'authorize' =>array('Controller'),
                            'loginRedirect' => array('controller' => 'galleries', 'action' => 'view', $galleryID)
                        ]);
                        return $this->redirect(['controller' => 'galleries', 'action' => 'view', $galleryID]);
                    }
                    else {
                        return $this->redirect(['controller' => 'galleries', 'action' => 'add', $userID]);
                    }
                }

                if($this->Auth->user('type') == 'Client'){
                    return $this->redirect(['controller' => 'Client', 'action' => 'index']);
                }
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function forgotpass()
    {
        $this->viewBuilder()->layout('userslayout');

        if ($this->request->is('POST')) {
            $userEmail = $this->request->getData('useremail');
            $message = "Hi, \n";
            $message .= "You have requested to reset your password on the T Projects Artist Database. If this request was not made by you, please ignore this email. \n";
            $message .= "Follow the link to reset your password: \n";
            $message .= "https://artsearch.com.au/tprojects/users/changepass/" .$userEmail ."\n";
            $message .= "Yours Truly, \n";
            $message .= "T Projects \n";
            $message .= "tprojects.co \n";

            if (!empty($userEmail)) {
                $email = new Email('default');
                $email->addTo($userEmail);
                $email->setSubject("T Projects Artist Database - Reset Password");
                $email->send($message);
            } else {
                echo "Please enter a valid email address.\n";
            };

            $this->Flash->success(__('The email have been sent .'));
            return $this->redirect(['action'=>'login']);
        }
    }

    public function changepass($email = null) {

        $this->viewBuilder()->layout('userslayout');

//        if($this->request->is('post')){
//            $password = $this->request->getData('password');
//
//            $confPassword = $this->request->getData('confPass');
////            $curtUser=$this->Users->find()->where(['email'=>$userEmail]);
////            $curtUser->password = $confPassword;
////            $curtUser->first();
//            if($password == $confPassword) {
////                $this->Users->query()->update()->set(['password' => $this->request->getData('password')])->where(['Email =' => $userEmail])->execute();
////                $curtUser=$this->Users->patchEntity($curtUser,$this->request->getData());
//                $curtUser=$this->Users->find()->where(['email'=>$userEmail]);
//                $curtUser->password = hash($password);
//                if($this->Users->save($curtUser)){
//                    $this->Flash->success(__('The password has been changed.'));
//                    return $this->redirect(['action'=>'login']);
//
//                }
//
//
//            }
//            else{
//                $this->Flash->error(__('The password is not the same. Please try again.'));
//            }
//        }
//        $user=$this->Auth->user();
//       $newUser=$this->Users->find()->select('id')->where(['email'=>$userEmail]);
////       $newUser->first();
//        if ($this->request->is(['patch', 'post', 'put'])) {
//            $newUser = $this->Users->patchEntity($newUser, $this->request->getData());
//            if ($this->Users->save($newUser)) {
//                $this->Flash->success(__('The user has been saved.'));
//                $this->getRequest()->session()->write('Auth.User',$newUser);
//                return $this->redirect(['controller'=>'Users','action' => 'login']);
//            }
//            $this->Flash->error(__('The user could not be saved. Please, try again.'));
//        }
//        $this->set(compact('newUser'));

        if($this->request->is('post')){

            $hasher = new DefaultPasswordHasher();
            $userPass = $hasher->hash($this->request->getData('password'));

            $userTable = TableRegistry::get('Users');
            $user = $userTable->find('all')->where(['Email' => $email])->first();
            $user->password = $userPass;
            $user->password = $this->request->getData('userPass');
            if($userTable->save($user)){
                $this->Flash->success(__('The password has been changed.'));
                return $this->redirect(['action'=>'login']);
            }
        }



    }

    public function homepage()
    {
        $this->viewBuilder()->layout('userslayout');
    }

    public function index()
    {
        $this->viewBuilder()->layout('userslayout');
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function view()
    {
        $users = $this->paginate($this->Users->find()->where(['type'=>'Client']),['limit'=>10]);

        $this->set(compact('users'));
    }

    public function listadmins()
    {
        $users = $this->paginate($this->Users->find()->where(['type'=>'Admin']),['limit'=>10]);

        $this->set(compact('users'));
    }

    public function deleteadmin($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'listadmins']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'view']);
    }



}
