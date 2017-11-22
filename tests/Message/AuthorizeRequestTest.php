<?php

namespace Omnipay\YandexMoney\Message;

use Omnipay\Tests\TestCase;

class AuthorizeRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = new AuthorizeRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize(
             array(
                'action' => 'checkOrder',
                'orderSumAmount' => '1.00',
                'orderSumCurrencyPaycash' => '10643',
				'orderSumBankPaycash' => '1003',
				'orderId' => '25',
                'shopId' => '132',
				'scid' => '57331',
                'invoiceId' => '2000000282924',
                'customerNumber' => '1',
                'password' => 'bytehand',
				'md5' => '90BE7B50AB81D7783846D0E2D2A095C6'
            )
        );
    }
	
	public function testGetDataSuccess()
    {
		$this->request->initialize(
             array(
                'action' => 'checkOrder',
                'orderSumAmount' => '1.00',
                'orderSumCurrencyPaycash' => '10643',
				'orderSumBankPaycash' => '1003',
				'orderId' => '25',
                'shopId' => '132',
				'scid' => '57331',
                'invoiceId' => '2000000282924',
                'customerNumber' => '1',
                'password' => 'bytehand',
				'md5' => '90BE7B50AB81D7783846D0E2D2A095C6'
            )
        );

        $data = $this->request->getData();
        $this->assertSame('checkOrder', $data['action']);
        $this->assertSame(0, $data['code']);
    }

    public function testGetDataFailure()
    {
		$this->request->initialize(
             array(
                'action' => 'checkOrder',
                'orderSumAmount' => '1.00',
                'orderSumCurrencyPaycash' => '10643',
				'orderSumBankPaycash' => '1003',
				'orderId' => '25',
                'shopId' => '132',
				'scid' => '57331',
                'invoiceId' => '2000000282924',
                'customerNumber' => '1',
                'password' => 'badPassword',
				'md5' => '90BE7B50AB81D7783846D0E2D2A095C6'
            )
        );

        $data = $this->request->getData();
        $this->assertSame('checkOrder', $data['action']);
        $this->assertSame(1, $data['code']);
    }
}
