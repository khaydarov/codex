<?php defined('SYSPATH') or die('No direct script access.');

class Surveillance {

    public static function run()
    {
        $host = $_SERVER['REMOTE_ADDR'];

        if (isset($_COOKIE['phpssession']))
            $session = $_COOKIE['phpssession'];
        else
        {
            $session = hash("sha256", mt_rand(0, 1024*1024));
            setcookie('phpssession', $session);
        }



        DB::insert('Surveillance', ['host', 'session', 'get', 'post', 'cookie', 'server'])->values([
            $host,
            $session,
            json_encode($_GET),
            '',
            json_encode($_COOKIE),
            json_encode($_SERVER)
        ])->execute();
    }

}
