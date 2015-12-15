<?php
	$zillow_id = 'X1-ZWz19zkmws96h7_7rj5m'; //the zillow web service ID that you got from your email

	$search = $_GET['address'];
	$citystate = $_GET['citystate'];
	$address = urlencode($search);
	$citystatezip = urlencode($citystate);

	$url = "http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=$zillow_id&address=$address&citystatezip=$citystatezip";

	$result = file_get_contents($url);
	$data = simplexml_load_string($result);
	$zpid = $data->response->results->result[0]->zpid;
	
	// echo ("<script>console.log('GetDeepSearchResults: ".json_encode($data)."');</script>");
	
	//$zpid = urlencode($zpid);
	$url2 = "http://www.zillow.com/webservice/GetUpdatedPropertyDetails.htm?zws-id=$zillow_id&zpid=$zpid";
	$result2 = file_get_contents($url2);
	$data2 = simplexml_load_string($result2);

	echo json_encode(array($data, $data2));
	// echo ("<script>console.log('zpid: ".json_encode($data2)."');</script>");
//echo $zpid;
?>