<?php include 'app/views/_global/beforeContent.php'; ?>

<form method="post" action="<?php echo Configuration::BASE_PATH; ?>costumers/add" onsubmit="return validateForm();">
    <div class="form-group ">
        <label class="control-label requiredField" for="name">Name<span class="asteriskField">*</span></label>
        <input class="form-control" id="name" name="name" type="text" placeholder="Enter costumer name minimum 3 characters" />
    </div>
    
    <div class="form-group">
        <label class="control-label requiredField" for="number">Driving License Number<span class="asteriskField">*</span></label>
        <input class="form-control" id="number" name="number" type="number" placeholder="Driving License Number 9-digits"  pattern="[0-9]{9}"/>
    </div>
    
    <div class="form-group">
            <button class="btn btn-primary " name="submit" type="submit">Add new values</button>
            <a  class="btn btn-primary" href="<?php echo Configuration::BASE_PATH; ?>costumers">Back to costumers</a>
    </div>
</form>

<script>
    function validateForm() {
        var form_ok = true;
            if($('#number').val().length !== 9) {
                form_ok = false;
                $('#number').parent('.form-group').addClass('has-error');
            } else {
                $('#number').parent('.form-group').removeClass('has-error');
            }
            if($('name').length <=3) {
                $('#name').parent('.form-group').addClass('has-error');
            } else {
                $('#name').parent('.form-group').removeClass('has-error');
            }
        return form_ok;
    }
</script>

<?php  if (isset($DATA['message'])): ?>
        <p><?php echo htmlspecialchars($DATA['message']); ?></p>
<?php endif; ?>

<?php include 'app/views/_global/afterContent.php'; ?>
