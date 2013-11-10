<?php
//九九乘法表
class multi{

	//数字To中文
	function toZw($num){
		switch ($num) {
			case '1':
			    $out="一";
				break;
			case '2':
			    $out="二";
				break;
			case '3':
			    $out="三";
				break;
			case '4':
			    $out="四";
				break;
			case '5':
			    $out="五";
				break;
			case '6':
			    $out="六";
				break;
			case '7':
			    $out="七";
				break;
			case '8':
			    $out="八";
				break;
			case '9':
			    $out="九";
				break;
			default:
				$out="";
				break;
		}
		return $out;
	}
	
	//转换
	function format_out($in){
		$fir = substr($in, 0, 1);
		$sec = substr($in, 1, 1);
		$thr = $fir * $sec;
		$out = $this->toZw($fir).$this->toZw($sec);
		if($thr<10){
			$out .= "得".$this->toZw($thr);
		}else{
			$out .= $this->toZw(substr($thr, 0 ,1))."十".$this->toZw(substr($thr, 1 ,1));
		}
		return $out;
	}
	
	//输出乘法表并转换
	function print_99(){
			for($i=1;$i<=9;$i++){
				for($j=1;$j<=$i;$j++){
					echo $this->format_out($j.$i)." ";
				}
				echo '<br>';
			}
		}
}

$multi =  new multi();
$multi -> print_99();



echo "--------------------------------<br>";
//斐波那契
class fabo{

	//递归- -!!
	function fb($raw){
		if($raw==0)return 0;
		if($raw==1)return 1;
		if($raw>1)return $this->fb($raw-1) + $this->fb($raw-2);
			die("num error");
	}

	function fbOut($raw){
		return $this->fb($raw)."<br>";
	}
}

$fabo = new fabo();
echo $fabo -> fbOut(6);
echo $fabo -> fbOut(10);



echo "--------------------------------<br>";
//1!到n!的和
class n{

	//递归- -!!
	function jc($i){
		if($i==0||$i==1)return 1;
		return $i*$this->jc($i-1);
	}

	//加起来
	function epxl($i){
		for($j=1;$j<=$i;$j++){
			$out+=$this->jc($j);
		}
		return $out.'<br>';
	}
}

$n = new n();
echo $n->epxl(3);
echo $n->epxl(6);



echo "--------------------------------<br>";
//二元一次方程组
class jfc{
	var $a;
	var $b;
	var $c;
	var $dlt;

	function __construct($a, $b, $c){
		$this->a = $a;
		$this->b = $b;
		$this->c = $c;
		$this->dlt = $b*$b-4*$a*$c;
	}

	//通式解方程
	function j(){
		if($this->dlt<0){
			echo "无解<br>";
		}else{
			return Array((sqrt($this->dlt)-$this->b)/(2*$this->a),(-sqrt($this->dlt)-$this->b)/(2*$this->a));
		}
	}

	//浮点输出
	function format(){
		$o = $this->j();
		if($o){
			if($o[0]==$o[1])return "x1=x2=".$o[0].'<br>';
			return "x1=".$o[0].'<br>'."x2=".$o[1].'<br>';
		}
	}

	//分数输出
	function formatRaw(){
		$o = $this->j();
		if($o){	
			$m = 2*$this->a;
			if($this->b<0){
				$this->b= -$this->b;
				$q = Array("($this->b+√$this->dlt)/$m","($this->b-√$this->dlt)/$m");
			}else{
			$q = Array("(-$this->b+√$this->dlt)/$m","(-$this->b-√$this->dlt)/$m");
			}
			if($o[0]==$o[1]){
				return "*x1=x2=".$q[0].'<br>';
			}
			return "*x1=".$q[0].'<br>'."*x2=".$q[1].'<br>';
		}
	}

	//判断是否为整数
	function isInt($num){
		if($num-floor($num)==0)return true;
		return false;
	}

	//判断并选择输出类型
	function calc(){
		if($this->isInt(sqrt($this->dlt)))return $this->format();
		return $this->formatRaw();
	}
}//问题有点多.....

$fc1 = new jfc(1,1,-5);
echo $fc1->calc();
echo '-<br>';
$fc2 = new jfc(6,13,-89);
echo $fc2->calc();
 



