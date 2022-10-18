<?php
$heightdesk = get_sub_field('space_desktop');
$heighttab = get_sub_field('space_tablet');
$heightmob = get_sub_field('space_mobile');
?>
<div class="spacer"
     style="--space-desktop: <?php echo $heightdesk; ?>px;  --space-tablet: <?php echo $heighttab; ?>px; --space-mobile: <?php echo $heightmob; ?>px">

</div>

