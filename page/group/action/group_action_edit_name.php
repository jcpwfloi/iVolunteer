<?
	include ("../../../include/basic_functions.php");
	
	include ("../../../include/database_info.php");
	
	$con = mysql_connect ($DB_Where, $DB_UName, $DB_PWord);
	
	mysql_select_db ("dilutedream_ivolunteer_ultimate", $con);
	
	include ("../../../include/check_authority.php");
	
	if (HaveAuthority ("./page/group/action/*")) {
		$G_id = $_GET ["id"];
		$G_name = $_POST ["name"];
		
		mysql_query ("UPDATE groups SET name = '$G_name' WHERE id = $G_id");
		
		header ("Location: ../../../group.php?id=$G_id"); 
	} else
		CheckAuthority ("./page/group/action/*");
	
	mysql_close ($con);
?>