<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 20/08/2018
 * Time: 13:32
 */
$this->titre ="";
$this->script = '<script src="Vue/Jscripts/afficheTableau.js" type="text/javascript"></script>';
$ISBN = '978123456789712345'
?>

<div id="tableau">

</div>

<script type="text/javascript">
    $('#contenu').css("margin", "50px");
    scriptData = <?php echo $json; ?>;
    afficheTableau(scriptData, '#tableau');
</script>


