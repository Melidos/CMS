<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var PasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $u1 = new User();
        $u1->setUsername("Kevin");
        $u1->setRoles(["ROLE_ADMIN"]);
        $u1->setPassword($this->passwordEncoder->encodePassword(
            $u1,
            "123456"
        ));

        $manager->persist($u1);

        $u2 = new User();

        $u2->setUsername("test");
        $u2->setPassword($this->passwordEncoder->encodePassword(
            $u2,
            "123456"
        ));

        $manager->persist($u2);

        $manager->flush();
    }
}
