<?php

/**
 * 
 * @author Ing. Miroslav Valerian
 */

namespace Valerian\FioApi;

use \DateTime;

class FioApiPaymentOrderTransaction
{
	const PAYMENT_TYPE_STANDARD = 431001;
	const PAYMENT_TYPE_FASTER = 431004;
	const PAYMENT_TYPE_PRIORITY = 431005;
	const PAYMENT_TYPE_DIRECT_DEBIT = 431022;
	
	/**
	 * @var int(16) required
	 * číslo účtu odesílatele
	 */
	protected $accountFrom;
	/**
	 * @var string (3) required
	 * kód měny (ISO 4217)
	 */
	protected $currency;
	/**
	 * @var float (18) required
	 * částka
	 */
	protected $amount;
	/**
	 * @var string (18) required
	 * číslo účtu příjemce (1234-1234567890)
	 */
	protected $accountTo;
	/**
	 * @var string (4) required
	 * kód banky
	 */
	protected $bankCode;
	/**
	 * @var string (4)
	 * konstantní symbol
	 */
	protected $constantSymbol;
	/**
	 * @var string (10)
	 * variabilní banky
	 */
	protected $variableSymbol;
	/**
	 * @var string (10)
	 * specifický symbol
	 */
	protected $specificSymbol;
	/**
	 * @var DateTime (required)
	 * datum úhrady
	 */
	protected $date;
	/**
	 * @var string (140)
	 * zpráva pro příjemce
	 */
	protected $messageForRecipient;
	/**
	 * @var string (255)
	 * Vaše označení
	 */
	protected $comment;
	/**
	 * @var string (3)
	 * Důvod platby
	 */
	protected $paymentReason;
	/**
	 * @var int (6)
	 * zpráva pro příjemce
	 */
	protected $paymentType;
	
	public function __construct()
	{
		
	}
	
	public function getAccountFrom()
	{
		return $this->accountFrom;
	}
	
	public function getCurrency()
	{
		return $this->currency;
	}

	public function getAmount()
	{
		return $this->amount;
	}

	public function getAccountTo()
	{
		return $this->accountTo;
	}

	public function getBankCode()
	{
		return $this->bankCode;
	}

	public function getConstantSymbol()
	{
		return $this->constantSymbol;
	}

	public function getVariableSymbol()
	{
		return $this->variableSymbol;
	}

	public function getSpecificSymbol()
	{
		return $this->specificSymbol;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function getMessageForRecipient()
	{
		return $this->messageForRecipient;
	}

	public function getComment()
	{
		return $this->comment;
	}

	public function getPaymentReason()
	{
		return $this->paymentReason;
	}

	public function getPaymentType()
	{
		if ($this->paymentType) {
			return $this->paymentType;
		} else {
			return FioApiPaymentOrder::PAYMENT_TYPE_STANDARD;
		}
	}

	public function setAccountFrom($accountFrom) 
	{
		$this->accountFrom = $accountFrom;
		return $this;
	}
	
	public function setCurrency($currency)
	{
		$this->currency = $currency;
		return $this;
	}

	public function setAmount($amount)
	{
		$this->amount = $amount;
		return $this;
	}

	public function setAccountTo($accountTo)
	{
		$this->accountTo = $accountTo;
		return $this;
	}

	public function setBankCode($bankCode)
	{
		$this->bankCode = $bankCode;
		return $this;
	}

	public function setConstantSymbol($constantSymbol)
	{
		$this->constantSymbol = $constantSymbol;
		return $this;
	}

	public function setVariableSymbol($variableSymbol)
	{
		$this->variableSymbol = $variableSymbol;
		return $this;
	}

	public function setSpecificSymbol($specificSymbol)
	{
		$this->specificSymbol = $specificSymbol;
		return $this;
	}

	public function setDate(DateTime $date)
	{
		$this->date = $date;
		return $this;
	}

	public function setMessageForRecipient($messageForRecipient)
	{
		$this->messageForRecipient = $messageForRecipient;
		return $this;
	}

	public function setComment($comment)
	{
		$this->comment = $comment;
		return $this;
	}

	public function setPaymentReason($paymentReason)
	{
		$this->paymentReason = $paymentReason;
		return $this;
	}

	public function setPaymentType($paymentType)
	{
		$this->paymentType = $paymentType;
		return $this;
	}
}
