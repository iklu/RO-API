<?php

namespace Application\EmailBundle\Controller\Admin;

use Application\CoreBundle\Controller\Admin\AbstractAdminController;

/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 24.01.2017
 * Time: 23:48
 */
class SpoolController extends AbstractAdminController
{
    /**
     * Send messages from database spool.
     *
     * @ApiDoc(
     *     section="Spool",
     *     resource=true,
     *     description="Send messages from spool",
     *     filters={
     *         {"name"="limit", "dataType"="integer", "default"="10"},
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     * @Get("/spool/send/")
     *
     */
    public function sendSpoolAction(Request $request)
    {
        $spoolService = $this->get('meineke.spool_emails');
        $emails = $spoolService->spool($request->get('limit'));

        if(!$emails->getSuccess())
            return ApiResponse::setResponse($emails->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);

        return ApiResponse::setResponse($emails->getMessage());
    }

    /**
     * List all email entities.
     *
     * @ApiDoc(
     *     section="Spool",
     *     resource=true,
     *     description="Get all spool emails",
     *     filters={
     *         {"name"="limit", "dataType"="integer", "default"="10"},
     *         {"name"="page", "dataType"="integer", "default"="1"},
     *         {"name"="noRecords", "dataType"="integer", "default"="10"},
     *         {"name"="sortField", "dataType"="string", "pattern"="id|toEmail|fromEmail|subject", "default"="id"},
     *         {"name"="sortType", "dataType"="string", "pattern"="ASC|DESC", "default"="DESC"},
     *         {"name"="status", "dataType"="string", "pattern"="READY|COMPLETE|FAILED", "default"=""}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     * @Get("/spool/")
     *
     */
    public function spoolEmailsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        try {

            //set pagination and sorting
            $this->setListingConfigurations($request, $page, $noRecords, $sortField, $sortType);

            //set status
            $status = trim($request->get('status')) ? trim($request->get('status')) : '';
            $entities = $em->getRepository('AcmeDataBundle:Spool')->getSpoolEmails($page, $noRecords, $sortField, $sortType, $status);

            return ApiResponse::setResponse($entities);
        } catch (\Exception $e)  {
            return ApiResponse::setResponse($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Edit spool status and retries sending email
     *
     * @ApiDoc(
     *     section="Spool",
     *     resource=true,
     *     description="Retry send email",
     *     requirements={
     *         {"name"="id", "dataType"="integer", "required"=true, "description"="spool id"}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         401="Returned when the user is not authorized.",
     *         404="Returned when the coupon is not found.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     * @Put("/spool/retry/{id}")
     *
     */
    public function retryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        try {

            $entity = $em->getRepository('CitraxDatabaseSwiftMailerBundle:Email')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Email entity.');
            }

            $entity->setStatus(Email::STATUS_FAILED);
            $entity->setRetries(0);

            $em->persist($entity);
            $em->flush();

            return ApiResponse::setResponse('Spool email successfully updated.');
        } catch (\Exception $e)  {
            return ApiResponse::setResponse($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Edit spool status and resend email
     *
     * @ApiDoc(
     *     section="Spool",
     *     resource=true,
     *     description="Resend email",
     *     requirements={
     *         {"name"="id", "dataType"="integer", "required"=true, "description"="spool id"}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         401="Returned when the user is not authorized.",
     *         404="Returned when the coupon is not found.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     * @Put("/spool/resend/{id}")
     *
     */
    public function resendAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        try {

            $entity = $em->getRepository('CitraxDatabaseSwiftMailerBundle:Email')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Email entity.');
            }

            $entity->setStatus(Email::STATUS_READY);
            $entity->setRetries(0);

            $em->persist($entity);
            $em->flush();

            return ApiResponse::setResponse('Spool email successfully updated.');
        } catch (\Exception $e)  {
            return ApiResponse::setResponse($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Edit spool and cancel email sending
     *
     * @ApiDoc(
     *     section="Spool",
     *     resource=true,
     *     description="Cancel email",
     *     requirements={
     *         {"name"="id", "dataType"="integer", "required"=true, "description"="spool id"}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         401="Returned when the user is not authorized.",
     *         404="Returned when the coupon is not found.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     * @Put("/spool/cancel/{id}")
     *
     */
    public function cancelAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        try {

            $entity = $em->getRepository('CitraxDatabaseSwiftMailerBundle:Email')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Email entity.');
            }

            $entity->setStatus(Email::STATUS_CANCELLED);

            $em->persist($entity);
            $em->flush();

            return ApiResponse::setResponse('Spool email successfully updated.');
        } catch (\Exception $e)  {
            return ApiResponse::setResponse($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Delete spool email
     *
     * @ApiDoc(
     *     section="Spool",
     *     resource=true,
     *     description="Delete email",
     *     requirements={
     *         {"name"="id", "dataType"="integer", "required"=true, "description"="spool id"}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         401="Returned when the user is not authorized.",
     *         404="Returned when the coupon is not found.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     * @Delete("/spool/delete/{id}")
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        try {

            $entity = $em->getRepository('CitraxDatabaseSwiftMailerBundle:Email')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Email entity.');
            }

            $em->remove($entity);
            $em->flush();

            return ApiResponse::setResponse('Spool email successfully updated.');
        } catch (\Exception $e)  {
            return ApiResponse::setResponse($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}