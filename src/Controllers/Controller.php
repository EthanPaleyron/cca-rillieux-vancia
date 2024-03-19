<?php
namespace Project\Controllers;

use Project\Validator;
use Project\Models\AdminManager;

abstract class Controller
{
    protected Validator $validator;
    protected AdminManager $adminManager;
    public function __construct()
    {
        $this->validator = new Validator();
        $this->adminManager = new AdminManager();
    }
}