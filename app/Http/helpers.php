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



?>