<?php

namespace Yoda\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterControllerTest extends WebTestCase
{
    public function testRegister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/register');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue($crawler->filter('html:contains("Register")')->count() > 0);

        $form = $crawler->selectButton('Register')->form();

        $client->submit($form);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertRegexp(
                '/please make up some fancy username for your account/', 
                $client->getResponse()->getContent());

        //$form['user_register[username]'] = 'user5';
        //$form['user_register[email]'] = 'user5@user.com';
        //$form['user_register[plainPassword][first]'] = 'P3ssword';
        //$form['user_register[plainPassword][second]'] = 'P3ssword';
        ￼
        //$client->submit($form);

    }
}