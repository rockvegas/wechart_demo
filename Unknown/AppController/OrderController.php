<?php

namespace AppController;

include_once Framework\AppControllerBase;

class OrderController extends AppControllerBase
{
    function annoceOrder($customerId, $order, $orderType, $bizType = NULL)
    {
        $bizId = B2CManagement::instance().getBusinessForCustomer($customerId)[0];
        Messenger::instance().sendMessageTo($order.msg, $order.resource, $bizId);
    }
}

?>