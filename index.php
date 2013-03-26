<?php

$user_has_submitted_text_to_nurblize = isset( $_POST[ 'text' ] );

include '_header.php';

if ( $user_has_submitted_text_to_nurblize ) :
	require 'functions.php';
?>

<h1>Your Nurbled Text</h1>
<div><?php echo nurble( $_POST[ 'text' ] ) ?></div>
<p>
    <a href="/">&lt;&lt; Back</a>
</p>

<?php else: ?>

<h1>Nurblizer</h1>
<form action="<?php echo $_SERVER[ 'PHP_SELF' ] ?>" method="post">
    <fieldset>
        <ul>
            <li>
                <label>Text to nurblize</label>
                <textarea name="text"></textarea>
            </li>
            <li>
                <input type="submit" value="Nurblize Away!">
            </li>
        </ul>
    </fieldset>
</form>
<p>
    <a href="http://www.smbc-comics.com/?id=2779">wtf?</a>
</p>
<?php endif ?>

<?php include '_footer.php';
