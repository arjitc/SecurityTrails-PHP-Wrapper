<?php
/**
 * USAGE
 * require 'securitytrails.php';
 * $securitytrails = new SecurityTrails("YOUR_API_KEY_HERE");
 * $output = $securitytrails->getDomain("apple.com");
 * var_dump($output);
**/
class SecurityTrails {

	private $APIKey;
	public $domain;
	public $record_type;
	public $ip_address;
	public $start_time;
	public $end_time;
	public $include_subdomains;
	public $status;
	public $page_number;

	function __construct($APIKey) {
		$this->APIKey = $APIKey;
	}

	function checkPing() {
		
		$ch = curl_init('https://api.securitytrails.com/v1/ping/');
		$headers = array(
			'apikey:'.$this->APIKey
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function checkUsage() {
		
		$ch = curl_init('https://api.securitytrails.com/v1/account/usage/');
		$headers = array(
			'apikey:'.$this->APIKey
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getCompanyDetails($domain) {
		
		$ch = curl_init('https://api.securitytrails.com/v1/company/'.$domain);
		$headers = array(
			'apikey:'.$this->APIKey
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getCompanyAssociatedIPs($domain) {
		
		$ch = curl_init('https://api.securitytrails.com/v1/company/'.$domain.'/associated-ips');
		$headers = array(
			'apikey:'.$this->APIKey
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getDomain($domain) {
		
		$ch = curl_init('https://api.securitytrails.com/v1/domain/'.$domain);
		$headers = array(
			'apikey:'.$this->APIKey
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getDomainTags($domain) {
		
		$ch = curl_init('https://api.securitytrails.com/v1/domain/'.$domain.'/tags');
		$headers = array(
			'apikey:'.$this->APIKey,
			'accept: application/json'
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getSubDomain($domain) {
		
		$ch = curl_init('https://api.securitytrails.com/v1/domain/'.$domain.'/subdomains?children_only=false');
		$headers = array(
			'apikey:'.$this->APIKey
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getDomainWHOIS($domain) {
		
		$ch = curl_init('https://api.securitytrails.com/v1/domain/'.$domain.'/whois');
		$headers = array(
			'apikey:'.$this->APIKey
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getSSLCertificatesPages($domain, $include_subdomains, $status, $page_number) {
		
		$ch = curl_init('https://api.securitytrails.com/v1/domain/'.$domain.'/ssl?include_subdomains='.$include_subdomains.'&status='.$status.'&page='.$page_number);
		$headers = array(
			'apikey:'.$this->APIKey,
			'accept: application/json'
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getSSLCertificatesStream($domain, $include_subdomains, $status) {
		
		$ch = curl_init('https://api.securitytrails.com/v1/domain/'.$domain.'/ssl_stream?include_subdomains='.$include_subdomains.'&status='.$status);
		$headers = array(
			'apikey:'.$this->APIKey,
			'accept: application/json'
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getAssociatedDomains($domain) {
		
		$ch = curl_init('https://api.securitytrails.com/v1/domain/'.$domain.'/associated');
		$headers = array(
			'apikey:'.$this->APIKey
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getDNSHistory($domain, $record_type) {

		$record_type = strtolower($record_type);
		
		$ch = curl_init('https://api.securitytrails.com/v1/history/'.$domain.'/dns/'.$record_type);
		$headers = array(
			'apikey:'.$this->APIKey
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getWHOISHistory($domain) {
		
		$ch = curl_init('https://api.securitytrails.com/v1/history/'.$domain.'/whois');
		$headers = array(
			'apikey:'.$this->APIKey
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getIPNeighbors($ip_address) {
		
		$ch = curl_init('https://api.securitytrails.com/v1/ips/nearby/'.$ip_address);
		$headers = array(
			'apikey:'.$this->APIKey
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getIPWHOIS($ip_address) {
		
		$ch = curl_init('https://api.securitytrails.com/v1/ips/nearby/'.$ip_address.'/whois');
		$headers = array(
			'apikey:'.$this->APIKey
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getIPUseragents($ip_address) {
		
		$ch = curl_init('https://api.securitytrails.com/v1/ips/nearby/'.$ip_address.'/useragents?page=1');
		$headers = array(
			'apikey:'.$this->APIKey
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

	function getFirehoseCertificateTransparency($start_time, $end_time) {
		
		$ch = curl_init('https://api.securitytrails.com/v1/firehose/ct-logs?start='.$start.'&end='.$end);
		$headers = array(
			'apikey:'.$this->APIKey
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch); // execute!
		curl_close($ch); // close the connection, release resources used
		
		return $response; // return result
		
	}

}
?>