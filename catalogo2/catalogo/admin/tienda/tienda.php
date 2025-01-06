<?php
$url='../'; 
require($url.'template/cenefa.php');
require($url.'template/menu.php');
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
(function($)
{
    $(document).ready(function()
    {
        $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {
                $('#content').hide();
                $('#loading').show();
            },
            complete: function() {
                $('#loading').hide();
                $('#content').show();
            },
            success: function() {
                $('#loading').hide();
                $('#content').show();
            }
        });
        var $container = $("#content");
        $container.load("rss-feed-data.php");
        var refreshId = setInterval(function()
        {
            $container.load('rss-feed-data.php');
        }, 9000);
    });
})(jQuery);
</script>

<div id="wrapper">
    <div id="content"></div>
    <!--<img src="../img/loading.gif" id="loading" alt="loading" style="display:none;" />-->
</div>
<?php require($url.'template/footer.php'); ?>