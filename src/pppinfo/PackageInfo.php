<?php 
namespace pppinfo;

use pppinfo\WSSoapClient;

class PackageInfo
{
	
	protected $header = ['Username' => 'sledzeniepp', 'Password' => 'PPSA', 'passwordType' => 'PasswordText'];
	
    public function hello($name) : string
    {
		$header = $this->header;
		try {
			$wsclient = new WSSoapClient("https://tt.poczta-polska.pl/Sledzenie/services/Sledzenie?wsdl",['connection_timeout' => 10800,'cache_wsdl' => WSDL_CACHE_NONE]);
			$wsclient->__setUserNameToken($header['Username'],$header['Password'],$header['passwordType']);
			$hello = $wsclient->witaj(['imie' => $name])->return;
			
		} catch(Exception $e) {
			$hello = $e;
			
		}
        return $hello;
    }
	
	
	public function addChecksum(int $packageNumber) : int
	{
		if(strlen((string)$packageNumber)!=8) {
			return 0;
		}
			$mnozniki = [8,6,4,2,3,5,9,7];
			$spn = str_split($packageNumber);
			$sum = 0;
			$ck = 0;
			foreach($spn as $ix => $pn) {
				$suma += $spn[$ix]*$mnozniki[$ix];
			}
			
			$reszta = $suma%11;
			
			switch($reszta) {
				case 0: { $ck = 5; break;}
				case 1: { $ck = 0; break;}
				default: { $ck = 11 - $reszta; break;}
			}
			$packageNumber .= $ck;
		return (int) $packageNumber;
	}
	
	public function getPackageStatus(string $packageNumber) : int 
	{
		$header = $this->header;
		$wsclient = new WSSoapClient("https://tt.poczta-polska.pl/Sledzenie/services/Sledzenie?wsdl",['connection_timeout' => 10800,'cache_wsdl' => WSDL_CACHE_NONE]);
		$wsclient->__setUserNameToken($header['Username'],$header['Password'],$header['passwordType']);		
		$przesylka = (array) ($wsclient->sprawdzPrzesylke(['numer' => $packageNumber])->return);
		return $przesylka['status'];
	}
	
	public function getPackageInfo(string $packageNumber) : array
	{
		
		$header = $this->header;
		$wsclient = new WSSoapClient("https://tt.poczta-polska.pl/Sledzenie/services/Sledzenie?wsdl",['connection_timeout' => 10800,'cache_wsdl' => WSDL_CACHE_NONE]);
		$wsclient->__setUserNameToken($header['Username'],$header['Password'],$header['passwordType']);			
		$przesylka = (array) ($wsclient->sprawdzPrzesylke(['numer' => $packageNumber])->return);
		return $przesylka;
	}
}