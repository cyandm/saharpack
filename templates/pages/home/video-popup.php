<?php
$popup_video = get_field('popup_video', get_option('page_on_front'));

?>

<div class="popup-video">

    <div class="video-wrapper">
        <video controls src="<?= $popup_video ?>"></video>
    </div>

</div>