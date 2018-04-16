<?php
	include('session.php');
	$devName= $_POST["dev_name"];
	$lead = $_POST["lead"];
    $teamsize = $_POST["team_size"];
    $region= $_POST["region"];
    $oldName = $_POST['oldname'];
    $oldSize = $_POST['oldteam'];
    $oldLead = $_POST['oldlead'];
    $oldRegion = $_POST['oldregion'];
	// Create connection
	$con=gamesConnect();
	// Check connection
	if($oldregion == $region) {
		$region = $oldregion;
	}
	if($oldlead == $lead) {
		$lead = $oldlead;
	}
	if($oldSize == $teamsize){
		$teamsize = $oldSize;
	}
    $sql = "UPDATE DEVELOPER SET  dev_name= '$devName', lead='$lead',team_size ='$teamsize', region= '$region' WHERE dev_name = \"$oldName\"";
    //echo $sql . "<br>";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	} else {
		echo "Success!";
		echo "<a href=\"view_all_dev.php\"> Go back </a> ";
		include('footer.php');
	}

	gamesClose($con);
?>