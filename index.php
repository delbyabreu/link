<?php
	error_reporting(0);
	include "curl_gd.php";

	if($_POST['submit'] != ""){
		$url = $_POST['url'];
		$gid = get_drive_id($url);
		$iframeid = my_simple_crypt($gid);
		$backup = 'https://drive.google.com/file/d/'.$gid.'/preview';
		$posterimg = PosterImg($backup);
		$linkdown = Drive($url);
		$file = '[{"type": "video/mp4", "label": "HD", "file": "'.$linkdown.'"}]';
	}
?>
<!doctype html>
<html lang="en">
    <!doctype html>
<html lang="es">
<script language="JavaScript">
    function protegercodigo() {
    if (event.button==2||event.button==3){
        alert('Codigo protegido!');}
    }
    document.onmousedown=protegercodigo
</script>
<head>
<body bgcolor="#abfff5">
  <meta charset="utf-8" />
	<title>Gerador de Embed para Google drive</title>
</head>
<body>

  <!-- Docs styles -->
  <link rel="stylesheet" href="https://cdn.plyr.io/2.0.13/demo.css">
	<style>
		.container {
		  max-width: 800px;
		  margin: 0 auto;
		}
	</style>

	<div class="container">
		<br />
		<form action="" method="POST">
			<input type="text" size="80" name="url" value="https://drive.google.com/file/d/0ByaRd0R0Qyatcmw2dVhQS0NDU0U/view"/>
			<input type="submit" value="GERAR" name="submit" />
		</form>
		<br/>

		<div id="myElement">Cole sua URL e vá até "GERAR"</div>

		<div><?php if($iframeid){echo '<textarea style="margin:10px;width: 97%;height: 80px;">&lt;iframe src="https://googlep.herokuapp.com/embed.php?url='.$iframeid.'" width="640" height="360" frameborder="0" scrolling="no" allowfullscreen&gt;&lt;/iframe&gt;</textarea>';}?></div>
<form> 
<input type="button" value="Voltar" onClick="history.go(-1)">
	</div>

	<script src="https://content.jwplatform.com/libraries/aFAvOI8E.js"></script>
	<script type="text/javascript">
		jwplayer("myElement").setup({
			playlist: [{
				"image": "<?php echo $posterimg; ?>",
				"sources":<?php echo $file?>
			}],
			allowfullscreen: true,
			width: '100%',
			aspectratio: '16:9',
		});
	</script>
	<footer>
			</div><center>
			    Modificado: Viajante001
		</footer>
	</div>

</body>
</html>
