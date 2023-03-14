<?php

namespace App\Tests;

use App\Entity\Contact;
use App\Tests\ContactFormTest;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ContactFormTest extends KernelTestCase
{
    public function testSomething()
    {

        $contact = (new Contact)
            ->setNomContact(77)
            ->setPrenomContact(77)
            ->setSujetContact(77)
            ->setMessageContact('essai')
            ->setEmailContact(77)
            ->setTelephoneContact('essai');
        self::bootKernel();
        $container = static::getContainer();
        $error = $container->get('validator')->validate($contact);
        $this->assertCount(0, $error);
    }
}