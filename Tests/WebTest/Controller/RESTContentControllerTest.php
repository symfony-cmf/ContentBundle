<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2015 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Cmf\Bundle\ContentBundle\Tests\WebTest\Controller;

use Symfony\Cmf\Component\Testing\Functional\BaseTestCase;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class RESTContentControllerTest extends BaseTestCase
{
    public function setUp()
    {
        $this->db('PHPCR')->loadFixtures(array(
            'Symfony\Cmf\Bundle\ContentBundle\Tests\Resources\DataFixtures\Phpcr\LoadContentData',
        ));
        $this->client = $this->createClient();
    }

    public function testGET()
    {
        $this->client->request('GET', '/content-1');
        $res = $this->client->getResponse();
        $this->assertEquals(200, $res->getStatusCode());
    }
}
