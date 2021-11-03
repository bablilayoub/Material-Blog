<?php

class Routes
{

    public function __construct()
    {

        $this->domain = _SITE_URL;

    }


    public function assets_js($file)
    {
        return $this->domain . '/assets/js/' . $file;
    }

    public function assets_css($file)
    {
        return $this->domain . '/assets/css/' . $file;
    }

    public function assets_img($file)
    {
        return $this->domain . '/assets/images/' . $file;
    }


    public function home()
    {
        return $this->domain;
    }


    public function post()
    {
        return $this->domain . '/';
    }

    public function signin()
    {
        return $this->domain . '/auth/signin.php';
    }

    public function register()
    {
        return $this->domain . '/auth/register.php';
    }

    public function signout()
    {
        return $this->domain . '/auth/logout.php';
    }

}

?>