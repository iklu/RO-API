<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 30.03.2016
 * Time: 15:10
 */

namespace Application\EmailBundle\Services;

use Application\CoreBundle\Utils\Notification;
use Interop\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\StreamOutput;
use Symfony\Component\Console\Input\StringInput;


/**
 * Service made to send emails from spool (db)
 *
 * Class Spool
 * @package Acme\DataBundle\Model\Utility
 */
class Spool
{
    /**
     * @var ContainerInterfaces
     */
    protected $container;

    /**
     * @var
     */
    protected $notification;

    public function __construct(ContainerInterface $container = null) {
        $this->container = $container;
    }

    /**
     * @param $limit
     * @return Notification
     */
    public function spool($limit){
        try {

            $kernel = $this->container->get('kernel');
            $app = new Application($kernel);

            $input = new StringInput('swiftmailer:spool:send --message-limit='.$limit);
            $output = new StreamOutput(fopen('php://temp', 'w'));

            $app->doRun($input, $output);

            rewind($output->getStream());
            $response =  stream_get_contents($output->getStream());

            return $this->notification =  new Notification(true, $response);

        } catch (\Exception $e) {
            return $this->notification =  new Notification(false , $e->getMessage());
        }
    }
}