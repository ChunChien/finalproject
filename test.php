<html>

<script>
department=new Array();
department[0]=["屏東基督教醫院", "寶健醫院","國仁醫院"];
department[1]=["高雄榮民總醫院","長庚醫院","義大醫院"];
department[2]=["成功大學醫學院","新樓醫院","郭綜合醫院"];

function renew(index){
	for(var i=0;i<department[index].length;i++)
		document.myForm.member.options[i]=new Option(department[index][i], department[index][i]);	// 設定新選項
	document.myForm.member.length=department[index].length;	// 刪除多餘的選項
}
</script>

<form action="" name="myForm" method="post">
縣市：
<select name="county" onChange="renew(this.selectedIndex);">
	<option value="Pingtung">屏東縣
	<option value="Kaohsiung">高雄市
	<option value="Tainan">台南市
</select>

就診醫院：
<select name="member">
	<option value= department[index][i] >請由左方選取縣市
</select>
<input type="submit">
</form>

 

<?php
if (isset($_POST["member"])){
    echo $_POST["member"];
}else{
    echo "0";

}

?>
</html>