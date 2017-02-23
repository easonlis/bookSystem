<?php 
/**
 * 完成记录插入的操作
 * @param string $table
 * @param array $array
 * @return number
 */
function insert($table,$array,$link){
	$keys=join(",",array_keys($array));
	$vals="'".join("','",array_values($array))."'";
	$sql="insert into {$table}($keys) values({$vals})";
	mysqli_query($link,$sql);
	return mysqli_insert_id($link);
}
//update imooc_admin set username='king' where id=1
/**
 * 记录的更新操作
 * @param string $table
 * @param array $array
 * @param string $where
 * @return number
 */
function update($table,$array,$where=null,$link){
    $str=null;
	foreach($array as $key=>$val){
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$val."'";
	}
		$sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
		$result=mysqli_query($link,$sql);
		//var_dump($result);
		//var_dump(mysqli_affected_rows());exit;
		if($result){
			return mysqli_affected_rows($link);
		}else{
			return false;
		}
}

/**
 *	删除记录
 * @param string $table
 * @param string $where
 * @return number
 */
function delete($table,$where=null,$link){
	$where=$where==null?null:" where ".$where;
	$sql="delete from {$table} {$where}";
	mysqli_query($link,$sql);
	return mysqli_affected_rows($link);
}

/**
 *得到指定一条记录
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchOne($sql,$link){
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($result);
	return $row;
}


/**
 * 得到结果集中所有记录 ...
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchAll($sql,$link){
	$result=mysqli_query($link,$sql);
	while(@$row=mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}
	return $rows;
}

/**
 * 得到结果集中的记录条数
 * @param unknown_type $sql
 * @return number
 */
function getResultNum($sql,$link){
	$result=mysqli_query($link,$sql);
	return mysqli_num_rows($result);
}

/**
 * 得到上一步插入记录的ID号
 * @return number
 */
function getInsertId(){
	return mysqli_insert_id();
}
