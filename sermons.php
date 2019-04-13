<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.8.1, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.8.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/calvary-logo-133x128.jpg" type="image/x-icon">
  <meta name="description" content="Site Builder Description">
  <title>Sermons</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&subset=cyrillic,latin,greek,vietnamese">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/soundcloud-plugin/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>

<!-- Google Analytics -->
<meta name="google-site-verification" content="8uwj4nkZBSs6uSVE5dq3EvVvAFDLJRqaaGSRDUvWMcw" />
    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
      _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
      _paq.push(["setCookieDomain", "*.example.org"]);
      _paq.push(["setDomains", ["*.example.org"]]);
      _paq.push(["trackPageView"]);
      _paq.push(["enableLinkTracking"]);

      (function() {
        var u=(("https:" == document.location.protocol) ? "https" : "http") + "://www.petalcbc.org/stats2/";
        _paq.push(["setTrackerUrl", u+"piwik.php"]);
        _paq.push(["setSiteId", "1"]);
        var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
        g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
      })();
    </script>
  <!-- End Piwik Code -->
<!-- /Google Analytics -->


  <section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse" id="ext_menu-u" data-rv-view="69">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
											<span class="mbr-brand__logo"><a href="http://petalcbc.org"><img src="assets/images/calvary-logo-133x128.jpg" class="mbr-navbar__brand-img mbr-brand__img" alt="Mobirise"></a></span>
											<span class="mbr-brand__name"><a class="mbr-brand__name text-white" href="http://petalcbc.org">PETALCBC.ORG</a></span>
                    </span>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column">
													<ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active mbr-buttons--only-links"><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="index.html">HOME</a></li><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="about.html#msg-box5-a">ABOUT</a></li><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="contact.html">CONTACT</a></li><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="services.html">SERVICES</a></li></ul>                            
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

	
	
	<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background mbr-after-navbar" id="header4-1" data-rv-view="2" style="background-image: url(assets/images/bg.jpg);">
		<div class="mbr-box__magnet mbr-box__magnet--sm-padding mbr-box__magnet--center-center">

			<div class="mbr-box__container mbr-section__container container">
				<div class="mbr-box mbr-box--stretched"><div class="mbr-box__magnet mbr-box__magnet--center-center">
					<div class="row"><div class=" col-sm-8 col-sm-offset-2">
						<div class="mbr-hero animated fadeInUp">
							<h3>Listen now or download and listen at your convenience.</h3>
							<?php 

							if (isset($_GET['y'])) {

								$year = $_GET['y'];

								$begin = date("$year-01-01");
								$ending = date("$year-12-31");

								$jj = Date('Y/m/d');
								require_once('db/dbcon.php');
								if (!$con){
									die('Could not connect: ' . mysql_error());
								}else{
									mysql_select_db("calvarybc", $con);

									//$todayMinus12 = date('Y-m-d', strtotime("-1 year"));

									$per_page = 12;
									$pages_query = mysql_query("SELECT COUNT('id') FROM sermons WHERE serm_date1 >= '$begin' AND serm_date1 <= '$ending'");

									$pages = ceil(mysql_result($pages_query, 0) / $per_page);

									$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

									$start = ($page - 1) * $per_page;


									if (!$result = mysql_query("SELECT * FROM sermons WHERE serm_date1 >= '$begin' AND serm_date1 <= '$ending' ORDER BY serm_date1 DESC, ampm DESC LIMIT $start, $per_page")){
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
											echo ($x == $page) ? '<strong><a href="listen.php?y='.$year.'&page=' . $x . '">' . $x . '</a></strong> ' : '<a href="listen.php?y='.$year.'&page=' . $x . '">' . $x . '</a> ';
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

							} else {

								include"includes/listenDefault.php";

							} 
							?>
						</div>
						</div></div>
					</div></div>
			</div>
		</div>
	</section>

<footer class="mbr-section mbr-section--relative mbr-section--fixed-size mbr-after-navbar" id="footer1-v" data-rv-view="71" style="background-color: rgb(68, 68, 68);">
    
    <div class="mbr-section__container container">
        <div class="mbr-footer mbr-footer--wysiwyg row" style="padding-top: 36.9px; padding-bottom: 36.9px;">
            <div class="col-sm-12">
                <p class="mbr-footer__copyright">Copyright (c) 2018 Calvary Baptist Church Petal MS.</p>
            </div>
        </div>
    </div>
</footer>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/mobirise/js/script.js"></script>
  
  
</body>
</html>