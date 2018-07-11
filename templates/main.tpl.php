<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex">
    <title>Tree views</title>
    <link rel="stylesheet" type="text/css" href="scripts/datetimepicker/jquery.datetimepicker.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="style/main.css" media="screen" />
    <script type="text/javascript" src="scripts/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="scripts/datetimepicker/jquery.datetimepicker.full.min.js"></script>
    <script type="text/javascript" src="scripts/main.js"></script>
</head>
<body>
<div id="body">
    <div id="header">
        <h3 id="slogan"><a href="index.php">Tree views</a></h3>
    </div>
    <div id="content">
        <div id="topMenu">
            <ul class="float-left">
                <li><a href="index.php?module=iterative&action=list" title="Iterative Tree"<?php if($module == 'iterative') { echo 'class="active"'; } ?>>Iterative Tree</a></li>
                <li><a href="index.php?module=recursive&action=list" title="Recursive Tree"<?php if($module == 'recursive') { echo 'class="active"'; } ?>>Recursive Tree</a></li>
            </ul>
        </div>
        <div id="contentMain">
            <?php
            // įtraukiame veiksmų failą
            if(file_exists($actionFile)) {
                include $actionFile;
            }
            ?>
            <div class="float-clear"></div>
        </div>
    </div>
    <div id="footer">

    </div>
</div>
</body>
</html>