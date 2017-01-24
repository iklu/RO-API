<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 24.01.2017
 * Time: 20:28
 */

namespace Application\EmailBundle\Mailer;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class AbstractMailer
{

    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * @var EngineInterface
     */
    protected $templating;
    /**
     * @var array
     */
    protected $parameters;

    /**
     * AbstractMailer constructor.
     * @param \Swift_Mailer $mailer
     * @param EngineInterface $templating
     * @param array $parameters
     */
    public function __construct(\Swift_Mailer $mailer,  EngineInterface $templating,  array $parameters)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->parameters = $parameters;
    }

    protected function getFromAddress() {
        return array($this->parameters["email_notification_from_name"] => $this->parameters["email_notification_from_name"] );
    }

    protected function getToAddress() {
        return explode(";", $this->parameters['email_notification_to']);
    }

    protected function getToAddressRealEstate() {
        return explode(";", $this->parameters['email_notification_realestate']);
    }

    protected function getBccAddress() {
        return explode(";", $this->parameters['email_notification_bcc']);
    }


}