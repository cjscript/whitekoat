<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GenericController extends Controller
{

    // login service
    protected $loginService;
    // class lib service
    protected $classLibService;
    // drug lib service
    protected $drugLibService;
    // disease lib service
    protected $diseaseLibService;
    // molecule lib service
    protected $moleculeLibService;
    // symptom lib service
    protected $symptomLibService;
    // action lib service
    protected $actionLibService;
    // alias lib service
    protected $aliasLibService;
    // drug card service
    protected $drugCardService;
    // disease card service
    protected $diseaseCardService;
    // type lib service
    protected $typeLibService;
    // relationship service
    protected $relationshipService;

    public function loginService()
    {
        if (!$this->loginService)
        {
            $loginService = $this->get('whitekoat_login_service');
        }
        return $loginService;
    }

    public function drugLibService()
    {
        if (!$this->drugLibService)
        {
            $drugLibService = $this->get('whitekoat_druglib_service');
        }
        return $drugLibService;
    }

    public function classLibService()
    {
        if (!$this->classLibService)
        {
            $classLibService = $this->get('whitekoat_classlib_service');
        }
        return $classLibService;
    }

    public function diseaseLibService()
    {
        if (!$this->diseaseLibService)
        {
            $diseaseLibService = $this->get('whitekoat_diseaselib_service');
        }
        return $diseaseLibService;
    }

    public function moleculeLibService()
    {
        if (!$this->moleculeLibService)
        {
            $moleculeLibService = $this->get('whitekoat_moleculelib_service');
        }
        return $moleculeLibService;
    }

    public function symptomLibService()
    {
        if (!$this->symptomLibService)
        {
            $symptomLibService = $this->get('whitekoat_symptomlib_service');
        }
        return $symptomLibService;
    }

    public function actionLibService()
    {
        if (!$this->actionLibService)
        {
            $actionLibService = $this->get('whitekoat_actionlib_service');
        }
        return $actionLibService;
    }

    public function aliasLibService()
    {
        if (!$this->aliasLibService)
        {
            $aliasLibService = $this->get('whitekoat_aliaslib_service');
        }
        return $aliasLibService;
    }

    public function drugCardService()
    {
        if (!$this->drugCardService)
        {
            $drugCardService = $this->get('whitekoat_dcard_service');
        }
        return $drugCardService;
    }

    public function diseaseCardService()
    {
        if (!$this->diseaseCardService)
        {
            $diseaseCardService = $this->get('whitekoat_diseasecard_service');
        }
        return $diseaseCardService;
    }

    public function typeLibService()
    {
        if (!$this->typeLibService)
        {
            $typeLibService = $this->get('whitekoat_typelib_service');
        }
        return $typeLibService;
    }

    public function relationshipService()
    {
        if (!$this->relationshipService)
        {
            $relationshipService = $this->get('whitekoat_relationship_service');
        }
        return $relationshipService;
    }
    
}
