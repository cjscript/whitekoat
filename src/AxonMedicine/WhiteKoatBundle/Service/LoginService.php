<?php

namespace AxonMedicine\WhiteKoatBundle\Service;

use AxonMedicine\WhiteKoatBundle\Entity\User;

/**
 * The login service.
 *
 * @author cjscript
 */
class LoginService extends BaseService
{

    public function getBy($username, $password)
    {
        $repo = $this->em->getRepository("AxonMedicineWhiteKoatBundle:User");

        $user = $repo->findOneBy(array('username' => $username, 'password' => $password));

        return $user;
    }

    public function register($username, $firstname, $password)
    {
        $user = new User();
        $user->setFirstName($firstname);
        $user->setPassword(sha1($password));
        $user->setUserName($username);
        $user->setVersion('1');
        $this->em->persist($user);
        $this->em->flush();
    }

}
