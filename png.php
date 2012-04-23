<?php
//Lerie Taylor
//8:34 PM 4/22/2012

set_time_limit(0);

dirCheck();
error_reporting(0);

$src = file_get_contents("http://www.convertico.com/newest.php?ajax&time=");
preg_match_all("/(\d+[.]\d+)/", $src, $out, PREG_PATTERN_ORDER);

for($i=0;$i<sizeof($out[0]);$i++)
{
	$link = curlIt("http://www.convertico.com/images/".$out[0][$i]."/_previmg.png", $out[0][$i]);
	sleep(5);

	if($handle = opendir('png/'))
	{
		$files = array();

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
		if(!is_dir("png/archive/".$f[0]."/")) mkdir("png/archive/".$f[0]."/");

		copy("png/".$f[$i], "png/archive/".$f[0]."/".$f[$i].".png");
		unlink("png/".$f[$i]);
	}
	$files = "";
}
?>