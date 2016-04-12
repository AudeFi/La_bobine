<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
		<title>Template 03</title>
		<!-- <link rel="stylesheet" href="src/css/reset.css"> -->
		<link rel="stylesheet" href="src/css/bootstrap.min.css">
        <link rel="stylesheet" href="src/medias/media.css">
        <link rel="stylesheet" href="src/css/style.css">
	</head>
	<body>
	    <?php
            $oui = '1';
            $value = '';
            $type = '';
            if ( isset ($_POST['code_entre']) AND isset ($_POST['code']))
            {
                $code_entre = $_POST['code_entre'];
                $code = $_POST['code'];
                $code = $code / '368.5';
                if ($code_entre == NULL)
                {
                    $ok = '';
                    $oui = '0';
                }
                elseif ($code_entre != $code)
                {
                    $ok = '';
                    $oui = '0';
                }
                else
                {
                    $ok = '';
                    $value = 'value="' .$code. '"';
                    $type = 'text';
                }
            }
            else
            {
                $ok = '';
                $oui = '0';
            }
            if ( $oui == '0' )
            {
                $code = rand('100000', '999999');
                header ('Content-type: image/png');
                $image = imagecreate('56', '20');
                $orange = imagecolorallocate($image, '230', '126', '34');
                $bleu = imagecolorallocate($image, '35', '49', '63');
                imagestring($image, '4', '4', '2', $code, $bleu);
                imagepng($image, 'code.png');
                header ('Content-type: text/html');
            }
            $code = $code * '368.5';
            ?>
            <form method="POST" action="#">
                <p><img src="code.png" title="Code" alt="Code" id="Code"/><label id="codish" for="code_entre"> Entrez le code</label></br> <input type="<?php echo $type ?>" name="code_entre" id="code_entre" placeholder="Code" size="7" maxlength="6" <?php echo $value; ?>/>
                <input type="submit" value="Envoyer"/>
                <input name="code" id="code" type="hidden" value="<?php echo $code; ?>"/>
            </form>
        <?php echo $ok; ?></p>

	<script src="src/js/libs/jquery-2.2.0.min.js"></script>	
	<script src="src/js/app/main.js"></script>	
	</body>
</html>