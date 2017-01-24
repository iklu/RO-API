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
    public function sendActivationEmail(UserInterface $user, Request $request);
}