<?php

/**
 * 
 * @author Ing. Miroslav Valerian
 */

namespace Valerian\FioApi;

use DateTime;
use Valerian\Curl\Request;

class FioApiRequest
{
	private $token;
	private $format = 'xml';
	
	private $apiUrl = 'https://www.fio.cz/ib_api/rest/';
	 
	const XML = 'xml';
	
	public function __construct($token)
	{
		$this->token = $token;
		$this->format = self::XML;	
	}
	
	public function getToken()
	{
		return $this->token;
	}
	
    public function getFormat()
	{
		return $this->format;
	}
	
    /**
	 * Oficiální výpisy pohybů z účtu.
	 * @return FioApiResponse
	 **/
    public function getTransactionsById($id, $year = NULL) 
	{
		 if ($year === NULL) {
		 	$year = date('Y');
		 }
		 $url = $this->apiUrl . 'by-id/' . $this->getToken() . '/' . $year . '/' . $id . '/transactions.'.$this->getFormat();
		return $this->download($url);
	}
	
	/**
	 * Pohyby na účtu za určené období.
	 * @return FioApiResponse
	 **/
	public function getTransactionsByDate($dateFrom = '-1 month', $dateTo = 'now') 
	{
		$from = new DateTime($dateFrom);
		$from = $from->format('Y-m-d');
		$to = new DateTime($dateTo);
		$to = $to->format('Y-m-d');
        $url = $this->apiUrl . 'periods/' . $this->getToken() . '/' . $from . '/' . $to . '/transactions.'.$this->getFormat();
		return $this->download($url);
	}
	
	/**
	 * Pohyby na účtu od posledního stažení.
	 * @return FioApiResponse
	 **/
	public function getTransactionsLast() 
	{
		$url = $this->apiUrl . 'last/' . $this->getToken() . '/transactions.'.$this->getFormat();
		return $this->download($url);
	}
 
	private function download($url)
	{
		$request = new Request($url);
		$response = $request->get();
		$response = new FioApiResponse($response->getResponse());
		return $response;
	}
}
