<?php

namespace Omnipay\YandexMoney\Message;

use Omnipay\Tests\TestCase;

class PurchaseRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize(
            array(
                'method' => 'AC',
                'amount' => '1.00',
                'currencyNum' => '10643',
				'orderId' => '25',
                'shopId' => '132',
				'scid' => '57331',
                'customerNumber' => '1',
                'password' => 'bytehand',
				'returnUrl' => 'http://example.com/return',
				'cancelUrl' => 'http://example.com/cancel'
            )
        );
    }

    public function testGetData()
    {
		$this->request->initialize(
            array(
                'method' => 'AC',
                'amount' => '1.00',
                'currencyNum' => '10643',
				'orderId' => '25',
                'shopId' => '132',
				'scid' => '57331',
                'customerNumber' => '1',
                'password' => 'bytehand',
				'returnUrl' => 'http://example.com/return',
				'cancelUrl' => 'http://example.com/cancel'
            )
        );

        $data = $this->request->getData();
        $this->assertSame('AC', $data['paymentType']);
        $this->assertSame('10643', $data['orderSumCurrencyPaycash']);
    }
}
