<?php

use TADPHP\TADFactory;

function getTadInstance()
{
    return (new TADFactory(['ip' => '172.16.13.191']))->get_instance();
}

function getAllAttLog()
{
    $tad = getTadInstance();
    $getAllAttLog = $tad->get_att_log();
    return $getAllAttLog->to_json();
}

function getAttLog($pin)
{
    $tad = getTadInstance();
    $getAttLog = $tad->get_att_log(['pin' => $pin]);
    return $getAttLog->to_json();
}

function getAllUserInfo()
{
    $tad = getTadInstance();
    $getAllUserInfo = $tad->get_all_user_info();
    return $getAllUserInfo->to_array();
}

function setUserInfo($data)
{
    $tad = getTadInstance();
    return $tad->set_user_info($data);
}

function getUserInfo($pin)
{
    $tad = getTadInstance();
    return $tad->get_user_info(['pin' => $pin])->to_array();
}

function deleteUser($pin)
{
    $tad = getTadInstance();
    return $tad->delete_user(['pin' => $pin]);
}
