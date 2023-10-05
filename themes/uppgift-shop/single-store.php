<?php
$address = get_field('address');
$opening_hours = get_field('opening_hours');
?>

<div class="store-details">
    <p><strong>Adress:</strong> <?php echo $address; ?></p>
    <p><strong>Öppettider:</strong> <?php echo $opening_hours; ?></p>
</div>
