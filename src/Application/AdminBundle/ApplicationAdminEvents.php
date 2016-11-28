<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 28.11.2016
 * Time: 12:03
 */

namespace Application\AdminBundle;


class ApplicationAdminEvents
{
    /**
     * The CHANGE_PASSWORD_INITIALIZE event occurs when the change password process is initialized.
     *
     * This event allows you to modify the default values of the user before binding the form.
     *
     * @Event("Application\AdminBundle\Event\GetResponseUserEvent")
     */
    const CHANGE_PASSWORD_INITIALIZE = 'admin_user.change_password.edit.initialize';

    /**
     * The CHANGE_PASSWORD_SUCCESS event occurs when the change password form is submitted successfully.
     *
     * This event allows you to set the response instead of using the default one.
     *
     * @Event("Application\AdminBundle\Event\FormEvent")
     */
    const CHANGE_PASSWORD_SUCCESS = 'admin_user.change_password.edit.success';

    /**
     * The CHANGE_PASSWORD_COMPLETED event occurs after saving the user in the change password process.
     *
     * This event allows you to access the response which will be sent.
     *
     * @Event("Application\AdminBundle\Event\FilterUserResponseEvent")
     */
    const CHANGE_PASSWORD_COMPLETED = 'admin_user.change_password.edit.completed';

    /**
     * The GROUP_CREATE_INITIALIZE event occurs when the group creation process is initialized.
     *
     * This event allows you to modify the default values of the user before binding the form.
     *
     * @Event("Application\AdminBundle\Event\GroupEvent")
     */
    const GROUP_CREATE_INITIALIZE = 'admin_user.group.create.initialize';

    /**
     * The GROUP_CREATE_SUCCESS event occurs when the group creation form is submitted successfully.
     *
     * This event allows you to set the response instead of using the default one.
     *
     * @Event("Application\AdminBundle\Event\FormEvent")
     */
    const GROUP_CREATE_SUCCESS = 'admin_user.group.create.success';

    /**
     * The GROUP_CREATE_COMPLETED event occurs after saving the group in the group creation process.
     *
     * This event allows you to access the response which will be sent.
     *
     * @Event("Application\AdminBundle\Event\FilterGroupResponseEvent")
     */
    const GROUP_CREATE_COMPLETED = 'admin_user.group.create.completed';

    /**
     * The GROUP_DELETE_COMPLETED event occurs after deleting the group.
     *
     * This event allows you to access the response which will be sent.
     *
     * @Event("Application\AdminBundle\Event\FilterGroupResponseEvent")
     */
    const GROUP_DELETE_COMPLETED = 'admin_user.group.delete.completed';

    /**
     * The GROUP_EDIT_INITIALIZE event occurs when the group editing process is initialized.
     *
     * This event allows you to modify the default values of the user before binding the form.
     *
     * @Event("Application\AdminBundle\Event\GetResponseGroupEvent")
     */
    const GROUP_EDIT_INITIALIZE = 'admin_user.group.edit.initialize';

    /**
     * The GROUP_EDIT_SUCCESS event occurs when the group edit form is submitted successfully.
     *
     * This event allows you to set the response instead of using the default one.
     *
     * @Event("Application\AdminBundle\Event\FormEvent")
     */
    const GROUP_EDIT_SUCCESS = 'admin_user.group.edit.success';

    /**
     * The GROUP_EDIT_COMPLETED event occurs after saving the group in the group edit process.
     *
     * This event allows you to access the response which will be sent.
     *
     * @Event("Application\AdminBundle\Event\FilterGroupResponseEvent")
     */
    const GROUP_EDIT_COMPLETED = 'admin_user.group.edit.completed';

    /**
     * The PROFILE_EDIT_INITIALIZE event occurs when the profile editing process is initialized.
     *
     * This event allows you to modify the default values of the user before binding the form.
     *
     * @Event("Application\AdminBundle\Event\GetResponseUserEvent")
     */
    const PROFILE_EDIT_INITIALIZE = 'admin_user.profile.edit.initialize';

