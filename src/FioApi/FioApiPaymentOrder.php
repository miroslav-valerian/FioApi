<?php

/**
 * 
 * @author Ing. Miroslav Valerian
 */

namespace Valerian\FioApi;

class FioApiPaymentOrder
{
	const PAYMENT_TYPE_STANDARD = 431001;
	const PAYMENT_TYPE_FASTER = 431004;
	const PAYMENT_TYPE_PRIORITY = 431005;
	const PAYMENT_TYPE_DIRECT_DEBIT = 431022;
	
	protected $transactions = array();
	
	private $token;
	private $format;
	
	private $apiUrl = 'https://www.fio.cz/ib_api/rest/import/';
	
	public function __construct($token)
	{
		$this->token = $token;
		$this->format = FioApiRequest::XML;	
	}
	
	public function addTransaction(FioApiPaymentOrderTransaction $transaction)
	{
		$this->transactions[] = $transaction;
		return $this;
	}
	
	public function getTransactions()
	{
		return $this->transactions;
	}
	
	public function sendPayments()
	{
		$xml = $this->getXml();
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->apiUrl); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
		
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_POST, 0);
		curl_setopt($curl, CURLOPT_VERBOSE, 0);
		
		curl_setopt($curl, CURLOPT_TIMEOUT, 60);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data; charset=utf-8;'));
		
		$postfields = array("file" => $xml, "filename" => 'file.xml');
        
		$post = array(
			'type' => $this->format,
			'token' => $this->token,
			'lng' => 'cs',
			'file' => $postfields
        );
		
		$post = http_build_query($post);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
		$head = curl_exec($curl); 
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); 
        
		curl_close($curl); 
			
        print_R($head);
		die();
		
		return $response;
	}
	
	private function getXml()
	{
		$xml = '<?xml version="1.0" encoding="UTF-8"?>';
		$xml .= '<Import xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.fio.cz/schema/importIB.xsd">';
		$xml .= '<Orders>';
		if ($this->getTransactions()) {
			$xml .= '<DomesticTransaction>';
			foreach ($this->getTransactions() as $transaction) {
				$xml .= '<accountFrom>1234562</accountFrom>';
				$xml .= '<currency>CZK</currency>';
				$xml .= '<amount>10</amount>';
				$xml .= '<accountTo>670100-2206579088</accountTo>';
				$xml .= '<bankCode>6210</bankCode>';
				$xml .= '<ks>1234</ks>';
				$xml .= '<vs>1234562</vs>';
				$xml .= '<ss>1234562</ss>';
				$xml .= '<date>2013-04-25</date>';
				$xml .= '<messageForRecipient>' . $transaction->getMessageForRecipient() . '</messageForRecipient>';
				$xml .= '<comment>' . $transaction->getComment() . '</comment>';
				$xml .= '<paymentType>' . $transaction->getPaymentType() . '</paymentType>';
				
			}
			$xml .= '</DomesticTransaction>';
		}
		
		$xml .= '</Orders>'; 
		$xml .= '</Import>';
		return $xml;
	}
}
