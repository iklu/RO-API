<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 08.12.2016
 * Time: 12:24
 */

namespace Application\EmailBundle\Mailer;


use Application\AdminBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\Request;

interface MailerInterface
{
    /**
     * Send an email to a user to confirm the account creation.
     *
     * @param UserInterface $user
     */
    public function sendConfirmationEmailMessage(UserInterface $user, Request $request);
    /**
     * Send an email to a user to confirm the password reset.
     *
     * @param UserInterface $user
     */
    public function sendResettingEmailMessage(UserInterface $user);
}