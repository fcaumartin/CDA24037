<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class UseCase2Test extends PantherTestCase
{
    public function testSomething(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/mlkmlkmlk');

        sleep(5);

        // $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Catalogue');
    }
}
