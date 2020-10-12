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

	function __construct($APIKey) {
		$this->APIKey = $APIKey;
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

	function getDNSHistory($domain, $record_type) {
		
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

	function getIPWhois($ip_address) {
		
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

}
?>
