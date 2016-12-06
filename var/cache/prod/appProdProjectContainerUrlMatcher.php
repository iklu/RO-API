<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // api_entrypoint
        if (preg_match('#^/(?P<index>index)?(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_entrypoint')), array (  '_controller' => 'api_platform.action.entrypoint',  '_format' => '',  '_api_respond' => '1',  'index' => 'index',));
        }

        // api_doc
        if (0 === strpos($pathinfo, '/docs') && preg_match('#^/docs(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_doc')), array (  '_controller' => 'api_platform.action.documentation',  '_api_respond' => '1',  '_format' => '',));
        }

        // api_jsonld_context
        if (0 === strpos($pathinfo, '/contexts') && preg_match('#^/contexts/(?P<shortName>.+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_jsonld_context')), array (  '_controller' => 'api_platform.jsonld.action.context',  '_api_respond' => '1',  '_format' => 'jsonld',));
        }

        if (0 === strpos($pathinfo, '/api')) {
            if (0 === strpos($pathinfo, '/api/user')) {
                // get_user
                if (preg_match('#^/api/user/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_get_user;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'get_user');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'get_user')), array (  '_controller' => 'Application\\AdminBundle\\Controller\\UserController::getUserAction',  '_api_resource_class' => 'Application\\AdminBundle\\Entity\\User',  '_api_item_operation_name' => 'getUser',));
                }
                not_get_user:

                // update_user
                if (preg_match('#^/api/user/(?P<id>[^/]++)/$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_update_user;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_user')), array (  '_controller' => 'Application\\AdminBundle\\Controller\\UserController::updateUserAction',  '_api_resource_class' => 'Application\\AdminBundle\\Entity\\User',  '_api_item_operation_name' => 'updateUser',));
                }
                not_update_user:

                if (0 === strpos($pathinfo, '/api/users')) {
                    // add_user
                    if ($pathinfo === '/api/users/') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_add_user;
                        }

                        return array (  '_controller' => 'Application\\AdminBundle\\Controller\\UserController::addUserAction',  '_api_resource_class' => 'Application\\AdminBundle\\Entity\\User',  '_api_collection_operation_name' => 'addUser',  '_route' => 'add_user',);
                    }
                    not_add_user:

                    // get_users
                    if (rtrim($pathinfo, '/') === '/api/users') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_get_users;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'get_users');
                        }

                        return array (  '_controller' => 'Application\\AdminBundle\\Controller\\UserController::getUsersAction',  '_api_resource_class' => 'Application\\AdminBundle\\Entity\\User',  '_api_collection_operation_name' => 'getUsers',  '_route' => 'get_users',);
                    }
                    not_get_users:

                }

            }

            // login_action
            if ($pathinfo === '/api/account/login/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_login_action;
                }

                return array (  '_controller' => 'Application\\AdminBundle\\Controller\\SecurityController::loginAction',  '_api_resource_class' => 'Application\\AdminBundle\\Entity\\User',  '_api_collection_operation_name' => 'addUser',  '_route' => 'login_action',);
            }
            not_login_action:

            // get_profile_action
            if (0 === strpos($pathinfo, '/api/secured/account/profile') && preg_match('#^/api/secured/account/profile/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_get_profile_action;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'get_profile_action');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'get_profile_action')), array (  '_controller' => 'Application\\AdminBundle\\Controller\\SecurityController::getProfileAction',  '_api_resource_class' => 'Application\\AdminBundle\\Entity\\User',  '_api_collection_operation_name' => 'addUser',));
            }
            not_get_profile_action:

            // application_core_homepage
            if (rtrim($pathinfo, '/') === '/api') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'application_core_homepage');
                }

                return array (  '_controller' => 'Application\\CoreBundle\\Controller\\DefaultController::indexAction',  '_route' => 'application_core_homepage',);
            }

            // nelmio_api_doc_index
            if (0 === strpos($pathinfo, '/api/doc') && preg_match('#^/api/doc(?:/(?P<view>[^/]++))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_nelmio_api_doc_index;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'nelmio_api_doc_index')), array (  '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',  'view' => 'default',));
            }
            not_nelmio_api_doc_index:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
