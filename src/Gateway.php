<?php

namespace yandexmoney\YandexMoney;

use Omnipay\Common\AbstractGateway;


/**
 * YandexMoney Class
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'YandexMoney';
    }

    public function getDefaultParameters()
    {
        return array(
            'password'  => '',
			'shopid' => '', 
			'scid' => '',
			'method' => '',
			'orderId' => '',
			'invoiceId' => '',
            'md5' => '',
			'currencyNum' => '',
			'orderNumber' => '',
			'customerNumber' => '',
			'returnUrl' => '',
			'cancelUrl' => '',
            'receipt' => '',
            'email' => ''
        );
    }

    public function getReceipt($source = false)
    {
        if ($source) {
            return $this->getParameter('receipt');
        } else {
            return json_decode($this->getParameter('receipt'));
        }
    }

    public function setReceipt($value, $encode = false)
    {
        if ($encode || is_array($value)) {
            return $this->setParameter('receipt', json_encode($value));
        } else {
            return $this->setParameter('receipt', $value);
        }
    }

    
    public function getEmail()
    {
        return $this->getParameter('email');
    }

    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }


    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

	public function getShopId()
    {
        return $this->getParameter('shopid');
    }

    public function setShopId($value)
    {
        return $this->setParameter('shopid', $value);
    }

	public function getScid()
    {
        return $this->getParameter('scid');
    }

    public function setScid($value)
    {
        return $this->setParameter('scid', $value);
    }
	public function getOrderId()
    {
        return $this->getParameter('orderId');
    }
	public function setOrderId($value)
    {
        return $this->setParameter('orderId', $value);
    }
	public function getOrderNumber()
    {
        return $this->getParameter('orderNumber');
    }
	public function setOrderNumber($value)
    {
        return $this->setParameter('orderNumber', $value);
    }
	public function getCustomerNumber()
    {
        return $this->getParameter('customerNumber');
    }
	public function setCustomerNumber($value)
    {
        return $this->setParameter('customerNumber', $value);
    }
	public function getInvoiceId()
	{
		return $this->getParameter('invoiceId');
	}
	public function setInvoiceId($value)
	{
		return $this->setParameter('invoiceId', $value);
	}
	public function getMd5()
	{
		 return $this->getParameter('md5');
	}
	public function setMd5($value)
	{
		return $this->setParameter('md5', $value);
	}

	public function getMethod()
	{
		 return $this->getParameter('method');
	}

	public function setMethod($value)
	{
		 return $this->setParameter('method', $value);
	}

	public function getReturnUrl()
	{
		 return $this->getParameter('returnUrl');
	}

	public function setReturnUrl($value)
	{
		 return $this->setParameter('returnUrl', $value);
	}
	public function getCancelUrl()
	{
		 return $this->getParameter('cancelUrl');
	}

	public function setCancelUrl($value)
	{
		 return $this->setParameter('cancelUrl', $value);
	}


	public function getCurrencyNum()
    {
        return $this->getParameter('currencyNum');
    }
	
    public function setCurrencyNum($value)
    {
        return $this->setParameter('currencyNum', $value);
    }

	public function authorize(array $parameters = array())
    {
		return $this->createRequest('\yandexmoney\YandexMoney\Message\AuthorizeRequest', $parameters);
    }
    
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\yandexmoney\YandexMoney\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
		return $this->createRequest('\yandexmoney\YandexMoney\Message\CompletePurchaseRequest', $parameters);
    }

}