    /**
     * The PROFILE_EDIT_SUCCESS event occurs when the profile edit form is submitted successfully.
     *
     * This event allows you to set the response instead of using the default one.
     *
     * @Event("Application\AdminBundle\Event\FormEvent")
     */
    const PROFILE_EDIT_SUCCESS = 'admin_user.profile.edit.success';

    /**
     * The PROFILE_EDIT_COMPLETED event occurs after saving the user in the profile edit process.
     *
     * This event allows you to access the response which will be sent.
     *
     * @Event("Application\AdminBundle\Event\FilterUserResponseEvent")
     */
    const PROFILE_EDIT_COMPLETED = 'admin_user.profile.edit.completed';

    /**
     * The REGISTRATION_INITIALIZE event occurs when the registration process is initialized.
     *
     * This event allows you to modify the default values of the user before binding the form.
     *
     * @Event("Application\AdminBundle\Event\UserEvent")
     */
    const REGISTRATION_INITIALIZE = 'admin_user.registration.initialize';

    /**
     * The REGISTRATION_SUCCESS event occurs when the registration form is submitted successfully.
     *
     * This event allows you to set the response instead of using the default one.
     *
     * @Event("Application\AdminBundle\Event\FormEvent")
     */
    const REGISTRATION_SUCCESS = 'admin_user.registration.success';

    /**
     * The REGISTRATION_FAILURE event occurs when the registration form is not valid.
     *
     * This event allows you to set the response instead of using the default one.
     * The event listener method receives a Application\AdminBundle\Event\FormEvent instance.
     *
     * @Event("Application\AdminBundle\Event\FormEvent")
     */
    const REGISTRATION_FAILURE = 'admin_user.registration.failure';

    /**
     * The REGISTRATION_COMPLETED event occurs after saving the user in the registration process.
     *
     * This event allows you to access the response which will be sent.
     *
     * @Event("Application\AdminBundle\Event\FilterUserResponseEvent")
     */
    const REGISTRATION_COMPLETED = 'admin_user.registration.completed';

    /**
     * The REGISTRATION_CONFIRM event occurs just before confirming the account.
     *
     * This event allows you to access the user which will be confirmed.
     *
     * @Event("Application\AdminBundle\Event\GetResponseUserEvent")
     */
    const REGISTRATION_CONFIRM = 'admin_user.registration.confirm';

    /**
     * The REGISTRATION_CONFIRMED event occurs after confirming the account.
     *
     * This event allows you to access the response which will be sent.
     *
     * @Event("Application\AdminBundle\Event\FilterUserResponseEvent")
     */
    const REGISTRATION_CONFIRMED = 'admin_user.registration.confirmed';

    /**
     * The RESETTING_RESET_REQUEST event occurs when a user requests a password reset of the account.
     *
     * This event allows you to check if a user is locked out before requesting a password.
     * The event listener method receives a Application\AdminBundle\Event\GetResponseUserEvent instance.
     *
     * @Event("Application\AdminBundle\Event\GetResponseUserEvent")
     */
    const RESETTING_RESET_REQUEST = 'admin_user.resetting.reset.request';

    /**
     * The RESETTING_RESET_INITIALIZE event occurs when the resetting process is initialized.
     *
     * This event allows you to set the response to bypass the processing.
     *
     * @Event("Application\AdminBundle\Event\GetResponseUserEvent")
     */
    const RESETTING_RESET_INITIALIZE = 'admin_user.resetting.reset.initialize';

    /**
     * The RESETTING_RESET_SUCCESS event occurs when the resetting form is submitted successfully.
     *
     * This event allows you to set the response instead of using the default one.
     *
     * @Event("Application\AdminBundle\Event\FormEvent ")
     */
    const RESETTING_RESET_SUCCESS = 'admin_user.resetting.reset.success';

