<?php

namespace Application\EmailBundle\Mailer;
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 08.12.2016
 * Time: 12:23
 */
use Application\AdminBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class Mailer implements MailerInterface
{
    /**
     * @var \Swift_Mailer
     */
    protected $mailer;
    /**
     * @var UrlGeneratorInterface
     */
    protected $router;
    /**
     * @var EngineInterface
     */
    protected $templating;
    /**
     * @var array
     */
    protected $parameters;
    /**
     * Mailer constructor.
     *
     * @param \Swift_Mailer         $mailer
     * @param UrlGeneratorInterface $router
     * @param EngineInterface       $templating
     * @param array                 $parameters
     */
    public function __construct($mailer, UrlGeneratorInterface  $router, EngineInterface $templating, array $parameters)
    {
        $this->mailer = $mailer;
        $this->router = $router;
        $this->templating = $templating;
        $this->parameters = $parameters;
    }
    /**
     * {@inheritdoc}
     */
    public function sendConfirmationEmailMessage(UserInterface $user, Request $request)
    {
        $template = $this->parameters['confirmation.template'];
        $url = $request->get("activateURL").$user->getConfirmationToken();
        $rendered = $this->templating->render($template, array(
            'user' => $user,
            'confirmationUrl' => $url,
        ));

        $this->sendEmailMessage($rendered, $this->parameters['email']['confirmation'], (string) $user->getEmail());
    }
    /**
     * {@inheritdoc}
     */
    public function sendResettingEmailMessage(UserInterface $user)
    {
        $template = $this->parameters['resetting.template'];
        $url = $this->router->generate('fos_user_resetting_reset', array('token' => $user->getConfirmationToken()), UrlGeneratorInterface::ABSOLUTE_URL);
        $rendered = $this->templating->render($template, array(
            'user' => $user,
            'confirmationUrl' => $url,
        ));
        $this->sendEmailMessage($rendered, $this->parameters['from_email']['resetting'], (string) $user->getEmail());
    }
    /**
     * @param string $renderedTemplate
     * @param string $fromEmail
     * @param string $toEmail
     */
    protected function sendEmailMessage($renderedTemplate, $fromEmail, $toEmail)
    {
        // Render the email, use the first line as the subject, and the rest as the body
        $renderedLines = explode("\n", trim($renderedTemplate));
        $subject = array_shift($renderedLines);
        $body = implode("\n", $renderedLines);

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($fromEmail)
            ->setTo($toEmail)
            ->setBody($body);
        $this->mailer->send($message);
    }
}