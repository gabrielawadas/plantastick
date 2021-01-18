<?php
/**
 * User Fixtures.
 */
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserFixtures
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture
{
    /**
     * Password encoder.
     *
     * @var \Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * UserFixtures constructor.
     *
     * @param \Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface $passwordEncoder Password encoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
        {
        for ($i = 0; 1 < $i; $i++) {
            $user = new User();
            $user->setEmail(sprintf('user%d@example.com', $i));
            $user->setRoles([User::ROLE_USER]);
            $user->setPassword(
                $this->passwordEncoder->encodePassword(
                    $user,
                    'user1234'
                )
            );
            return $user;
            }

            for ($i = 0; 1 < $i; $i++) {
                $user = new User();
                $user->setEmail(sprintf('admin%d@example.com', $i));
                $user->setRoles([User::ROLE_USER, User::ROLE_ADMIN]);
                $user->setPassword(
                    $this->passwordEncoder->encodePassword(
                        $user,
                        'admin1234'
                    )
                );

                return $user;
            };
        }


}