    /**
     * The RESETTING_RESET_COMPLETED event occurs after saving the user in the resetting process.
     *
     * This event allows you to access the response which will be sent.
     *
     * @Event("Application\AdminBundle\Event\FilterUserResponseEvent")
     */
    const RESETTING_RESET_COMPLETED = 'admin_user.resetting.reset.completed';

    /**
     * The SECURITY_IMPLICIT_LOGIN event occurs when the user is logged in programmatically.
     *
     * This event allows you to access the response which will be sent.
     *
     * @Event("Application\AdminBundle\Event\UserEvent")
     */
    const SECURITY_IMPLICIT_LOGIN = 'admin_user.security.implicit_login';

    /**
     * The RESETTING_SEND_EMAIL_INITIALIZE event occurs when the send email process is initialized.
     *
     * This event allows you to set the response to bypass the email confirmation processing.
     * The event listener method receives a Application\AdminBundle\Event\GetResponseNullableUserEvent instance.
     *
     * @Event("Application\AdminBundle\Event\GetResponseNullableUserEvent")
     */
    const RESETTING_SEND_EMAIL_INITIALIZE = 'admin_user.resetting.send_email.initialize';

    /**
     * The RESETTING_SEND_EMAIL_CONFIRM event occurs when all prerequisites to send email are
     * confirmed and before the mail is sent.
     *
     * This event allows you to set the response to bypass the email sending.
     * The event listener method receives a Application\AdminBundle\Event\GetResponseUserEvent instance.
     *
     * @Event("Application\AdminBundle\Event\GetResponseUserEvent")
     */
    const RESETTING_SEND_EMAIL_CONFIRM = 'admin_user.resetting.send_email.confirm';

    /**
     * The RESETTING_SEND_EMAIL_COMPLETED event occurs after the email is sent.
     *
     * This event allows you to set the response to bypass the the redirection after the email is sent.
     * The event listener method receives a Application\AdminBundle\Event\GetResponseUserEvent instance.
     *
     * @Event("Application\AdminBundle\Event\GetResponseUserEvent")
     */
    const RESETTING_SEND_EMAIL_COMPLETED = 'admin_user.resetting.send_email.completed';

    /**
     * The USER_CREATED event occurs when the user is created with UserManipulator.
     *
     * This event allows you to access the created user and to add some behaviour after the creation.
     *
     * @Event("Application\AdminBundle\Event\UserEvent")
     */
    const USER_CREATED = 'admin_user.user.created';

    /**
     * The USER_PASSWORD_CHANGED event occurs when the user is created with UserManipulator.
     *
     * This event allows you to access the created user and to add some behaviour after the password change.
     *
     * @Event("Application\AdminBundle\Event\UserEvent")
     */
    const USER_PASSWORD_CHANGED = 'admin_user.user.password_changed';

    /**
     * The USER_ACTIVATED event occurs when the user is created with UserManipulator.
     *
     * This event allows you to access the activated user and to add some behaviour after the activation.
     *
     * @Event("Application\AdminBundle\Event\UserEvent")
     */
    const USER_ACTIVATED = 'admin_user.user.activated';

    /**
     * The USER_DEACTIVATED event occurs when the user is created with UserManipulator.
     *
     * This event allows you to access the deactivated user and to add some behaviour after the deactivation.
     *
     * @Event("Application\AdminBundle\Event\UserEvent")
     */
    const USER_DEACTIVATED = 'admin_user.user.deactivated';

    /**
     * The USER_PROMOTED event occurs when the user is created with UserManipulator.
     *
     * This event allows you to access the promoted user and to add some behaviour after the promotion.
     *
     * @Event("Application\AdminBundle\Event\UserEvent")
     */
    const USER_PROMOTED = 'admin_user.user.promoted';

    /**
     * The USER_DEMOTED event occurs when the user is created with UserManipulator.
     *
     * This event allows you to access the demoted user and to add some behaviour after the demotion.
     *
     * @Event("Application\AdminBundle\Event\UserEvent")
     */
    const USER_DEMOTED = 'admin_user.user.demoted';
}