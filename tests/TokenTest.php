<?php

namespace Hborras\TwitterAdsSDK\Tests;

use Hborras\TwitterAdsSDK\Token;
use PHPUnit\Framework\TestCase;

class TokenTest extends TestCase
{
    /**
     * @dataProvider tokenProvider
     * @param $expected
     * @param $key
     * @param $secret
     */
    public function testToString($expected, $key, $secret)
    {
        $token = new Token($key, $secret);

        $this->assertEquals($expected, $token->__toString());
    }

    public function tokenProvider()
    {
        return array(
            array('oauth_token=key&oauth_token_secret=secret', 'key', 'secret'),
            array('oauth_token=key%2Bkey&oauth_token_secret=secret', 'key+key', 'secret'),
            array('oauth_token=key~key&oauth_token_secret=secret', 'key~key', 'secret'),
        );
    }
}