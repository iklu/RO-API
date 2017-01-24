<?php

namespace Application\EmailBundle\Mailer;
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 08.12.2016
 * Time: 12:23
 */
use Application\AdminBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\Request;

class Mailer extends AbstractMailer implements MailerInterface
{

    //send email for activate an account
    public function sendActivationEmail(UserInterface $receiver, Request $request) {

        try {

            //email template parameters
            $body = $this->templating->render(
                'ApplicationEmailBundle:Message:messageActivate.em.twig',
                array(
                    'receiverFirstName' => $receiver->getFirstName(),
                    'receiverLastName' => $receiver->getLastName(),
                    'activateUrl' => "localhost/RO-WEB/web/secured/account/activate/" . $receiver->getId() . "/" . md5($receiver->getId() . $receiver->getEmail() . $receiver->getPassword())
                )
            );

            //set email parameters
            $message = \Swift_Message::newInstance()
                ->setSubject(EmailSubject::REGISTRATION_ACTIVATE)
                ->setFrom($this->getFromAddress())
                ->setTo($receiver->getEmail())
                ->setBody($body, 'text/html');

             $this->mailer->send($message);

        }
        catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());

        }
    }

    //send email when account has been successfully activated
    public function sendActivatedEmail(UserInterface $receiver) {

        try {

            //email template parameters
            $body = $this->templating->render(
                'ApplicationEmailBundle:Message:messageActivated.em.twig',
                array(
                    'receiverFirstName' => $receiver->getFirstName(),
                    'receiverLastName' => $receiver->getLastName(),
                    'receiverUsername' => $receiver->getUsername()
                )
            );

            //set email parameters
            $message = \Swift_Message::newInstance()
                ->setSubject(EmailSubject::REGISTRATION)
                ->setFrom($this->getFromAddress())
                ->setTo($receiver->getEmail())
                ->setBody($body, 'text/html');

            //send email
            $this->mailer->send($message);
        }
        catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    //send email with link when password was forgotten
    public function sendForgotPasswordEmail(UserInterface $receiver, $userReset) {

        try {

            //email template
            $timestamp = strtotime('now');

            $body = $this->templating->render(
                'ApplicationEmailBundle:Message:messageForgotPassword.em.twig',
                array(
                    'receiverFirstName' => $receiver->getFirstName(),
                    'receiverLastName' => $receiver->getLastName(),
                    'resetUrl' => $this->getFrontURL() . 'rewards/password/reset/' . $timestamp . '/' . $receiver->getId() . '/' . md5($timestamp . $receiver->getId() . $receiver->getEmail() . $receiver->getPassword())."?userReset=".$userReset
                )
            );

            //set email parameters
            $message = \Swift_Message::newInstance()
                ->setSubject(EmailSubject::FORGOT_PASSWORD)
                ->setFrom($this->getFromAddress())
                ->setTo($receiver->getEmail())
                ->setBody($body, 'text/html');

            //send email
            $this->mailer->send($message);
        }
        catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    //send email with new password when password was reset
    public function sendResetPasswordEmail(UserInterface $receiver, $password) {

        try {

            //email template
            $body = $this->templating->render(
                'ApplicationEmailBundle:Message:messageResetPassword.em.twig',
                array(
                    'receiverFirstName' => $receiver->getFirstName(),
                    'receiverLastName' => $receiver->getLastName(),
                    'password' => $password
                )
            );

            //set email parameters
            $message = \Swift_Message::newInstance()
                ->setSubject(EmailSubject::RESET_PASSWORD)
                ->setFrom($this->getFromAddress())
                ->setTo($receiver->getEmail())
                ->setBody($body, 'text/html');

            //send email
            $this->mailer->send($message);
        }
        catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    //send email for Fleet Service form
    public function sendFleetServiceEmail(FleetServicesForm $entity) {

        if($entity->getScheduleMaintenance() === true) {
            $scheduleMaintenance = 'Yes';
        } elseif ($entity->getScheduleMaintenance() === false) {
            $scheduleMaintenance = 'No';
        } else {
            $scheduleMaintenance = 'Not selected';
        }

        if( $entity->getPurchaseOrderSystem() === true) {
            $purchaseOrderSystem = 'Yes';
        } elseif ( $entity->getPurchaseOrderSystem() === false) {
            $purchaseOrderSystem = 'No';
        } else {
            $purchaseOrderSystem = 'Not selected';
        }

        if($entity->getCentralizedBilling() === true ) {
            $centralizedBilling = 'Yes';
        } elseif ($entity->getCentralizedBilling() === false) {
            $centralizedBilling = 'No';
        } else {
            $centralizedBilling = 'Not selected';
        }

        try {

            //email template parameters
            $body = $this->templating->render(
                'ApplicationEmailBundle:Message:messageFleetService.em.twig',
                array(
                    'organizationName' => $entity->getOrganizationName(),
                    'contactFullName' => $entity->getContactFullName(),
                    'contactPhone' => $entity->getContactPhone(),
                    'contactEmail' => $entity->getContactEmail(),
                    'address' => $entity->getAddress(),
                    'city' => $entity->getCity(),
                    'state' => $entity->getState(),
                    'zipCode' => $entity->getZipCode(),
                    'totalVehicles' => $entity->getTotalVehicles() ? $entity->getTotalVehicles() : '',
                    'avgNumber' => $entity->getAvgNumber() ? $entity->getAvgNumber() : '',
                    'comments' => $entity->getComments() ? $entity->getComments() : '',
                    'scheduleMaintenance' => $scheduleMaintenance,
                    'purchaseOrderSystem' => $purchaseOrderSystem,
                    'centralizedBilling' => $centralizedBilling
                )
            );

            //set email parameters
            $message = \Swift_Message::newInstance()
                ->setSubject(EmailSubject::FLEET_SERVICE)
                ->setFrom($entity->getContactEmail())
                ->setTo($this->getToAddressFleet())
                ->setBcc($this->getBccAddress())
                ->setBody($body, 'text/html');

            //send email
            $this->mailer->send($message);
        }
        catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    //send email for Job Submission form
    public function sendJobSubmissionsEmail(JobSubmissions $entity, $emailsTo = array(),$to) {

        try {

            switch($to) {
                case 'franchise' :
                    $addressed = 'THE FOLLOWING RECIPIENT HAS APPLIED FOR A POSITION AT YOUR CENTER. PLEASE CONTACT THEM REGARDING THEIR ELIGIBILITY.';
                    break;
                case 'dma' :
                    $addressed = 'THE FOLLOWING RECIPIENT HAS APPLIED FOR A POSITION WITHIN YOUR MARKET AREA.';
                    break;
                default:
                    $addressed = 'THE FOLLOWING RECIPIENT HAS APPLIED FROM A GENERAL SUBMISSION';
            }
            //email template parameters
            $body = $this->templating->render(
                'ApplicationEmailBundle:Message:messageJobSubmissions.em.twig',
                array(
                    'addressed' => $addressed,
                    'location' => $entity->getLocation(),
                    'job' => $entity->getJobs()->getName(),
                    'phone' => $entity->getPhone(),
                    'email' => $entity->getEmail(),
                    'firstName' => $entity->getFirstName(),
                    'lastName' => $entity->getLastName(),
                    'comments' => $entity->getBody() ? $entity->getBody() : '',
                    'resume' => $entity->getResumePdf() ? $this->getCDNURL() . 'uploads/documents/' . $entity->getResumePdf() : ''
                )
            );

            $setTo = !empty($emailsTo) ? $emailsTo : $this->getToAddress();

            /*
             * As of 8/24 per $524 ticket, BCC is not needed for jobs email, for legal reasons on client
             */

            //set email parameters
            $message = \Swift_Message::newInstance()
                ->setSubject(EmailSubject::JOB_SUBMISSIONS)
                ->setFrom($entity->getEmail())
                ->setTo($setTo)
                ->setBody($body, 'text/html');

            //send email
            $this->mailer->send($message);
        }
        catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    //send email for Car Care Club form
    public function sendCarCareClubEmail(CarCareClubForm $entity, $vehicles) {

        try {

            //email template parameters
            $body = $this->templating->render(
                'ApplicationEmailBundle:Message:messageCarCareClub.em.twig',
                array(
                    'firstName' => $entity->getFirstName(),
                    'lastName' => $entity->getLastName(),
                    'email' => $entity->getEmail(),
                    'address1' => $entity->getAddress1() ? $entity->getAddress1() : '',
                    'address2' => $entity->getAddress2() ? $entity->getAddress2() : '',
                    'city' => $entity->getCity() ? $entity->getCity() : '',
                    'state' => $entity->getState() ? $entity->getState() : '',
                    'zipCode' => $entity->getZipCode() ? $entity->getZipCode() : '',
                    'phone' => $entity->getPhone() ? $entity->getPhone() : '',
                    'meinekeCustomer' => $entity->getMeinekeCustomer() ? 'Yes' : 'No',
                    'stateVisitMeineke' => $entity->getStateVisitMeineke(),
                    'vehicles' => $vehicles
                )
            );

            //set email parameters
            $message = \Swift_Message::newInstance()
                ->setSubject(EmailSubject::CAR_CARE_CLUB)
                ->setFrom($entity->getEmail())
                ->setTo($this->getToAddress())
                ->setBcc($this->getBccAddress())
                ->setBody($body, 'text/html');

            //send email
            $this->mailer->send($message);
        }
        catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    //send coupons PDF link
    public function sendCouponsPDF($params) {

        try {

            //email template parameters
            if($params['email'] && ($params['thankYou'] != 1) ) {
                $body = $this->templating->render(
                    'ApplicationEmailBundle:Message:messageCouponsEmailPDF.em.twig',
                    array(
                        'documentURL' => $this->getCDNURL() . 'uploads/documents/' . $params['document']
                    )
                );
            } elseif($params['thankYou'] == 1 ){
                $body = $this->templating->render(
                    'ApplicationEmailBundle:Message:messageThankYouCouponsEmailPDF.em.twig',
                    array(
                        'documentURL' => $this->getCDNURL() . 'uploads/documents/' . $params['document']
                    )
                );
            } else  {
                $body = $this->templating->render(
                    'ApplicationEmailBundle:Message:messageCouponsSMSPDF.em.twig',
                    array(
                        'documentURL' => StringUtility::shortenUrl($this->getCDNURL() . 'uploads/documents/' . $params['document'], $this->container)
                    )
                );
            }

            //determine to address
            if($params['email']) {
                $to = $params['email'];
            }
            else {
                $to = StringUtility::formatPhoneNumber($params['mobile'], true) . '@' . $params['carrier'];
            }

            //set email parameters
            $message = \Swift_Message::newInstance()
                ->setSubject(EmailSubject::COUPONS_PDF)
                ->setFrom($this->getFromAddress())
                ->setTo($to)
                ->setBody($body, 'text/html');

            //send email
            if($params['email']) {
                $this->get('swiftmailer.mailer.default')->send($message);
            }
            else {
                $this->get('swiftmailer.mailer.sms')->send($message);
            }
        }
        catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    //send email for Real Estate form
    public function sendRealEstateEmail(RealEstateForm $entity) {

        try {

            //email template parameters
            $body = $this->templating->render(
                'ApplicationEmailBundle:Message:messageRealEstate.em.twig',
                array(
                    'address' => $entity->getAddress(),
                    'city' => $entity->getCity(),
                    'state' => $entity->getState(),
                    'country' => $entity->getCountry(),
                    'dateAvailable' => $entity->getDateAvailable() ? $entity->getDateAvailable()->format('m/d/Y') : '',
                    'dealType' => $entity->getDealType() ? $entity->getDealType() : '',
                    'buildingSize' => $entity->getBuildingSize() ? $entity->getBuildingSize() : '',
                    'buildingDepth' => $entity->getBuildingDepth() ? $entity->getBuildingDepth() : '',
                    'salePrice' => $entity->getSalePrice() ? $entity->getSalePrice() : '',
                    'landSizeSqFt' => $entity->getLandSizeSqFt() ? $entity->getLandSizeSqFt() : '',
                    'zonedAuto' => $entity->getZonedAuto(),
                    'buildingLength' => $entity->getBuildingLength() ? $entity->getBuildingLength() : '',
                    'landSize' => $entity->getLandSize() ? $entity->getLandSize() : '',
                    'leaseRate' => $entity->getLeaseRate() ? $entity->getLeaseRate() : '',
                    'propertyTaxes' => $entity->getPropertyTaxes() ? $entity->getPropertyTaxes() : '',
                    'contactFirstName' => $entity->getContactFirstName(),
                    'contactLastName' => $entity->getContactLastName(),
                    'contactEmail' => $entity->getContactEmail(),
                    'contactAddress' => $entity->getContactAddress() ? $entity->getContactAddress() : '',
                    'contactPhone' => $entity->getContactPhone() ? $entity->getContactPhone() : '',
                    'comments' => $entity->getComments() ? $entity->getComments() : ''
                )
            );

            //set email parameters
            $message = \Swift_Message::newInstance()
                ->setSubject(EmailSubject::REAL_ESTATE)
                ->setFrom($entity->getContactEmail())
                ->setTo($this->getToAddressRealEstate())
                ->setBcc($this->getBccAddress())
                ->setBody($body, 'text/html');

            //send email
            $this->mailer->send($message);
        }
        catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    //send reward image link
    public function sendReward($params) {

        try {

            //email template parameters
            $body = $this->templating->render(
                'ApplicationEmailBundle:Message:messageReward.em.twig',
                array(
                    'imageURL' => $this->getCDNURL() . 'images/' . $params['image']
                )
            );

            //set email parameters
            $message = \Swift_Message::newInstance()
                ->setSubject(EmailSubject::REWARD)
                ->setFrom($this->getFromAddress())
                ->setTo($params['email'])
                ->setBody($body, 'text/html');

            //send email
            $this->mailer->send($message);
        }
        catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    //send pipeline stores email
    public function sendPipeline($email, Stores $store) {

        try {

            //email template parameters
            $body = $this->templating->render(
                'ApplicationEmailBundle:Message:messagePipeline.em.twig',
                array(
                    'storeURL' => $this->getFrontURL() . 'locations/' . strtolower($store->getLocationState()) . '/' . StringUtility::generateSlug($store->getLocationCity()) . '-' . $store->getStoreId()
                )
            );

            //set email parameters
            $message = \Swift_Message::newInstance()
                ->setSubject(EmailSubject::PIPELINE)
                ->setFrom($this->getFromAddress())
                ->setTo($email)
                ->setBody($body, 'text/html');

            //send email
            $this->mailer->send($message);
        }
        catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    //send closed stores email
    public function sendClosed(Stores $store) {

        try {

            //email template parameters
            $body = $this->templating->render(
                'ApplicationEmailBundle:Message:messageClosed.em.twig',
                array(
                    'storeURL' => $this->getFrontURL() . 'locations/' . strtolower($store->getLocationState()) . '/' . StringUtility::generateSlug($store->getLocationCity()) . '-' . $store->getStoreId()
                )
            );

            //set email parameters
            $message = \Swift_Message::newInstance()
                ->setSubject(EmailSubject::CLOSED)
                ->setFrom($this->getFromAddress())
                ->setTo($this->getToClosedAddress())
                ->setBody($body, 'text/html');

            //send email
            $this->mailer->send($message);
        }
        catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    //send email for Feedback form
    public function sendFeedbackEmail(Feedback $entity) {

        try {

            $entity->getFirstName() ? $firstName = $entity->getFirstName() : $firstName = '';
            $entity->getLastName() ? $lastName = $entity->getLastName() : $lastName =  '';

            //email template parameters
            $body = $this->templating->render(
                'ApplicationEmailBundle:Message:messageFeedback.em.twig',
                array(
                    'store' => $entity->getStores()->getStoreId(),
                    'email' => $entity->getEmail() ? $entity->getEmail() : '',
                    'name' => $firstName . ' ' .$lastName ,
                    'phone' => $entity->getPhone() ? $entity->getPhone() : '',
                    'rating' => $entity->getRating(),
                    'feedback' => $entity->getFeedbackText() ? $entity->getFeedbackText() : ''
                )
            );

            //set email parameters
            $message = \Swift_Message::newInstance()
                ->setSubject(EmailSubject::FEEDBACK)
                ->setFrom($entity->getEmail() ? $entity->getEmail() : $this->getFromAddress())
                ->setTo($this->getToFeedbackAddress())
                ->setBcc($this->getBccAddress())
                ->setBody($body, 'text/html');

            //send email
            $this->mailer->send($message);
        }
        catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    //send cron stores logs email
    public function sendCronStoresLogs($file) {

        try {

            //email template parameters
            $body = $this->templating->render(
                'ApplicationEmailBundle:Message:messageCron.em.twig', array()
            );

            //set email parameters
            $message = \Swift_Message::newInstance()
                ->setSubject(EmailSubject::CRON_LOGS)
                ->setFrom($this->getFromAddress())
                ->setTo($this->getToCronAddress())
                ->attach(\Swift_Attachment::fromPath($file))
                ->setBody($body, 'text/html');

            //send email
            $this->mailer->send($message);
        }
        catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }
}