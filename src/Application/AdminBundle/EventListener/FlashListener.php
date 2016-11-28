<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\EventListener;

use Application\AdminBundle\ApplicationAdminEvents;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Translation\TranslatorInterface;

class FlashListener implements EventSubscriberInterface
{
    /**
     * @var string[]
     */
    private static $successMessages = array(
        ApplicationAdminEvents::CHANGE_PASSWORD_COMPLETED => 'change_password.flash.success',
        ApplicationAdminEvents::GROUP_CREATE_COMPLETED => 'group.flash.created',
        ApplicationAdminEvents::GROUP_DELETE_COMPLETED => 'group.flash.deleted',
        ApplicationAdminEvents::GROUP_EDIT_COMPLETED => 'group.flash.updated',
        ApplicationAdminEvents::PROFILE_EDIT_COMPLETED => 'profile.flash.updated',
        ApplicationAdminEvents::REGISTRATION_COMPLETED => 'registration.flash.user_created',
        ApplicationAdminEvents::RESETTING_RESET_COMPLETED => 'resetting.flash.success',
    );

    /**
     * @var Session
     */
    private $session;

    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * FlashListener constructor.
     *
     * @param Session             $session
     * @param TranslatorInterface $translator
     */
    public function __construct(Session $session, TranslatorInterface $translator)
    {
        $this->session = $session;
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            ApplicationAdminEvents::CHANGE_PASSWORD_COMPLETED => 'addSuccessFlash',
            ApplicationAdminEvents::GROUP_CREATE_COMPLETED => 'addSuccessFlash',
            ApplicationAdminEvents::GROUP_DELETE_COMPLETED => 'addSuccessFlash',
            ApplicationAdminEvents::GROUP_EDIT_COMPLETED => 'addSuccessFlash',
            ApplicationAdminEvents::PROFILE_EDIT_COMPLETED => 'addSuccessFlash',
            ApplicationAdminEvents::REGISTRATION_COMPLETED => 'addSuccessFlash',
            ApplicationAdminEvents::RESETTING_RESET_COMPLETED => 'addSuccessFlash',
        );
    }

    /**
     * @param Event  $event
     * @param string $eventName
     */
    public function addSuccessFlash(Event $event, $eventName)
    {
        if (!isset(self::$successMessages[$eventName])) {
            throw new \InvalidArgumentException('This event does not correspond to a known flash message');
        }

        $this->session->getFlashBag()->add('success', $this->trans(self::$successMessages[$eventName]));
    }

    /**
     * @param string$message
     * @param array $params
     *
     * @return string
     */
    private function trans($message, array $params = array())
    {
        return $this->translator->trans($message, $params, 'FOSUserBundle');
    }
}
