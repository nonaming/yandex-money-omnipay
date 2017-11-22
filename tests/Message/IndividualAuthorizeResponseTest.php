<?php

namespace Omnipay\YandexMoney\Message;

use Omnipay\Tests\TestCase;

class IndividualAuthorizeResponseTest extends TestCase
{
    public function testSuccess()
    {
        $response = new IndividualAuthorizeResponse($this->getMockRequest(), 
											array(  'code' => 0, 
													'orderNumber' => '5'
											)
										);

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertFalse($response->getMessage());
		$this->assertSame('5', $response->getTransactionReference());
    }
	public function testFailure()
    {
        $response = new IndividualAuthorizeResponse($this->getMockRequest(), 
											array(  'code' => 1, 
													'orderNumber' => '5'
											)
										);

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
       	$this->assertSame('HTTP/1.0 401 Unauthorized', $response->getMessage());
		$this->assertSame('5', $response->getTransactionReference());
    }
}


