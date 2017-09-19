<?php include 'app/views/_global/beforeContent.php'; ?>
<form method="post" action="<?php echo Configuration::BASE_PATH; ?>cars/delete/<?php echo $DATA['cars']->car_id; ?>">
    <header>
        <h3>Delete Car &quot;<?php echo htmlspecialchars($DATA['cars']->proizvodjac); ?></h3>
    </header><br>
    
    <div class="form-group">
        <input type="hidden" name="confirmed" value="1">
            <button class="btn btn-primary " name="submit" type="submit">Delete</button>
            <a  class="btn btn-primary" href="<?php echo Configuration::BASE_PATH; ?>cars">Back to cars</a>           
    </div>
</form>

<?php  if (isset($DATA['message'])): ?>
        <p><?php echo htmlspecialchars($DATA['message']); ?></p>
<?php endif; ?>

<?php include 'app/views/_global/afterContent.php'; ?>
