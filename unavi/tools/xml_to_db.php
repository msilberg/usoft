<?php
public function export_map()
	{
		$i=0;
		foreach (service::stores() as $key=>$val)
		{
			foreach ($val as $fval)
			{
				if (gettype($fval['area'])=="string")
				{
					$arr[$i]['id']=$fval['id'];
					$arr[$i]['lev']=current(db::lev_of_store($fval['id']));
					$arr[$i]['area']=$fval['area'];
					$arr[$i]['coord_ox']=$fval['textCoords'][0];
					$arr[$i]['coord_oy']=$fval['textCoords'][1];
					$arr[$i]['size']=$fval['textAttr']['font-size'];
					$arr[$i]['rotate']=$fval['textRotate'];
					$arr[$i]['break']=$fval['break'];
				}
				elseif (gettype($fval['area'])=="array")
				{
					for ($j=0;$j<count($fval['area']);$j++)
					{
						$arr[$i]['id']=$fval['id'];
						$arr[$i]['lev']=current(db::lev_of_store($fval['id']));
						$arr[$i]['area']=$fval['area'][$j];
						$arr[$i]['coord_ox']=$fval['textCoords'][$j][0];
						$arr[$i]['coord_oy']=$fval['textCoords'][$j][1];
						$arr[$i]['size']=$fval['textAttr'][$j]['font-size'];
						$arr[$i]['rotate']=$fval['textRotate'][$j];
						$arr[$i++]['break']=$fval['break'];
					}
				}
				$i++;
			}
		}
		foreach ($arr as $val) db::insert_map_stores($val);
	}

protected function insert_map_stores($arr)
	{
		mysql_query("INSERT INTO map_object(store_id,level_id,area,tcoord_ox,tcoord_oy,tsize,trotate,tbreak)
			VALUES('".$arr['id']."','".$arr['lev']."','".$arr['area']."','".$arr['coord_ox']."','".$arr['coord_oy']."','".$arr['size']."','".$arr['rotate']."','".$arr['break']."')");
	}
?>
