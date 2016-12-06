<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdProjectContainerUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = array(
        'api_entrypoint' => array (  0 =>   array (    0 => 'index',    1 => '_format',  ),  1 =>   array (    '_controller' => 'api_platform.action.entrypoint',    '_format' => '',    '_api_respond' => '1',    'index' => 'index',  ),  2 =>   array (    'index' => 'index',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^/]++',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => 'index',      3 => 'index',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_doc' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'api_platform.action.documentation',    '_api_respond' => '1',    '_format' => '',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^/]++',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/docs',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_jsonld_context' => array (  0 =>   array (    0 => 'shortName',    1 => '_format',  ),  1 =>   array (    '_controller' => 'api_platform.jsonld.action.context',    '_api_respond' => '1',    '_format' => 'jsonld',  ),  2 =>   array (    'shortName' => '.+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^/]++',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '.+',      3 => 'shortName',    ),    2 =>     array (      0 => 'text',      1 => '/contexts',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'get_user' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Application\\AdminBundle\\Controller\\UserController::getUserAction',    '_api_resource_class' => 'Application\\AdminBundle\\Entity\\User',    '_api_item_operation_name' => 'getUser',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/api/user',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'update_user' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Application\\AdminBundle\\Controller\\UserController::updateUserAction',    '_api_resource_class' => 'Application\\AdminBundle\\Entity\\User',    '_api_item_operation_name' => 'updateUser',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/api/user',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'add_user' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Application\\AdminBundle\\Controller\\UserController::addUserAction',    '_api_resource_class' => 'Application\\AdminBundle\\Entity\\User',    '_api_collection_operation_name' => 'addUser',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/users/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'get_users' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Application\\AdminBundle\\Controller\\UserController::getUsersAction',    '_api_resource_class' => 'Application\\AdminBundle\\Entity\\User',    '_api_collection_operation_name' => 'getUsers',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/users/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'login_action' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Application\\AdminBundle\\Controller\\SecurityController::loginAction',    '_api_resource_class' => 'Application\\AdminBundle\\Entity\\User',    '_api_collection_operation_name' => 'addUser',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/account/login/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'get_profile_action' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Application\\AdminBundle\\Controller\\SecurityController::getProfileAction',    '_api_resource_class' => 'Application\\AdminBundle\\Entity\\User',    '_api_collection_operation_name' => 'addUser',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/api/secured/account/profile',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'application_core_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Application\\CoreBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'nelmio_api_doc_index' => array (  0 =>   array (    0 => 'view',  ),  1 =>   array (    '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',    'view' => 'default',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'view',    ),    1 =>     array (      0 => 'text',      1 => '/api/doc',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );
        }
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
