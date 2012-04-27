<?php
//Lerie Taylor
//8:34 PM 4/22/2012, 9:17 AM 4/27/2012

error_reporting(0);
set_time_limit(20);

dirCheck();

$src = file_get_contents("http://www.convertico.com/newest.php?ajax&time=");
preg_match_all("/(\d+[.]\d+)/", $src, $out, PREG_PATTERN_ORDER);

$files = array();
for($i=0;$i<sizeof($out[0]);$i++)
{
	$files = array_unique($files);
	$link = curlIt("http://www.convertico.com/images/".$out[0][$i]."/_previmg.png", $out[0][$i]);
	sleep(1);

	if($handle = opendir("png/"))
	{
		while (false !== ($entry = readdir($handle)))
		{
			if ($entry != "." && $entry != ".." && $entry != "archive")
			{
				array_push($files, $entry);

				if(count($files)>=100)
				{
					archiveFiles($files);

				} else {
					echo "<a href=\"png/".$entry."\"><img src=\"png/$entry\" /></a>&nbsp;";
				}
			}
		}

		closedir($handle);
	}
}

function curlIt($url, $num)
{
	$ch = curl_init($url);
	$fp = fopen("png/".$num.".png", 'wb');
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);
}

function dirCheck()
{
	if(!is_dir("png")) mkdir("png");
	if(!is_dir("png/archive/")) mkdir("png/archive/");
}

function archiveFiles($f)
{
	for($i=0;$i<sizeof($f);$i++)
	{
		$sName = explode(".", $f[0]);
		if(!is_dir("png/archive/".$sName[0].$sName[1]."/")) mkdir("png/archive/".$sName[0].$sName[1]."/");

		copy("png/".$f[$i], "png/archive/".$sName[0].$sName[1]."/".$f[$i].".png");
		unlink("png/".$f[$i]);
	}
	$files = "";
}
?>