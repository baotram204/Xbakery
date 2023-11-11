<?php

namespace app\controllers\admin;

use core\Controller;

class Logout extends Controller
{
    public function index() {
        session_destroy();
        header('location:'._WEB_ROOT.'/admin/login');

    }
}