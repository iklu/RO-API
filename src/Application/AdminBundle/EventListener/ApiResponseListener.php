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

use Application\AdminBundle\ApplicationAdminEvents;
use Application\CoreBundle\Utils\ApiResponse;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Translation\TranslatorInterface;

class ApiResponseListener implements EventSubscriberInterface
{

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            ApplicationAdminEvents::REGISTRATION_COMPLETED => 'addSuccessFlash',
        );
    }

    /**
     * @param Event  $event
     * @param string $eventName
     */
    public function addSuccessFlash(Event $event, $eventName)
    {
        $event->setResponse(ApiResponse::setResponse("Success!",Response::HTTP_OK));
    }

}
