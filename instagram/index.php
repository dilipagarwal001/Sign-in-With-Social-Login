<?php
if (!session_id()) {
    session_start();
}

require_once('settings.php');
$url="https://api.instagram.com/oauth/authorize/?client_id=".CLIENT_ID."&redirect_uri=".CLIENT_REDIRECT_URL."&response_type=code";
?>
<a href="<?php echo $url; ?>"><img src="https://www.pinterest.com/pin/318840848594463252/"></a>
