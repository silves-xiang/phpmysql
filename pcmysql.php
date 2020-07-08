<?php

use function PHPSTORM_META\type;

class pcmysql{
	function __construct($host,$user,$pawd=''){
		$this->host=$host;
		$this->user=$user;
		$this->pawd=$pawd;
		$this->result = mysqli_connect($this->host,$this->user,$this->pawd);

	}
	function query($sql){
		return mysqli_query($this->result,$sql);
	}
	function usedata($databasename){
		$sql='use '.$databasename;
		return $this->query($sql);
	}
	function getall($tablename){
		$sql='select * from '.$tablename;
		return $this->query($sql);
	}
	function perdata($tablename,$nownum=1,$pernum=5){
		$sql="select * from ".$tablename." limit ".(($nownum-1)*$pernum). ",".$pernum;
		return $this->query($sql);
	}
	function fdata($tablename,$filed,$filter){
		$sql='select * from '.$tablename.' where '.$filed."='".$filter."'";
		return $this->query($sql);
	}
	function delete($tablename,$filed,$filter){
		$sql='delete from '.$tablename." where ".$filed."='".$filter."'";
		return $this->query($sql);
	}
	function insert($tablename,$dict){
		foreach($dict as $key=>$value){
			$keys[]=$key;
			$values[]=$value;
		}
		$field=implode(",",$keys);
		$valuesl=implode("','",$values);
		$sql = 'insert into '.$tablename."(".$field.")"." value('".$valuesl."')";
		$this->query($sql);
	}
	function updata($tablename,$dict,$find){
		foreach($find as $key=>$value){
			$fkey=$key;
			$fvalue=$value;
		}
		$str='';
		foreach($dict as $key=>$value){
			if(gettype($value)=='string'){
				$str.=$key."='".$value."',";
			}else{
				$str.=$key."=".$value.",";
			}
		}
		$str=substr($str,0,strlen($str)-1);
		$ftype=gettype($fvalue);
		if ($ftype=='string'){
			$sql='update '.$tablename." set ".$str." where ".$fkey."='".$fvalue."'";
			$this->query($sql);
		}else{
			$sql='update '.$tablename." set ".$str." where ".$fkey."=".$fvalue;
			$this->query($sql);
		}
	}
	function dfdata($tablename,$filter,$logical='and'){
		$str='';
		foreach($filter as $key=>$value){
			if(gettype($value)=='string'){
				$str.=$key."='".$value."' ".$logical." ";
			}else{
				$str.=$key."=".$value." ".$logical." ";
			}
		}
		$str=substr($str,0,strlen($str)-4);
		$sql='select * from '.$tablename." where ".$str;
		var_dump($sql);
		return $this->query($sql);
	}
	function logical($tablename,$filter,$logic){
		foreach($filter as $key=>$value){
			$fkey=$key;
			$fvalue=$value;
		}
		$ftype=gettype($value);
		if ($ftype=='string'){
			$sql='select * from '.$tablename." where ".$fkey.$logic."'".$fvalue."'";
			return $this->query($sql);
		}else{
			$sql='select * from '.$tablename." where ".$fkey.$logic.$fvalue;
			return $this->query($sql);
		}
	}
	function specifice($tablename,$field){
		$fieds=implode(",",$field);
		$sql='select '.$fieds.' from '.$tablename;
		return $this->query($sql);
	}
	function effectnum(){
		return mysqli_affected_rows($this->result);
	}
	function allupdata($tablename,$arr,$find){
		$sql='desc '.$tablename;
		$fields=$this->query('desc '.$tablename);
		foreach($fields as $value){
			$arrfields[]=$value['Field'];
		}
		$str='';
		for($i=0;$i<sizeof($arrfields);$i++){
			$type=gettype($arr[$i]);
			if($type=='string'){
				$str.=$arrfields[$i]."='".$arr[$i]."',";
			}else{
				$str.=$arrfields[$i]."=".$arr[$i].",";
			}
		}
		$str=substr($str,0,strlen($str)-1);
		foreach($find as $key=>$value){
			$fkey=$key;
			$fvalue=$value;
		}
		if(gettype($fvalue)=='string'){
			$sql='update '.$tablename." set ".$str." where ".$fkey."='".$fvalue."'";
		}else{
			$sql='update '.$tablename." set ".$str." where ".$fkey."=".$fvalue;
		}
		return $this->query($sql);
	}
}
?>
