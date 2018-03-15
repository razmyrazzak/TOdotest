<?php

namespace Tests;


class LandingPageTest extends TestCase
{
    /**
     * Test landing page has 200 status code
     */
    public function testLandingPage(){
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }

}
