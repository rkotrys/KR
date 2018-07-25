<html>
<head>
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Katedra Radiokomunikacji - Politechnika Poznańska</title>
    <meta name="description" content="login">
    <meta name="author" content="Katedra Radiokomunikacji">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
	<script src="js/simpleUpload.min.js" ></script>

</head>
<body>
<h1>Test</h1>
<hr />
<div id="myimg"></div>
<hr />
<form style="text-align:center;width:100%;">
<p>Upload</p>
<input type="file" name="myfile" id="myfile" />
</form>
<script>
// http://simpleupload.michaelcbrook.com/
$(document).ready(function(){

	$('input[type=file]').change(function(){

<<<<<<< HEAD
		$(this).simpleUpload("/cmd/phupload", {
=======
		$(this).simpleUpload("/ajax/upload.php", {
>>>>>>> 1a17379780f224e602e800b0b9372c683a64a337

			start: function(file){
				//upload started
				console.log("upload started");
			},

			progress: function(progress){
				//received progress
				console.log("upload progress: " + Math.round(progress) + "%");
			},

			success: function(data){
				//upload successful
				console.log("upload successful!");
				console.log(data);
			},

			error: function(error){
				//upload failed
				console.log("upload error: " + error.name + ": " + error.message);
			}

		});

	});

});
</script>
</body>
</html>