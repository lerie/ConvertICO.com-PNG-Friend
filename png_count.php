<?php
//Lerie Taylor
//8:35 PM 4/22/2012
echo "<p>".count(glob("png/*.png")).", ".(100-count(glob("png/*.png")))."</p>";
?>