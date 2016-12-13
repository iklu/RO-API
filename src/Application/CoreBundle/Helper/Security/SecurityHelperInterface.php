<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace Application\CoreBundle\Helper\Security;

use Application\AdminBundle\Model\UserInterface;
use Application\CustomerBundle\Model\CustomerInterface;
use Symfony\Component\HttpFoundation\Request;


/**
 * Interface TranslatorHelperInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface SecurityHelperInterface
{
    public function getCurrentUser();

    public function getCurrentClient();

    public function getCurrentAdmin();

    public function getAuthenticatedCustomer() : CustomerInterface;

    public function getAuthenticatedAdmin() : UserInterface;

    public function isActiveFirewall(string $name) : bool;

    public function isActiveAdminFirewall() : bool;
    
    public function getFirewallNameForRequest(Request $request);

    public function generateRandomPassword(int $length = 8) : string;
}
