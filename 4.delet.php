<?php
require('dbconfig.php');
$id=(int)$_GET['id'];
if ($id <=0) {
	echo "error!! empty ID";
	exit(0);
}

    $sql = "delete from todo where id=?"; // 刪除選到的項目
    $stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
    mysqli_stmt_bind_param($stmt, "i", $id); //綁定參數到變數 $id 上, 型態為 i (integer)
    mysqli_stmt_execute($stmt); //執行SQL

    echo "this job $id had been deleted" // 顯示刪除的id
?>
<hr>
<button onClick="loadURL('2.list.php')">查看</button>