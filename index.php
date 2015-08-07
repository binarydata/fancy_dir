<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$directory = dirname(__FILE__)."/folder_with_files";
$directory_array = array_values(array_diff(scandir($directory), array("..", ".")));

echo "<ul>";
foreach($directory_array as $file){//Loop trough directory array
    $size = formatSizeUnits(filesize($file));//Get filesize and convert to correct unit
    $temp = explode('.', $file);//Create array with filename components
    $ext  = array_pop($temp);//Remove extension from array with filename components
    $file = implode('.', $temp);//Create filename from array with filename components
    if($file){//Check if file or folder
        echo "<li>$file<span class=\"size\">$size</span></li>";//Output listitem with filename and filesize
    }
}
echo "</ul>";

function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}
?>
</body>
</html>
