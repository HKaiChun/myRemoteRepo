<p>Todo list</p>
<hr />
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>Job</td>
    <td>Urgent</td>
    <td>Job Content</td>
    <td>Revise</td>
    <td>Cancel</td>
    <td>State</td>
  </tr>
<?php
require("dbconfig.php");
$sql = "select * from todo where jobState='未完成';";
$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
mysqli_stmt_execute($stmt); //執行SQL
$result = mysqli_stmt_get_result($stmt); //取得查詢結果

while (	$rs = mysqli_fetch_assoc($result)) { //用迴圈逐筆取出

  echo "<tr><td>" , $rs['id'] ,
  "</td><td>" , $rs['jobName'],
  "</td><td>" , $rs['jobUrgent'], 
  "</td><td>", $rs['jobContent'],
  // "</td><td><a href='3.editUI.php?id=",$rs['id'] ,"'>edit</a>",
  // "</td><td><a href='4.delet.php?id=",$rs['id'] ,"'>delet</a>",
  "</td><td><button onClick=\"updateme(", ($rs['id']), ")\">edit</button>",
  "</td><td><button onClick=\"deleteme(", ($rs['id']), ")\">delete</button>",
  "</td><td>", $rs['jobState'],



  "</td></tr>";
}
?>
</table>
