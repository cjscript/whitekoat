<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/") 
 */
class LoginController extends GenericController
{

    /**
     * @Route("/login", name="login_route", defaults={"name" = "someDefaultName"} )
     * @Method({"GET", "POST"})
     * @param type $name the name of logged in user
     * @return type
     */
    public function loginAction(Request $request)
    {
        $ret = null;

        if ($request->getMethod() == 'POST')
        {
            $user = $this->loginService()->getBy($request->get('username'), sha1($request->get('password')));

            if ($user)
            {
                // save login info in session
                $session = $this->getRequest()->getSession();

                $session->set('logininfo', $user);

                if ($user->getUsername() == 'student@whitekoat.com')
                {
                    //$ret = $this->redirect($this->generateUrl('sc_route_get'));
					$ret = $this->redirect($this->generateUrl('homepage_route_get'));
                } else
                {
                    $ret = $this->redirect($this->generateUrl('dlc_route_get'));
                }
            } else
            {
                $ret = $this->render('AxonMedicineWhiteKoatBundle:Default:login.html.twig', array('name' => 'login failed'));
            }
        } else
        {
            $ret = $this->render('AxonMedicineWhiteKoatBundle:Default:login.html.twig');
        }
        return $ret;
    }

    /**
     * @Route("/logout", name="logout_route" )
     * @Method({"GET"})
     * @param type $request
     * @return type
     */
    public function logoutAction(Request $request)
    {
        $session = $this->getRequest()->getSession();

        $session->set('logininfo', null);

        return $this->render('AxonMedicineWhiteKoatBundle:Default:login.html.twig');
    }

    /**
     * @Route("/signup", name="signup_route" )
     * @return type
     */
    public function signupAction(Request $request)
    {
        if ($request->getMethod() == 'POST')
        {
            $username = $request->get('username');

            $firstname = $request->get('firstname');

            $password = $request->get('password');

            $this->loginService()->register($username, $firstname, $password);

            return $this->render('AxonMedicineWhiteKoatBundle:Default:login.html.twig');
        }
        return $this->render('AxonMedicineWhiteKoatBundle:Default:signup.html.twig');
    }

}
