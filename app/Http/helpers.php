<?php
// My common functions


function imagePath($path)
{
    if(file_exists($path.'.png')){
		return $path.'.png';
	}else{
		return $path.'.jpg';
	}
}
function encodeUrlRoute($string)
{
    return str_replace(' ','-',$string);
}
function decodeUrlRoute($string)
{
    return str_replace('-',' ',$string);
}
function getAllFile($store_name,$pid)
{
	
	$dir = 'assets/img/store/'.$pid.'/product/'.$store_name;
	if (!file_exists($dir)) {
		mkdir($dir, 0777, true);
	}
	 $listFiles=[];
	   $files = \File::files($dir);
	   foreach($files as $path)
		 {
			
			 $listFiles[] = pathinfo($path);
		 }
		 
	return json_encode($listFiles);
}
function getSingleImageProduct($pid,$store_name)
{
	$dir = 'assets/img/store/'.$store_name.'/product/'.$pid;
	if (!file_exists($dir)) {
		mkdir($dir, 0777, true);
	}
	$listFiles=[];
	$files = \File::files($dir);
	foreach($files as $path)
	{
		 $listFiles[] = pathinfo($path);
	} 
	$count=0;
	foreach( $listFiles as $prodpath)
	{
		if($count==0){
			$dirname=$prodpath['dirname'];
			$basename=$prodpath['basename'];
		}
		$count++;
	}
	if($count>0){
		return $dirname.'/'.$basename;
	}else{
		return 'assets/img/noimage.png';
	}
}
function getStoreBanner($store_name)
{
	$dir = 'assets/img/store/'.$store_name.'/banner';
	if (!file_exists($dir)) {
		mkdir($dir, 0777, true);
	}
	$listFiles=[];
	$files = \File::files($dir);
	foreach($files as $path)
	{
		 $listFiles[] = pathinfo($path);
	} 
	$count=0;
	foreach( $listFiles as $prodpath)
	{
		if($count==0){
			$dirname=$prodpath['dirname'];
			$basename=$prodpath['basename'];
		}
		$count++;
	}
	if($count>0){
		return $dirname.'/'.$basename;
	}else{
		return 'assets/img/nobanner.png';
	}
}	
function cartData(){
			$cart = new Anam\Phpcart\Cart();
			$cart_data = array();
			$items = $cart->getItems();
			$itemsCount = $cart->count();
			$itemsQuantityCount = $cart->totalQuantity();
			$itemsTotalPrice = $cart->getTotal();
			$cart_data['datas1'] = $items;
			$cart_data['datas2'] = $itemsCount;
			$cart_data['datas3'] = $itemsQuantityCount;
			$cart_data['datas4'] = $itemsTotalPrice;
			return $cart_data;
}		
?>