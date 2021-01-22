<?php
/**
 * User fixtures.
 */

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;

/**
 * Class UserFixtures.
 */

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    // ...
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('user@example.com');
        $user->setRoles([User::ROLE_USER, User::ROLE_ADMIN]);
        $password = $this->encoder->encodePassword($user, 'user_1234');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }
}
