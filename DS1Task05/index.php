<html>
	<head>
		<title>Мой альбом</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="styles/main.css" />
		<style>
			div.thumbnails {
				border:solid black thin;
				width: 150px;
				float: left;
			}
			
			div.thumbnails img {
				margin: 5px;
				border-radius: 50%;
				display: block;
				width: 130px;
                border: solid white thick;
			}
			
			div.large-photo {
				float: left;
			}
			
			div.large-photo img {
				width: 400px;
				margin-left: 10px;
			}
			
			div.thumbnails img:hover {
				border: solid red thick;
				cursor: pointer;
			}
			
			div.thumbnails img.selected {
				border: solid thick blue;
			}
		</style>
		<!-- <script src="script/jquery3.6.0.js"></script> -->
		<script>
			function showLarge(thumb) {
				console.log(thumb);
				var pic_name = thumb.src;
				console.log(pic_name);
				var splitted = pic_name.split(".")
				var large_name = splitted[0] + "-large." + splitted[1];
				console.log(large_name);
				document.getElementById("large_photo").src = large_name;
                for(element of document.getElementsByClassName("thumbnails")[0].children) {
                    element.classList.remove("selected");
                }
				thumb.classList.add("selected");
			}

		</script>
	</head>
	<body>
		<h1>Фотоальбом</h1>
		<div class="thumbnails">
			<?php
				$files = scandir(__DIR__."/images");
				$class_name="selected";
				foreach ($files as $file)
				{
					if (strpos($file,"large") === FALSE and strlen($file) > 3)
					{
						echo("
							<img src='images/$file' onclick='showLarge(this);' class=$class_name/>
						");
						$class_name = "";
					}
				}
			?>
			<!-- <img src="images/april-meyer.jpg" 
			onclick="showLarge(this);" class="selected"/>
			<img src="images/david-alexander.jpg" onclick="showLarge(this);"/>
			<img src="images/mark-hanson.jpg" onclick="showLarge(this);"/>
			<img src="images/melissa-kerr.jpg" onclick="showLarge(this);"/> -->
		</div>
		<div class="large-photo" >
			<img src="images/april-meyer.jpg" id="large_photo"/>
		<div>
	</body>
</html>