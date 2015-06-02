<?php

/**
 * 
 * @author Ing. Miroslav Valerian
 */

namespace Valerian\FioApi;

use \DateTime;
use \Exception;

class FioApiTransaction
{
	private $xml;
	private $parser;
	
	public function __construct($transactionXml)
	{
		$this->xml = $transactionXml;
	}
	
	//ID pohybu
	public function getTransactionId()
	{
		return (string) $this->xml->column_22;
	}
	//Datum
	public function getDate()
	{
		return new DateTime((string) $this->xml->column_0);
	}
	//Objem
	public function getAmount()
	{
		return (float) $this->xml->column_1;
	}
	//Měna
	public function getCurrency()
	{
		return (string) $this->xml->column_14;
	}
	//Protiúčet
	public function getAccount()
	{
		return (string) $this->xml->column_2;
	}
	//Název protiúčtu
	public function getAccountName()
	{
		return (string) $this->xml->column_10;	
	}
	//Kód banky
	public function getBankCode()
	{
		return (string) $this->xml->column_3;
	}
	//Název banky
	public function getBankName()
	{
		return (string) $this->xml->column_12;
	}
	//Konstantní symbol
	public function getConstantSymbol()
	{
		return (string) $this->xml->column_4;
	}
	//Variabilní symbol
	public function getVariableSymbol()
	{
		return (string) $this->xml->column_5;
	}
	//Specifický symbol
	public function getSpecificSymbol()
	{
		return (string) $this->xml->column_6;
	}
	//Uživatelská identifikace
	public function getUserIdentification()
	{
		return (string) $this->xml->column_7;
	}
	//Zpráva pro příjemce
	public function getNoteForRecipient()
	{
		return (string) $this->xml->column_16;
	}
	//Typ
	public function getType()
	{
		return (string) $this->xml->column_8;
	}
	//Provedl
	public function getPerformedBy()
	{
		return (string) $this->xml->column_9;
	}
	//Upřesnění
	public function getSpecification()
	{
		throw new Exception("This method is not implemented.");
	}
	//Komentář
	public function getComment()
	{
		return (string) $this->xml->column_25;
	}
	//BIC
	public function getBic()
	{
		throw new Exception("This method is not implemented.");
	}
	//ID pokynu
	public function getInstructionId()
	{
		return (string) $this->xml->column_17;
	}
	
	public function getTransactionArray()
	{
		$data = array(
			'id' => $this->getTransactionId(),
			'date' => $this->getDate(),
			'amount' => $this->getAmount(),
			'currency' => $this->getCurrency(),
			'account' => $this->getAccount(),
			'accountName' => $this->getAccountName(),
			'bankCode' => $this->getBankCode(),
			'bankName' => $this->getBankName(),
			'constantSymbol' => $this->getConstantSymbol(),
			'variableSymbol' => $this->getVariableSymbol(),
			'specificSymbol' => $this->getSpecificSymbol(),
			'userIdentification' => $this->getUserIdentification(),
			'noteForRecipient' => $this->getNoteForRecipient(),
			'type' => $this->getType(),
			'performedBy' => $this->getPerformedBy(),
			'comment' => $this->getComment(),
			'instructionId' => $this->getInstructionId(),
		);
		return $data;
	}
}
