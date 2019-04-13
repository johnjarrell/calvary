<?php

$jj = Date('Y/m/d');
require_once('db/dbcon.php');
if (!$con){
	die('Could not connect: ' . mysql_error());
}else{
	mysql_select_db("calvarybc", $con);

	$todayMinus12 = date('Y-m-d', strtotime("-1 year"));

	$per_page = 12;
	$pages_query = mysql_query("SELECT COUNT('id') FROM sermons WHERE serm_date1 > '$todayMinus12'");

	$pages = ceil(mysql_result($pages_query, 0) / $per_page);

	$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

	$start = ($page - 1) * $per_page;


	if (!$result = mysql_query("SELECT * FROM sermons WHERE serm_date1 > '$todayMinus12' ORDER BY serm_date1 DESC, ampm DESC LIMIT $start, $per_page")){
		die(mysql_error());
	};

	echo "<table class='table table-responsive table-stripped'>
        <tr>
        <th>Date</th>
        <th>Title / Link</th>
        <th>Scripture / Speaker</th>
        </tr>";

	while($row = mysql_fetch_array($result))
	{

		echo "<tr>";
		echo "<td>" . $row['serm_date'] . "   " . $row['time'] . "   " . $row['ampm'] . "</td>";
		echo "<td><strong><p><a href='" . $row['link'] . "' target='_blank'>" . $row['title'] . "</p><button type='button' class='btn btn-default btn-lg'>Listen</button></a></strong><a href='" . $row['link'] . "' target='_blank'><button type='button' class='btn btn-default btn-lg'> Or Download</button></a></td>";
		echo "<td>" . $row['scripture'] . "<br>" . $row['spkr'] . "</td>";
		echo "</tr>";

	}


	echo "</table>";

	$prev = $page - 1;
	$next = $page + 1;

	echo "<center>";
	/*
       * Centering the text
       */

	if (!($page <= 1)) {
		/*
         * If the page number is not less or equal than 1
         * Meaning there is a lower page that the one the User's on
         */
		echo "<a href='listen.php?page=$prev'>Prev</a> ";
		/*
         * Create a link for the previous page
         */
	}

	if ($pages >= 1 && $page <= $pages) {
		/*
         * If the number of pages is bigger or equal to one and the page the User
         * is on is lower or equal than the number or pages
         */

		for ($x = 1; $x <= $pages; $x++) {
			/*
           * This for will create a link for each page. For example, there is 
           * 5 pages ($pages = 5). The variable x will increase from 1 to 5
           */
			echo ($x == $page) ? '<strong><a href="listen.php?page=' . $x . '">' . $x . '</a></strong> ' : '<a href="listen.php?page=' . $x . '">' . $x . '</a> ';
			/*
           * For each value of $x, create a link to pageX, and if $x is the page
           * the User's on, then the link will be in Bold
           */
		} // End of for loop
	} // End of if

	if (!($page >= $pages)) {
		/*
         * If the page number the User's on isn't bigger or equal the number of 
         * total pages, then creates a Next Page link.
         */
		echo "<a href='listen.php?page=$next'>Next</a>";
	}

	echo "</center>";

	mysql_close($con);
}

?>