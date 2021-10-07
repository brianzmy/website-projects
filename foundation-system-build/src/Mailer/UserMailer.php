<?php
/**
 * Created by PhpStorm.
 * User: kayden
 * Date: 2019-04-29
 * Time: 23:37
 */

namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public function welcome($user)
    {
        $this
            ->to($user->email)
            ->setSubject(sprintf('Welcome %s', $user->name))
            ->setTemplate('welcome_mail', 'custom'); // By default template with same name as method name is used.
    }

    public function resetPassword($user)
    {
        $this
            ->to($user->email)
            ->setSubject('Reset password')
            ->set(['token' => $user->token]);
    }
}