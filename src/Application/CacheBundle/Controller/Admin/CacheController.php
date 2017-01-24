<?php

namespace Application\CacheBundle\Controller\Admin;

use Application\CoreBundle\Controller\Admin\AbstractAdminController;
use Application\CoreBundle\Utils\ApiResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 24.01.2017
 * Time: 22:13
 */
class CacheController extends AbstractAdminController
{
    /**
     * Invalidate cache service used to invalidate cache for a specific key.
     * This is a secured service, you must use WSSE header authentication.
     *
     * @ApiDoc(
     *     section="Cache",
     *     resource=true,
     *     description="Invalidate cache",
     *     parameters={
     *         {"name"="key", "dataType"="string", "required"=true, "description"="key for invalidate"}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         401="Returned when the user is not authorized.",
     *         404="Returned when the key doesn't exists.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     */
    public function invalidateCacheAction(Request $request) {

        try {

            //check permissions
            $user = $this->getAuthenticatedAdmin();

            if(!$user->hasRole("ROLE_ADMIN") && !$user->isSuperAdmin())
                return ApiResponse::setResponse('User not authorized.', Response::HTTP_UNAUTHORIZED);


            return ApiResponse::setResponse('Cache key not found.', Response::HTTP_NOT_FOUND);
        }
        catch(\Exception $e) {

            return ApiResponse::setResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    /**
     * Invalidate cache service used to invalidate cache for a specific key.
     * This is a secured service, you must use WSSE header authentication.
     *
     * @ApiDoc(
     *     section="Cache",
     *     resource=true,
     *     description="Invalidate cache",
     *     parameters={
     *         {"name"="key", "dataType"="string", "required"=true, "description"="key for invalidate"}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         401="Returned when the user is not authorized.",
     *         404="Returned when the key doesn't exists.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     */
    public function invalidateTagsAction(Request $request) {

        try {

            //check permissions
            $user = $this->getAuthenticatedAdmin();
            if(!$user->hasRole("ROLE_ADMIN") && !$user->isSuperAdmin())
                return ApiResponse::setResponse('User not authorized.', Response::HTTP_UNAUTHORIZED);

            //validate request parameters
            $validationResult = $this->validate($request, 'cache');
            if(!$validationResult->isSuccess)
                return ApiResponse::setResponse($validationResult->errorMessage, Response::HTTP_BAD_REQUEST);



            return ApiResponse::setResponse('Cache key not found.', Response::HTTP_NOT_FOUND);
        }
        catch(\Exception $e) {

            return ApiResponse::setResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}