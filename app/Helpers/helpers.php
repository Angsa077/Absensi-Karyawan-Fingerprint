<?php

use TADPHP\TADFactory;

class TADHelper
{
    private static $tad;

    public static function init()
    {
        $options = [
            'ip' => '172.16.13.191',
            'internal_id' => 100,
            'com_key' => 123,
            'description' => 'TAD1',
            'soap_port' => 8080,
            'udp_port' => 20000,
            'encoding' => 'utf-8',
        ];

        self::$tad = (new TADFactory($options))->get_instance();
    }

    // Helper functions
    public static function get_all_user_info()
    {
        self::init();
        return self::$tad->get_all_user_info();
    }

    public static function get_att_log()
    {
        self::init();
        return self::$tad->get_att_log();
    }

    public static function set_user_info($data)
    {
        self::init();
        return self::$tad->set_user_info($data);
    }

    public static function get_fingerprint_algorithm()
    {
        self::init();
        return self::$tad->get_fingerprint_algorithm();
    }
}
?>
