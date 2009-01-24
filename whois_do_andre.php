<?php
/** 
 * Whois do Andre is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Whois do Andre is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PerlPanel; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * Copyright: (C) 2003-2004 Andre Osti de Moura <andreoandre@gmail.com>
 *
 * $Id: Whois do Andre,v 1.0 2007/01/11 21:10:57 Andre Osti de Moura $
 *
 */
class dominio {
	public $whois_br;
	public $whois_inter;
	public $site;	
	public $domain;

public	function checa_dominio($dominio) {
		
		$dominio = ereg_replace("www|www.|http:\/\/www.|http:\/\/","", $dominio);	
	
		if(ereg(".br",$dominio)) {
			$this->whois_br = $dominio;
			$this->domain = $dominio;
		} else {
			$this->whois_inter = $dominio;
			$this->domain = $dominio;
		}
	}

public	function whois() {
	if (isset($this->whois_br)) {
		 $this->site = "whois.registro.br";				
	} else {
		 $this->site = "whois.internic.net";
	}
	
	$socket = fsockopen($this->site, 43, $errno, $errstr, 30);

	if(!$socket) {
	 echo "Erro ao executar a busca" . $errno . $errstr . "<br />\n";
	}else {
	fwrite($socket, "$this->domain\r\n");
	 while(!feof($socket)) {
	    $recv .= fgets($socket, 428);
	 }		
	$recv = ereg_replace("\n","<br />",$recv);
	echo $recv;
	fclose($socket);
	}
	
	}
}

/* Exemplo de como acessar a busca de whois 
 * $var = new dominio;
 * $var->checa_dominio("google.com.br");
 * $var->whois();
 */
?>
