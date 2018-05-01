<?php
	class MyDB extends SQLite3 // PHP 5.3+
	{
		function __construct()
		{
			$this->open('reniec/solver.db');
		}
	}
	class Reniec
	{
		var $cc;
		var $db;
		function __construct()
		{
			date_default_timezone_set('America/Lima');
			if(!session_id())
			{
				session_start();
				session_cache_limiter('private');
				session_cache_expire(2); // 2 min.
			}
			$this->cc = new cURL();
			$this->db = new MyDB();
			/*
			if(!$db){
				echo $db->lastErrorMsg();
			}
			else{
				echo "success\n";
			}*/
		}

		function GetSession($indice)
		{
			if(isset($_SESSION[$indice]))
			{
				return $_SESSION[$indice];
			}
			return false;
		}

		function PutSession($indice, $valor)
		{
			$_SESSION[$indice] = $valor;
			return true;
		}

		function CodValidacion( $dni )
		{
			if ($dni!="" || strlen($dni) == 8)
			{
				$suma = 0;
				$hash = array(5, 4, 3, 2, 7, 6, 5, 4, 3, 2);
				$suma = 5;
				for( $i=2; $i<10; $i++ )
				{
					$suma += ( $dni[$i-2] * $hash[$i] );
				}
				$entero = (int)($suma/11);

				$digito = 11 - ( $suma - $entero*11);

				if ($digito == 10)
				{
					$digito = 0;
				}
				else if ($digito == 11)
				{
					$digito = 1;
				}
				return $digito;
			}
			return "";
		}

		function DescargaCaptcha($name)
		{
			$ref="https://cel.reniec.gob.pe/valreg/valreg.do";
			$url="https://cel.reniec.gob.pe/valreg/codigo.do";
			$this->cc->setReferer($ref);
			$captcha = $this->cc->send($url);
			if($captcha!=false)
			{
				file_put_contents($name, $captcha);
				return true;
			}
			return false;
		}

		function ProcesaCaptha( $name = "captcha.jpg" )
		{
			$captcha = $this->GetSession("captcha");
			$stime = $this->GetSession("stime");
			if( $captcha!=false && $stime+(2*60) > time() )
			{
				return $captcha;
			}

			$name = dirname(__FILE__)."/".$name;
			if($this->DescargaCaptcha($name))
			{
				$image = @imagecreatefromjpeg($name);
				if($image)
				{
					imagefilter($image, IMG_FILTER_GRAYSCALE);
					imagefilter($image, IMG_FILTER_BRIGHTNESS,100);
					imagefilter($image, IMG_FILTER_NEGATE);
					$L1 = imagecreatetruecolor(25, 20);
					$L2 = imagecreatetruecolor(25, 20);
					$L3 = imagecreatetruecolor(25, 20);
					$L4 = imagecreatetruecolor(25, 20);

					imagecopyresampled($L1, $image, 0, 0, 13, 10, 25, 20, 25, 20);
					imagecopyresampled($L2, $image, 0, 0, 43, 15, 25, 20, 25, 20);
					imagecopyresampled($L3, $image, 0, 0, 76, 10, 25, 20, 25, 20);
					imagecopyresampled($L4, $image, 0, 0, 106,15, 25, 20, 25, 20);

					$query = "SELECT (SELECT Caracter FROM Diccionario WHERE Codigo1='".$this->ConvirteTexto($L1)."') AS c1,(SELECT Caracter FROM Diccionario WHERE Codigo2='".$this->ConvirteTexto($L2)."') AS c2,(SELECT Caracter FROM Diccionario WHERE Codigo3='".$this->ConvirteTexto($L3)."') AS c3,(SELECT Caracter FROM Diccionario WHERE Codigo4='".$this->ConvirteTexto($L4)."') AS c4";

					$rpt = $this->db->query($query);
					if( $row = $rpt->fetchArray(SQLITE3_ASSOC) )
					{
						$this->PutSession("captcha", $row["c1"].$row["c2"].$row["c3"].$row["c4"]);
						$this->PutSession("stime", time());
						return $row["c1"].$row["c2"].$row["c3"].$row["c4"];
					}
				}
			}
			return false;
		}
		function ConvirteTexto($image)
		{
			$rtn="";
			$w = imagesx($image);
			$h = imagesy($image);
			for($y=0; $y<$h;$y++)
			{
				for($x=0; $x<$w;$x++)
				{
					$rgb = imagecolorat($image, $x, $y);
					$r = ($rgb >> 16) & 0xFF;
					$g = ($rgb >> 8) & 0xFF;
					$b = $rgb & 0xFF;
					if((($r+$g+$b)/255) < 1)
					{
						$rtn.="0";
					}
					else
					{
						$rtn.="1";
					}
				}
			}
			return $rtn;
		}

		function BuscaDatosReniec($dni)
		{
			$rtn=array();
			$Captcha = $this->ProcesaCaptha("captcha.jpg");
			if( $dni!="" && strlen( $dni )==8 && $Captcha != false )
			{
				$data = array(
					"accion" => "buscar",
					"nuDni" => $dni,
					"imagen" => $Captcha
				);
				$url = "https://cel.reniec.gob.pe/valreg/valreg.do";
				$this->cc->setReferer($url);
				$Page = $this->cc->send($url, $data);

				$patron='/<td height="63" class="style2" align="center">\r\n[ ]+(.*)\r\n[ ]+(.*)\r\n[ ]+(.*)<br>/';
				$output = preg_match_all($patron, $Page, $matches, PREG_SET_ORDER);
				if( isset($matches[0]) )
				{
					$rtn["Paterno"] = $matches[0][2];
					$rtn["Materno"] = $matches[0][3];
					$rtn["Nombre"]  = $matches[0][1];
				}

				$patron='/<font color=#ff0000>([A-Z0-9]+) <\/font>/';
				$output = preg_match_all($patron, $Page, $matches, PREG_SET_ORDER);
				if( isset($matches[0]) )
				{
					$rtn["DNI"] = $dni;
					$rtn["CodVerificacion"] = trim($matches[0][1]);
				}
				if( count($rtn)>0 )
				{
					return $rtn;
				}
			}
			return false;
		}
		function search( $dni, $inJSON = false )
		{
			$dni = trim($dni);
			if( strlen( $dni )==8 && $dni!="" )
			{
				$result = $this->BuscaDatosReniec($dni);
				if( $result!=false )
				{
					$rtn = array(
						"success"	=> true,
						"result"	=> $result
					);
					return ($inJSON==true)?json_encode($rtn,JSON_PRETTY_PRINT):$rtn;
				}
			}
			$rtn = array(
				"success"=>false,
				"msg"=>"Nro de DNI no valido."
			);
			return ($inJSON==true)?json_encode($rtn,JSON_PRETTY_PRINT):$rtn;
		}
	}
?>
