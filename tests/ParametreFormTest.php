<?php

namespace App\Tests;

use App\Entity\Parametre;
use App\Tests\ParametreFormTest;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ParametreFormTest extends KernelTestCase
{
    public function testSomething()
    {

        $parametre = (new Parametre)
            ->setAnneeScolaireEnCoursParametre('truc')
            ->setMomentRepetitionParametre(77)
            ->setLieuRepetitionParametre(4242)
            ->setPrixAdhesionParametre('truc')
            ->setCategorieBagadParametre(77)
            ->setPrixCoursParametre('essai')
            ->setContactsContactParametre(77)
            ->setContactsDemandePrestationParametre(11445);
        self::bootKernel();
        $container = static::getContainer();
        $error = $container->get('validator')->validate($parametre);
        $this->assertCount(0, $error);
    }
}