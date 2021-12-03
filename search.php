<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Giphy images</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<section class="header-container">
		<h1 class="header">Giphy Search App</h1>
		<form action="search.php" method="post">
			<input class="search-field" type="text" placeholder="Search giphy..." name="text">
			<button class="search-button" type="submit" name="submit">Search</button>
		</form>
	</section>

	<?php
		if(isset($_POST['submit'])){  //condition to execute code
			$text = $_POST['text'];   //user text from input
			$link = 'https://api.giphy.com/v1/gifs/search?api_key=3ZN71mUHakfR49Fzai2nPuCD4dILWZeV&q='.$text.'&limit=1&offset=0&rating=g&lang=en';  //link to api
			$response = file_get_contents($link);  //get request
			$file = json_decode($response, true);  //json to array

			if(empty($file['data'])){  //condition for error
				echo '<h2 class="error-message">Nothing was found, please retry the search</h2>';
			} else {  //if data is not empty
				foreach ($file['data'] as $key) {  //assign key to each array
					echo "<img src='".$key['images']['fixed_height_small']['url']."'>";  //echo img
				}
			}
		}
	?>

</body>
</html>