<?php

namespace Components\BusinessCustomerMapper;

class B2CManagement
{
    function __constructor()
    {

    }

    function __destructor()
    {

    }

    function getBusinessesForCustomer($customerId)
    {
        //return DB.getInterestedBizs($customerId)  //array type.
    }

    function getBusinessById($bizId)
    {
        //return DB.getBiz($bizId);
    }

    function getCustomersOfBusiness($bizId)
    {
        //return DB.getRegisteredCustomers($bizId);
    }

    //...
}

?>