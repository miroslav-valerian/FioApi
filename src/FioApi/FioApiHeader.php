<?php

/**
 * 
 * @author Ing. Miroslav Valerian
 */

namespace Valerian\FioApi;

use DateTime;
use SimpleXMLElement;

class FioApiHeader
{
	private $xml;
	
	public function __construct(SimpleXMLElement $headerXml)
	{
		$this->xml = $headerXml;
	}
	
	public function getAccountId()
	{
		return (string) $this->xml->accountId;
	}
	
	public function getBankId()
	{
	    return (string) $this->xml->bankId;
	}
	
	public function getCurrency()
	{
	    return (string) $this->xml->currency;
	}
	
	public function getIban()
	{
	    return (string) $this->xml->iban;
	}
	
	public function getBic()
	{
	    return (string) $this->xml->bic;
	}
	
	public function getOpeningBalance()
	{
	    return (string) $this->xml->openingBalance;
	}
	
	public function getClosingBalance()
	{
	    return (string) $this->xml->closingBalance;
	}
	
	public function getDateFrom()
	{
	    return new DateTime((string) $this->xml->dateStart);
	}
	
	public function getDateTo()
	{
	    return new DateTime((string) $this->xml->dateEnd);
	}
	
	public function getYearList()
	{
	    return (string) $this->xml->yearList;
	}
	
	public function getListId()
	{
	    return (string) $this->xml->idList;
	}
	
	public function getFromId()
	{
	    return (string) $this->xml->IdFrom;
	}
	
	public function getToId()
	{
	    return (string) $this->xml->IdTo;
	}
	
	public function getLastDownloadId()
	{
	    return (string) $this->xml->idLastDownload;
	}
	
	public function toArray()
	{
		$info = array(
			'accountId' => $this->getAccountId(),
			'bankId' => $this->getBankId(),
			'currency' => $this->getCurrency(),
			'iban' => $this->getIban(),
			'bic' => $this->getBic(),
			'openingBalance' => $this->getOpeningBalance(),
			'closingBalance' => $this->getClosingBalance(),
			'dateFrom' => $this->getDateFrom(),
			'dateTo' => $this->getDateTo(),
			'yearList' => $this->getYearList(),
			'listId' => $this->getListId(),
			'fromId' => $this->getFromId(),
			'toId' => $this->getToId(),
			'lastDownloadId' => $this->getLastDownloadId(),
		);
		return $info;
	}
}
