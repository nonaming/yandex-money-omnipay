<?php

namespace Omnipay\YandexMoney\Message;

use Omnipay\Tests\TestCase;

class IndividualPurchaseRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = new IndividualPurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize(
             array(
                'account' => '410011680044609',
                'form_comment' => 'formComment',
                'orderId' => '1',
				'amount' => '1.0',
				'comment' => 'comment!',
                'method' => 'AC',
				'scid' => '57331',
                'returnUrl' => 'http://example.com/return',
                'cancelUrl' => 'http://example.com/cancel'
            )
        );
    }
	
	public function testGetData()
    {
		$this->request->initialize(
             array(
                'account' => '410011680044609',
                'form_comment' => 'formComment',
                'orderId' => '1',
				'amount' => '1.0',
				'comment' => 'comment!',
                'method' => 'AC',
				'scid' => '57331',
                'returnUrl' => 'http://example.com/return',
                'cancelUrl' => 'http://example.com/cancel'
            )
        );

        $data = $this->request->getData();
        $this->assertSame('AC', $data['paymentType']);
        $this->assertSame('1', $data['label']);
    }

}
