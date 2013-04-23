<?php

class Mdl_skripsi extends CI_Model {
	
	//fungsi di model untuk memanggil API berjenis REST
	function get_api($url, $output='json', $postorget='GET', $parameter){	
		$api_url = 'http://localhost/apisia/sia_public/'.$url.'/'.$output;
		$hasil = null;
		if ($postorget == 'POST'){
			$hasil = $this->curl->simple_post($api_url, $parameter);
		} else {
			$hasil = $this->curl->simple_get($api_url);
		}
		return json_decode($hasil, TRUE);
	}
			
}
?>
