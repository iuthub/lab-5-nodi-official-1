<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
</head>

<body>
<?php
if($_REQUEST["Name"] && $_REQUEST["Section"] && $_REQUEST["ccnumber"] && $_REQUEST["cc"] )
{
    ?>
    <h1>Thanks, sucker!</h1>

    <p>Your information has been recorded.</p>
    <dl>
        <dt>Name</dt>
        <dd><?= $_REQUEST["Name"] ?></dd>

        <dt>Section</dt>
        <dd><?= $_REQUEST["Section"] ?></dd>

        <dt>Credit Card</dt>
        <dd><?= $_REQUEST["ccnumber"]?> (<?= $_REQUEST["cc"] ?>) </dd>
        <dt>Here are all the suckers who have submitted here:</dt>
        <?php
        $suckers = 'suckers.txt';
        $current_sucker = file_get_contents($suckers);
        $current_sucker = array();
        array_push($current_sucker,$_REQUEST["Name"], ";", $_REQUEST["Section"],
            ";", $_REQUEST["ccnumber"], ";", $_REQUEST["cc"], "\n" );
        file_put_contents($suckers, $current_sucker, FILE_APPEND);
        ?>
    </dl>
    <pre><?php echo file_get_contents($suckers) ?></pre>

<?php } else {
    ?>
    <h1>Sorry</h1>

    <p>You didn't fill out the form completely. <a href="buyagrade.html">Try again?</a> </p>
<?php } ?>
</body>
</html>