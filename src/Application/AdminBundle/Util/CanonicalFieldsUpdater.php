<?php

namespace Application\AdminBundle\Util;
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 08.12.2016
 * Time: 10:46
 */

use Application\AdminBundle\Model\UserInterface;

class CanonicalFieldsUpdater
{
    private $usernameCanonicalizer;
    private $emailCanonicalizer;
    public function __construct(CanonicalizerInterface $usernameCanonicalizer, CanonicalizerInterface $emailCanonicalizer)
    {
        $this->usernameCanonicalizer = $usernameCanonicalizer;
        $this->emailCanonicalizer = $emailCanonicalizer;
    }
    public function updateCanonicalFields(UserInterface $user)
    {
        $user->setUsernameCanonical($this->canonicalizeUsername($user->getUsername()));
        $user->setEmailCanonical($this->canonicalizeEmail($user->getEmail()));
    }
    /**
     * Canonicalizes an email.
     *
     * @param string|null $email
     *
     * @return string|null
     */
    public function canonicalizeEmail($email)
    {
        return $this->emailCanonicalizer->canonicalize($email);
    }
    /**
     * Canonicalizes a username.
     *
     * @param string|null $username
     *
     * @return string|null
     */
    public function canonicalizeUsername($username)
    {
        return $this->usernameCanonicalizer->canonicalize($username);
    }
}