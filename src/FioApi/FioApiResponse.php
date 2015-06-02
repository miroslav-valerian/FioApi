<?php

/**
 * 
 * @author Ing. Miroslav Valerian
 */

namespace Valerian\FioApi;

use \SimpleXMLElement;

class FioApiResponse
{
	private $xml;
	private $parser;
	
	public function __construct($xml)
	{
		$this->xml = $xml;
		$this->parse();	
	}
	
	public function getXml()
	{
		return $this->xml;
	}
	
	public function getHeader()
	{
		$header = new FioApiHeader($this->parser->Info);
		return $header; 	
	}
	
	
	public function getTransactions()
	{
		$transactions = $this->parser->TransactionList;
		$trans = array();
		if ($transactions) {
			foreach ($transactions->Transaction as $transaction) {
				$trans[] = new FioApiTransaction($transaction);
			}
		}
		return $trans;
	}
	
	private function parse()
	{
		$this->parser = new SimpleXMLElement($this->xml);
	}
}
