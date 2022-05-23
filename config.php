<?php

function rupiah($value){
	$converted = "Rp " . number_format($value,0,',','.');
	return $converted;
}