
<div class="sidebar-nav">
	<div class="navbar navbar-default">
		<ul class="nav nav-pills nav-stacked">
			<li><a href="http://petalcbc.org/listen.php">Last 12 Months</a></li>
			<?php


			$begin = 2013;

			$startdt = date('Y');


			while ($startdt >= $begin) {

				echo "<li><a href='http://petalcbc.org/listen.php?y=$startdt'>Year - $startdt</a></li>";
				$startdt--;

			}

			?>
		
		</ul>
	</div>
</div>