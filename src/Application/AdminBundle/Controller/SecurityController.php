<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 28.11.2016
 * Time: 10:48
 */

namespace Application\AdminBundle\Controller;

use Application\AdminBundle\Entity\User;
use Application\CoreBundle\Utils\ApiResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller
{
    /**
     * Get profile service used to get full profile info.
     *
     * @ApiDoc(
     *     section="Security",
     *     resource=true,
     *     description="Login action",
     *     parameters={
     *         {"name"="username", "dataType"="string", "required"=true, "description"="Username"},
     *         {"name"="password", "dataType"="string", "required"=true, "description"="Password"}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         401="Returned when the user is not authorized.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     *
     */
    public function loginAction(Request $request)
    {
        //$user = $this->get('security.token_storage')->getToken()->getUser();

        $validator = $this->container->get("application_admin.login.validate");

        $user = new User();
        $user->setUsername($request->get("username"));
        $user->setPlainPassword($request->get("password"));

        $validate = $validator->validate($user);

        $loginData = $this->get('application_admin.login')->initiate($request);

        if ($validate != null) {
            return ApiResponse::setResponse($validate, 400);
        }

        return ApiResponse::setResponse($loginData["message"], $loginData["status"]);
    }

    /**
     * Get profile service used to get full profile info.
     *
     * @ApiDoc(
     *     section="Security",
     *     resource=true,
     *     description="Get profile",
     *     requirements={
     *         {"name"="id", "dataType"="integer", "required"=true, "description"="user id"},
     *         {"name"="mobile", "dataType"="integer", "required"=false, "description"="is mobile"}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         401="Returned when the user is not authorized.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     */
    public function getProfileAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        //check permissions
        $user = $this->getAuthUser();
        if ($user->getId() != $id)
            return ApiResponse::setResponse('User not authorized.', Codes::HTTP_UNAUTHORIZED);

        try {

            //initiate clutch service
            $clutch = $this->get("meineke.clutch_service");

            //get user by id
            $entity = $em->getRepository('AcmeDataBundle:Users')->findOneById($id);

            //check if user has card number and  get clutch customer data
            if (!$entity->getCardNumber()) {
                $customerData = $clutch->getCustomerInfo($entity->getEmail(), $entity->getPhone());
            } else {
                $customerData = $clutch->getCustomerInfo($entity->getEmail(), $entity->getPhone(), $entity->getCardNumber());
            }

            //harcoded vehicles TODO
            /*$vehicles = array();
            $vehicleIds = array('VECH20001', 'VECH20002');
            for($i=0;$i<count($vehicleIds);$i++) {
              $vehicleInfo = $clutch->getVehicleInfo( $vehicleIds[$i]);
              if(!empty($vehicleInfo['brandDemographics'])) {
                $vehicles[$i]['make'] = $vehicleInfo['brandDemographics']['vehicle1make'];
                $vehicles[$i]['year'] = $vehicleInfo['brandDemographics']['vehicle1year'];
                $vehicles[$i]['model'] = $vehicleInfo['brandDemographics']['vehicle1model'];
                $vehicles[$i]['vin'] = $vehicleInfo['brandDemographics']['vehicle1vin'];
                $vehicles[$i]['tag'] = $vehicleInfo['brandDemographics']['vehicle1tag'];
              }
            }*/

            $historyTransactions = array();
            $serviceReminders = array();
            $skusForReminders1 = array('110-000', '110-228', '110-228P', '110-228S', '110-229', '110-229S', '110-229P', '110-305', '110-305P', '110-305S', '110-331', '110-331S', '110-331P', '110-332', '110-332S', '110-332P', '110-333', '110-333S', '110-333P');
            $skusForReminders2 = array('114-000', '114-247', '114-248');
            $index = 0;
            if (!empty($customerData)) {
                //update data in DB
                $entity->setCardNumber($customerData['cardNumber']);
                $entity->setCustomCardNumber($customerData['customCardNumber']);
                $entity->setLoyaltyPointsBalance($customerData['balance']);

                $em->flush();

                //get clutch vehicles information
                $vehicles = array();
                $historyTransactionVehicle = array();
                if (!empty($customerData['brandDemographics'])) {
                    if (array_key_exists('vehicleIds', $customerData['brandDemographics'])) {
                        $vehicleIds = explode(",", $customerData['brandDemographics']['vehicleIds']);
                        for ($i = 0; $i < count($vehicleIds); $i++) {
                            $vehicleInfo = $clutch->getVehicleInfo('veh_' . trim($vehicleIds[$i]));
                            //vehicle information
                            if (!empty($vehicleInfo['brandDemographics'])) {
                                $vehicles[$i]['vehicleId'] = 'veh_' . $vehicleIds[$i];
                                $vehicles[$i]['vinliDeviceId'] = isset($vehicleInfo['brandDemographics']['vinliDeviceId']) ? $vehicleInfo['brandDemographics']['vinliDeviceId'] : '';
                                $vehicles[$i]['make'] = isset($vehicleInfo['brandDemographics']['vehicle1make']) ? $vehicleInfo['brandDemographics']['vehicle1make'] : '';
                                $vehicles[$i]['year'] = isset($vehicleInfo['brandDemographics']['vehicle1year']) ? $vehicleInfo['brandDemographics']['vehicle1year'] : '';
                                $vehicles[$i]['model'] = isset($vehicleInfo['brandDemographics']['vehicle1model']) ? $vehicleInfo['brandDemographics']['vehicle1model'] : '';
                                $vehicles[$i]['vin'] = isset($vehicleInfo['brandDemographics']['vehicle1vin']) ? $vehicleInfo['brandDemographics']['vehicle1vin'] : '';
                                $vehicles[$i]['tag'] = isset($vehicleInfo['brandDemographics']['vehicle1tag']) ? $vehicleInfo['brandDemographics']['vehicle1tag'] : '';
                                $vehicles[$i]['image'] = isset($vehicleInfo['brandDemographics']['image']) ? $vehicleInfo['brandDemographics']['image'] : '';
                                $vehicles[$i]['vehicleNickname'] = isset($vehicleInfo['brandDemographics']['vehicleNickname']) ? $vehicleInfo['brandDemographics']['vehicleNickname'] : '';
                                $vehicles[$i]['shortNote'] = isset($vehicleInfo['brandDemographics']['shortNote']) ? $vehicleInfo['brandDemographics']['shortNote'] : '';
                            }

                            //get history transaction for every vehicle
                            $historyTransactionVehicle[$i]['vehicle'] = $vehicles[$i]['make'] . ' ' . $vehicles[$i]['model'];
                            $historyTransactionVehicle[$i]['transactions'] = $clutch->getHistoryTransaction('veh_' . $vehicleIds[$i], '');

                            //service reminders
                            if (!empty($vehicleInfo['mailings'])) {
                                for ($sr = 0; $sr < count($vehicleInfo['mailings']); $sr++) {
                                    $serviceReminders[$historyTransactionVehicle[$i]['vehicle']][] = $vehicleInfo['mailings'][$sr]['mailingListId'];
                                }
                            }
                        }
                    }

                    for ($i = 0; $i < count($historyTransactionVehicle); $i++) {

                        for ($j = 0; $j < count($historyTransactionVehicle[$i]['transactions']); $j++) {
                            if (isset($historyTransactionVehicle[$i]['transactions'][$j]['callType']) && $historyTransactionVehicle[$i]['transactions'][$j]['callType'] == "CHECKOUT_COMPLETE") {
                                $transactionTime = date("m/d/y", intval($historyTransactionVehicle[$i]['transactions'][$j]['transactionTime'] / 1000));
                                //get transaction details

                                $transactionDetails = $clutch->getTransactionDetails($historyTransactionVehicle[$i]['transactions'][$j]['transactionId']);

                                if ($transactionDetails) {
                                    for ($k = 0; $k < count($transactionDetails); $k++) {
                                        preg_match_all('~\b(memo|disc|discount)\b~i', strtolower($transactionDetails[$k]['sku']), $matches);
                                        if (!$matches[0]) {
                                            $historyTransactions[$historyTransactionVehicle[$i]['vehicle']][$index]['transactionTime'] = $transactionTime;
                                            $historyTransactions[$historyTransactionVehicle[$i]['vehicle']][$index]['amount'] = $transactionDetails[$k]['amount'];
                                            $historyTransactions[$historyTransactionVehicle[$i]['vehicle']][$index]['store'] = array();

                                            if ($transactionDetails[$k]['locationId']) {
                                                //get location info
                                                $locationInfo = $em->getRepository('AcmeDataBundle:Stores')->findOneByStoreId(str_replace("MK", "", $transactionDetails[$k]['locationId']));
                                                if (is_object($locationInfo)) {
                                                    $historyTransactions[$historyTransactionVehicle[$i]['vehicle']][$index]['store'] = array(
                                                        'storeId' => $locationInfo->getStoreId(),
                                                        'city' => $locationInfo->getLocationCity(),
                                                        'state' => $locationInfo->getLocationState(),
                                                        'phone' => $locationInfo->getPhone(),
                                                        'semCamPhone' => $locationInfo->getSemCamPhone()
                                                    );
                                                }
                                            }
                                            if ($transactionDetails[$k]['sku'] !== "0-0, MEMO" && $transactionDetails[$k]['sku'] !== "0-0, Discount") {

                                                //check if sku is one of those for service reminders
                                                foreach ($serviceReminders AS $srcar => $reminders) {
                                                    if ($historyTransactionVehicle[$i]['vehicle'] == $srcar) {
                                                        for ($rm = 0; $rm < count($reminders); $rm++) {
                                                            switch ($reminders[$rm]) {
                                                                case 'Meineke06':
                                                                case 'Meineke07':
                                                                case 'Meineke19':
                                                                    if (in_array($transactionDetails[$k]['sku'], $skusForReminders1)) {
                                                                        if (isset($servicesReminders[$srcar][$rm])) {
                                                                            unset($servicesReminders[$srcar][$rm]);
                                                                        }
                                                                    }
                                                                    break;
                                                                case 'Meineke17':
                                                                    if (in_array($transactionDetails[$k]['sku'], $skusForReminders2)) {
                                                                        if (isset($servicesReminders[$srcar][$rm])) {
                                                                            unset($servicesReminders[$srcar][$rm]);
                                                                        }
                                                                    }
                                                                    break;
                                                            }
                                                        }
                                                    }
                                                }


                                                //echo $transactionDetails[$k]['sku'] . ' --- ' . $k . ' *** ';
                                                if ($transactionDetails[$k]['sku']) {
                                                    if (strpos($transactionDetails[$k]['sku'], ', ') !== false) {
                                                        $historyTransactions[$historyTransactionVehicle[$i]['vehicle']][$index]['service'] = $transactionDetails[$k]['sku'];

                                                        $skuArr = explode(",", $transactionDetails[$k]['sku']);
                                                        $skuSecond = explode("-", $skuArr[0]);
                                                        // for($sk=0;$sk<count($skuArr);$sk++) {
                                                        $service = $em->getRepository('AcmeDataBundle:Sku')->findOneBySkuCode(trim($skuSecond[1]) . "-" . trim($skuSecond[0]));
                                                        // var_dump($service);die;

                                                        if ($service != NULL) {
                                                            //echo 'Aici1: ' . $transactionDetails[$k]['sku'] . ' --- ';
                                                            $historyTransactions[$historyTransactionVehicle[$i]['vehicle']][$index]['service'] = $service->getDisplayName();

                                                            //echo 'Aici1: ' . $service->getDisplayName() . ' *** ';

                                                        } else {
                                                            $result = '';
                                                            if (!empty($skuSecond[0]) && !empty($skuSecond[1])) {
                                                                $stmt = $this->getDoctrine()->getManager()
                                                                    ->getConnection()
                                                                    ->prepare('select * from sku_old_lines where id = :id');
                                                                @$stmt->bindParam(':id', trim($skuSecond[1]));
                                                                $stmt->execute();
                                                                $result1 = $stmt->fetchAll();

                                                                $stmt2 = $this->getDoctrine()->getManager()
                                                                    ->getConnection()
                                                                    ->prepare('select * from sku_old_classes where id = :id');
                                                                @$stmt2->bindParam(':id', trim($skuSecond[0]));
                                                                $stmt2->execute();
                                                                $result2 = $stmt->fetchAll();
                                                                @$result = $result1[0]["longdescription"] . $result2[0]["longdescription"];
                                                            }

                                                            $historyTransactions[$historyTransactionVehicle[$i]['vehicle']][$index]['skuName'] = $transactionDetails[$k]['sku'];
                                                            $historyTransactions[$historyTransactionVehicle[$i]['vehicle']][$index]['service'] = $result;

                                                            //echo 'Aici2: ' . $result . ' *** ';
                                                        }


                                                        // }
                                                    } else {
                                                        $service = $em->getRepository('AcmeDataBundle:Sku')->findOneBySkuCode($transactionDetails[$k]['sku']);
                                                        if ($service != NULL) {
                                                            $historyTransactions[$historyTransactionVehicle[$i]['vehicle']][$index]['service'] = $service->getDisplayName();
                                                        } else {
                                                            $historyTransactions[$historyTransactionVehicle[$i]['vehicle']][$index]['service'] = NULL;//"No service found. Call customer care at <a href='tel: 1-800-447-3070'>1-800-447-3070</a>";
                                                        }
                                                        // $historyTransactions[$historyTransactionVehicle[$i]['vehicle']][$index]['service'] = $transactionDetails[$k]['sku'];
                                                    }
                                                } else
                                                    $historyTransactions[$historyTransactionVehicle[$i]['vehicle']][$index]['service'] = $transactionDetails[$k]['sku'];// de pus sku (121 - 01)

                                                $index++;
                                            }
                                        }
                                    }//End checking 0-0, MEMO or 0-0, Discount
                                }

                            }
                        }
                    }

                }

                //get history transactions for last location
                $historyTransactionsLastLocation = $clutch->getHistoryTransaction($entity->getCardNumber(), '');
                $transactionTime = 0;
                $transactionId = 0;
                $lastVisitedStoreId = '';
                for ($i = 0; $i < count($historyTransactionsLastLocation); $i++) {
                    if (isset($historyTransactionsLastLocation[$i]['callType']) && $historyTransactionsLastLocation[$i]['callType'] == "CHECKOUT_COMPLETE") {
                        if (intval($historyTransactionsLastLocation[$i]['transactionTime'] / 1000) > intval($transactionTime / 1000)) {
                            $transactionTime = $historyTransactionsLastLocation[$i]['transactionTime'];
                            $transactionId = $historyTransactionsLastLocation[$i]['transactionId'];
                        }
                    }
                }

                if ($transactionId)
                    $lastVisitedStoreId = $clutch->getTransactionDetailsForLastLocation($transactionId);
            }

            $appointmentsCheck = $em->getRepository('AcmeDataBundle:Appointments')->getAllAppointments($id);
            if ($appointmentsCheck) {
                //check if deleted appointments
                for ($i = 0; $i < count($appointmentsCheck); $i++) {
                    $result = FullSlate::checkFullSlateBooking($appointmentsCheck[$i]['storeId'], $appointmentsCheck[$i]['fullSlateId'], $this->container->getParameter('fullslate')['fullslate_url']);
                    $bookings = json_decode($result, true);
                    if (array_key_exists('deleted', $bookings)) {
                        if ($bookings['deleted'] == 1) {
                            $servicesApp = $em->getRepository('AcmeDataBundle:AppointmentsHasServices')->findByAppointments($appointmentsCheck[$i]['id']);
                            if ($servicesApp) {
                                foreach ($servicesApp as $srv) {
                                    $em->remove($srv);
                                    $em->flush();
                                }
                            }
                            $booking = $em->getRepository('AcmeDataBundle:Appointments')->findOneBy(array('fullSlateId' => $bookings['id']));
                            $em->remove($booking);
                            $em->flush();
                        }
                    }
                }
            }

            $appointments = array();
            $futureAppointments = array();

            //check future appointments in Full Slate
            $appointments = $em->getRepository('AcmeDataBundle:Appointments')->getFutureAppointments($id);
//      echo("<pre>");
//      print_r($appointments);
//      die();
            if ($appointments) {

                //check services
                for ($i = 0; $i < count($appointments); $i++) {
                    $storeTime = EntitiesUtility::getTimezone($appointments[$i]['timezone']);
                    $appointmentDate = new \DateTime($appointments[$i]['appointmentDate']->format('Y-m-d H:i:s'));

                    //add 1 day delay
                    $appointmentDate->add(new \DateInterval('P1D'));

                    if ($appointmentDate > $storeTime['store_time']) {
                        //format date
                        $fullDate = $appointments[$i]['appointmentDate'];
                        $appointments[$i]['appointmentDate'] = $fullDate->format('m/d/Y');
                        $appointments[$i]['appointmentHours'] = $fullDate->format('g:i a');

                        $servicesApp = $em->getRepository('AcmeDataBundle:AppointmentsHasServices')->findByAppointments($appointments[$i]['id']);
                        if ($servicesApp) {
                            $services = array();
                            for ($j = 0; $j < count($servicesApp); $j++) {
                                $services[$j] = $servicesApp[$j]->getServices()->getTitle();
                            }
                            $appointments[$i]['services'] = implode(", ", $services);
                        }
                        $futureAppointments[] = $appointments[$i];
                    }
                }
            }

            //get rewards
            $myRewards = $em->getRepository('AcmeDataBundle:Rewards')->getMyRewards($entity->getLoyaltyPointsBalance() ? $entity->getLoyaltyPointsBalance() : 0);
            if ($myRewards) {
                for ($i = 0; $i < count($myRewards); $i++) {
                    //update image link
                    $myRewards[$i]['image'] = $this->container->getParameter('project')['cdn_front_resources_url'] . 'images/' . $myRewards[$i]['image'];
                }
            }

            //if user has My Meineke set, get store coupons
            $coupons = array();
            if ($entity->getMyStore()) {
                $coupons = $this->getMyMeinekeCoupons($entity->getMyStore());
            }

            //get info
            $info = EntitiesUtility::getUserData($entity, $coupons, $em);
            $info['vehicles'] = $vehicles;
            $info['futureAppointments'] = $futureAppointments;
            $info['myRewards'] = $myRewards;

            //check for labor in historyTransaction
            $transactionDates = array();

            foreach ($historyTransactions as $car => $transactions) {
                foreach ($transactions as $key => $value) {
                    if (isset($transactions[$key]['service']))
                        $transactionDates[$car][$transactions[$key]['transactionTime']][] = $transactions[$key]['service'];
                }
            }

            /*
             * RULE to remove the transaction / skus that have Labor in them, but commenting out.
             */

            // foreach($historyTransactions as $car => $transactions) {
            //   foreach($transactions as $key => $value) {
            //     if(isset($transactions[$key]['service'])) {
            //       if(strpos(strtolower($transactions[$key]['service']), 'labor') !== FALSE && count($transactionDates[$car][$transactions[$key]['transactionTime']]) > 1) {
            //         //remove
            //         unset($historyTransactions[$car][$key]);
            //       }
            //     }
            //   }
            // }

            foreach ($historyTransactions as $car => $transactions) {
                $historyTransactions[$car] = array_values($transactions);
            }
            $serviceRemindersFiltered = array();
            foreach ($serviceReminders as $cars => $servs) {
                for ($i = 0; $i < count($servs); $i++) {
                    if ($servs[$i] == 'Meineke06')
                        $serviceRemindersFiltered[$cars][$i] = 'Oil Change Service Reminder';
                    if ($servs[$i] == 'Meineke07')
                        $serviceRemindersFiltered[$cars][$i] = 'Oil Change & Brake Service Reminder';
                    if ($servs[$i] == 'Meineke17')
                        $serviceRemindersFiltered[$cars][$i] = 'High Mileage Service Reminder';
                    if ($servs[$i] == 'Meineke19')
                        $serviceRemindersFiltered[$cars][$i] = 'Oil Change Reminder';
                }
            }

            $info['historyTransactions'] = $historyTransactions;
            $info['serviceReminders'] = $serviceRemindersFiltered;
            $info['lastVisitedStoreId'] = str_replace("MK", "", $lastVisitedStoreId);

            return ApiResponse::setResponse($info);
        } catch (\Exception $e) {

            return ApiResponse::setResponse($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}