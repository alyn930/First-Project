<form class="form-inline" method = "POST">
<input class="form-control mr-sm-2" type="text" placeholder="Type keyword" aria-label="Search" name = "query" value = "">
<button class="btn btn-outline-dark my-2 my-sm-0" type="submit" name = "search">Go</button>
<?php
{
	$query = "";
	if(isset($_POST["search"]))
	{
		$query = htmlentities(trim($_POST["query"]));
		header("location:searchresult.php?query=$query");
	}
}
?>