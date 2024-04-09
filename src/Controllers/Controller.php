<?php
namespace Project\Controllers;

use Project\Validator;
use Project\Models\AdminManager;
use Project\Models\ActualitesManager;
use Project\Models\HorairesManager;
use Project\Models\TarifsManager;
use Project\Models\EquipeManager;

abstract class Controller
{
    protected Validator $validator;
    protected AdminManager $adminManager;
    protected ActualitesManager $actualitesManager;
    protected TarifsManager $tarifsManager;
    protected HorairesManager $horairesManager;
    protected EquipeManager $equipeManager;
    public function __construct()
    {
        $this->validator = new Validator();
        $this->adminManager = new AdminManager();
        $this->actualitesManager = new ActualitesManager();
        $this->tarifsManager = new TarifsManager();
        $this->horairesManager = new HorairesManager();
        $this->equipeManager = new EquipeManager();
    }
}