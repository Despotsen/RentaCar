<?php include 'app/views/_global/beforeContent.php'; ?>

<form method="post" action="<?php echo Configuration::BASE_PATH; ?>costumers/delete/<?php echo $DATA['costumer']->costumer_id; ?>">
    <header>
        <h3>Delete Costumer &quot;<?php echo htmlspecialchars($DATA['costumer']->name); ?></h3>
        <h3>Driving License Number &quot;<?php echo htmlspecialchars($DATA['costumer']->driving_license_number); ?></h3>
    </header><br>
    
    <div class="form-group">
        <input type="hidden" name="confirmed" value="1">
            <button class="btn btn-primary " name="submit" type="submit">Delete</button>
            <a  class="btn btn-primary" href="<?php echo Configuration::BASE_PATH; ?>costumers">Back to costumers</a>
            
    </div>
</form>

<?php  if (isset($DATA['message'])): ?>
        <p><?php echo htmlspecialchars($DATA['message']); ?></p>
<?php endif; ?>

<?php include 'app/views/_global/afterContent.php'; ?>