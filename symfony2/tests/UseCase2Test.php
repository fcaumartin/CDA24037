<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class UseCase2Test extends PantherTestCase
{
    public function testSomething(): void
    {
        $client = static::createPantherClient();
        
        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('Sign in')->form();
        $form['email'] = 'admin@admin.com';
        $form['password'] = '1234';

        $crawler = $client->submit($form);

        $body = $crawler->filter("body>h1")->text();

        var_dump($body);

        $this->assertEquals("Catalogue",$body);
        sleep(1);

        // $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('body', 'Catalogue');
    }
}
