<!DOCTYPE HTML>

<html>
	<head>
		<title>匯率查詢</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<style>
		table, th, td {
    		border: 2px solid gray;
			text-align: center;
			width: 800px;
		}
		</style>
	</head>
	<body>

	<!-- Header -->
		<div id="header">
			<div class="container">
					
				<!-- Logo -->
					<div id="logo">
						<h1><a href="#">Australia</a></h1>
						<span><font color="gray" size="5pt" style="font-family:Microsoft JhengHei;">澳大利亞</font></span>
					</div>

			</div>
		</div>
	<!-- Header -->
			
	<!-- Main -->
		<div id="main">
			<div class="container">
				<div class="row">

					<!-- Sidebar -->
						<div id="sidebar" class="4u">
							<section>
								<header>
								</header>
								<div>
									<h1><font size="6pt" style="font-family:Microsoft JhengHei;">Currency 貨幣</font></h1>
									<img src="../image/AUD.png" height="70%" width="70%">
								</div>
								
								<div>
									<h1><font size="6pt" style="font-family:Microsoft JhengHei;">Current Rate 目前匯率</font></h1>
                                    <?php
                                    $servername = "140.116.245.148";
                                    $username = "f74042060";
                                    $password = "NckuCsie108";
                                    $database = "f74042060";

                                    $link = mysqli_connect($servername, $username, $password,$database);
                                    $sql= " SELECT Currency,Sell FROM `exchange_rate`";
                                    $query = mysqli_query($link,$sql);

                                    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
		                            {	
			                            if($row['Currency'] == 'AUD'){
                                            echo "<p><h1><font color=gray size='7pt'>". $row["Sell"] . "</font></h1></p>";
			                            }
		                            }
                                    ?>
								</div>
							</section>
						</div>
					<!-- Sidebar -->
				
					<!-- Content -->
						<div id="content" class="8u skel-cell-important">
							<section>
								<header>
								</header>
								<div>
									<h1><font size="6pt" style="font-family:Microsoft JhengHei;">Trend Chart 走勢圖</font></h1>
									<iframe width="800px" height="500px" src="../graph/sub_AU.php"></iframe>
								</div>

                                <div>
									<h1><font size="6pt" style="font-family:Microsoft JhengHei;">Table 表格</font></h1>
									<?php
                                    $sql= " SELECT * FROM `range_recommend`;";
                                    $query = mysqli_query($link,$sql);

                                    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
		                            {	
			                            if($row['Currency'] == 'AUD'){
											$min = $row["Min"];
											$max = $row["Max"];
			                            }
		                            }
                                    ?>

                                    <table>
                                        <tr>
                                            <th></th>
                                            <th><h1><font size="5pt" color="gray" style="font-family:Microsoft JhengHei;">歷史最低點</font><h1></th>
                                            <th><h1><font size="5pt" color="gray" style="font-family:Microsoft JhengHei;">歷史最高點</font><h1></th>
                                        </tr>
                                        <tr>
											<td><h1><font size="5pt" color="gray" style="font-family:Microsoft JhengHei;">現金賣出匯率</font><h1></td>
											<?php
											echo "<td><h1><font color=gray size='5pt'>". $min . "</font></h1></td>";
											echo "<td><h1><font color=gray size='5pt'>". $max . "</font></h1></td>";
											?>
                                        </tr>
                                    </table>
                                </div>

								<div>
									<h1><font size="6pt" style="font-family:Microsoft JhengHei;">Conversion 換算</font></h1>
									<iframe width="100%" height="360px" src="../calculator/change_AUD.php"></iframe>
								</div>

							</section>
						</div>
					<!-- /Content -->
						
				</div>
			
			</div>
		</div>
	<!-- Main -->

	<!-- Footer -->
		<div id="footer">
			<!-- <div class="container">
				<div class="row">
					<div class="3u">
						<section>
							<ul class="style1">
								<li><img src="images/pics05.jpg" width="78" height="78" alt="">
									<p>Nullam non wisi a sem eleifend. Donec mattis libero eget urna. </p>
									<p class="posted">August 11, 2014  |  (10 )  Comments</p>
								</li>
								<li><img src="images/pics06.jpg" width="78" height="78" alt="">
									<p>Nullam non wisi a sem eleifend. Donec mattis libero eget urna. </p>
									<p class="posted">August 11, 2014  |  (10 )  Comments</p>
								</li>
								<li><img src="images/pics07.jpg" width="78" height="78" alt="">
									<p>Nullam non wisi a sem eleifend. Donec mattis libero eget urna. </p>
									<p class="posted">August 11, 2014  |  (10 )  Comments</p>
								</li>
							</ul>
						</section>
					</div>
					<div class="3u">
						<section>
							<ul class="style1">
								<li class="first"><img src="images/pics08.jpg" width="78" height="78" alt="">
									<p>Nullam non wisi a sem eleifend. Donec mattis libero eget urna. </p>
									<p class="posted">August 11, 2014  |  (10 )  Comments</p>
								</li>
								<li><img src="images/pics09.jpg" width="78" height="78" alt="">
									<p>Nullam non wisi a sem eleifend. Donec mattis libero eget urna. </p>
									<p class="posted">August 11, 2014  |  (10 )  Comments</p>
								</li>
								<li><img src="images/pics10.jpg" width="78" height="78" alt="">
									<p>Nullam non wisi a sem eleifend. Donec mattis libero eget urna. </p>
									<p class="posted">August 11, 2014  |  (10 )  Comments</p>
								</li>
							</ul>
						</section>				
					</div>
					<div class="6u">
						<section>
							<header>
								<h2>Aenean elementum</h2>
							</header>
							<p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Pellentesque tristique ante ut risus. Quisque dictum. Integer nisl risus, sagittis convallis, rutrum id, elementum congue, nibh. Suspendisse dictum porta lectus.</p>
							<ul class="default">
								<li><a href="#">Pellentesque quis lectus gravida blandit.</a></li>
								<li><a href="#">Lorem ipsum consectetuer adipiscing elit.</a></li>
								<li><a href="#">Phasellus nec nibh pellentesque congue.</a></li>
								<li><a href="#">Cras aliquam risus pellentesque pharetra.</a></li>
								<li><a href="#">Duis non metus commodo euismod lobortis.</a></li>
								<li><a href="#">Lorem ipsum dolor adipiscing elit.</a></li>
							</ul>
						</section>
					</div>
				</div>
			</div> -->
		</div>
	<!-- Footer -->

	<!-- Copyright -->
		<!-- <div id="copyright">
			<div class="container">
				Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
			</div>
		</div> -->

	</body>
</html>