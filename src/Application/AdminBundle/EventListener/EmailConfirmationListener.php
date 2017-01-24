<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\AdminBundle\EventListener;

use Application\AdminBundle\Event\GetResponseUserEvent;
use Application\EmailBundle\Mailer\MailerInterface;
use Application\AdminBundle\Event\FormEvent;
use Application\AdminBundle\Model\UserInterface;
use Application\AdminBundle\Util\TokenGeneratorInterface;
use Application\AdminBundle\ApplicationAdminEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class EmailConfirmationListener implements EventSubscriberInterface
{
    private $mailer;
    private $tokenGenerator;

    /**
     * EmailConfirmationListener constructor.
     * @param MailerInterface $mailer
     * @param TokenGeneratorInterface $tokenGenerator
     */
    public function __construct(MailerInterface $mailer, TokenGeneratorInterface $tokenGenerator)
    {
        $this->mailer = $mailer;
        $this->tokenGenerator = $tokenGenerator;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            ApplicationAdminEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
        );
    }

    /**
     * @param GetResponseUserEvent $event
     */
    public function onRegistrationSuccess(GetResponseUserEvent $event)
    {

        /** @var $user UserInterface */
        $user = $event->getUser();
        $request = $event->getRequest();
        $user->setEnabled(false);
        if (null === $user->getConfirmationToken()) {
            $user->setConfirmationToken($this->tokenGenerator->generateToken());
        }
        $this->mailer->sendActivationEmail($user,$request);
        $event->setResponse(true);
    }
}
