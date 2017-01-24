<?php
namespace Application\CoreBundle\Utils;
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 22.12.2015
 * Time: 15:19
 */
class Notification
{
    /**
     * @var string
     */
    private $notification;

    /**
     *  @var bool
     */
    private $success;

    public function __construct($success=true, $notification='') {
        $this->notification = $notification;
        $this->success = $success;
    }

    public function getMessage() {
        return $this->notification;
    }

    public function getSuccess() {
        return $this->success;
    }
}