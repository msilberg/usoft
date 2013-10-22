<?php
foreach (db::top10() as $val)
{
	$i=1;
	++$no;
	$crit_null=false;
	$top10=array_shift($val);
	foreach ($val as $sval)
	{
		if (!isset($sval))
		{
			$crit_null=true;
			continue;
		}
		$j=1;
		$date=substr($sval,0,10);
		$time=substr($sval,11);
		switch($i++)
		{
			// beginning date
			case 1:
				$crit_beg=false;
				$next_beg=false;
				foreach (explode("-",$date) as $fval)
				{
					switch ($j)
					{
						case 1:	
							if (intval($fval)<intval(date("Y"))) $crit_beg=true;
							elseif (intval($fval)==intval(date("Y"))) $next_beg=true;
						break;
						case 2:
							if ($next_beg)
							{
								if (intval($fval)!=intval(date("m"))) $next_beg=false;
								if (intval($fval)<intval(date("m"))) $crit_beg=true;
							}
						break;
						case 3:
							if ($next_beg)
							{
								if (intval($fval)!=intval(date("d"))) $next_beg=false;
								if (intval($fval)<intval(date("d"))) $crit_beg=true;
							}
					}
					$j++;
				}
				if ($crit_beg && !$next_beg) break;
				foreach (explode(":",$time) as $fval)
				{
					switch ($j)
					{
						case 4:
							if ($next_beg)
							{
								if (intval($fval)!=intval(date("H"))) $next_beg=false;
								if (intval($fval)<intval(date("H"))) $crit_beg=true;
							}
						break;
						case 5: if ($next_beg && intval($fval)<intval(date("i"))) $crit_beg=true;
					}
					$j++;
				}
			break;
			// end date
			case 2:
				$crit_end=false;
				$next_end=false;
				foreach (explode("-",$date) as $fval)
				{
					switch ($j)
					{
						case 1:	
							if (intval($fval)>intval(date("Y"))) $crit_end=true;
							elseif (intval($fval)==intval(date("Y"))) $next_end=true;
						break;
						case 2:
							if ($next_end)
							{
								if (intval($fval)!=intval(date("m"))) $next_end=false;
								if (intval($fval)>intval(date("m"))) $crit_end=true;
							}
						break;
						case 3:
							if ($next_end)
							{
								if (intval($fval)!=intval(date("d"))) $next_end=false;
								if (intval($fval)>intval(date("d"))) $crit_end=true;
							}
					}
					$j++;
				}
				if ($crit_end && !$next_end) break;
				foreach (explode(":",$time) as $fval)
				{
					switch ($j)
					{
						case 4:
							if ($next_end)
							{
								if (intval($fval)!=intval(date("H"))) $next_end=false;
								if (intval($fval)>intval(date("H"))) $crit_end=true;
							}
						break;
						case 5:	if ($next_end && intval($fval)>intval(date("i"))) $crit_end=true;
					}
					$j++;
				}
		}
	}
	if (($crit_beg && $crit_end) || $crit_null) $arr[$no-1]=$top10;
}
//print_r($arr);
foreach ($arr as $key=>$val) print "<b>$key</b>&nbsp;$val<br/>";
//print date("Y-m-d H:i:s"); //."&nbsp;".date();
?>
