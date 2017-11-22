<?php

namespace Omnipay\YandexMoney;

use Omnipay\Tests\GatewayTestCase;


class GatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
        $this->gateway->setShopId('123456');
        $this->gateway->setScId('789');
        $this->gateway->setPassword('secret');
        $this->gateway->setCurrencyNum('643');


      	$this->authorizeOptions = array(
            'action' => 'action',
            'orderNumber' => '777',
            'orderSumAmount' => '10.00',
            'orderSumCurrencyPaycash' => '643',
            'orderSumBankPaycash' => '55',
            'shopId' => '15',
            'invoiceId' => '123',
            'customerNumber' => '1',
            'password' => 'secret'
        );
		

		$this->purchaseOptions = array(
            'customerNumber' => '1',
            'orderId' => '123',
            'amount' => '10.00',
            'method' => 'AC',
            'returnUrl' => 'http://example.com/success',
            'cancelUrl' => 'http://example.com/cancel'
        );
    }

	
	public function testAuthorize()
    {
        $response = $this->gateway->authorize($this->authorizeOptions)->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('777', $response->getTransactionReference());
        $this->assertContains('checkOrderResponse', $response->getMessage());
    }
	

    public function testPurchase()
    {
        $response = $this->gateway->purchase($this->purchaseOptions)->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertTrue($response->isRedirect());
        $this->assertNull($response->getTransactionReference());
        $this->assertNull($response->getMessage());
        $this->assertContains('money.yandex.ru', $response->getRedirectUrl());
		$this->assertSame('POST', $response->getRedirectMethod());
        $this->assertNotNull($response->getRedirectData());
    }

    
}
