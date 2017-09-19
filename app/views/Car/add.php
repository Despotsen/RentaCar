<?php include 'app/views/_global/beforeContent.php'; ?>

<form method="post" action="<?php echo Configuration::BASE_PATH; ?>cars/add" onsubmit="return validateForm();">
    
    <div class="form-group">
        <label class="control-label requiredField" >Proizvodjac<span class="asteriskField">*</span></label>
        <input placeholder="Unesite naziv proizvodjaca" class="form-control" id="proizvodjac" name="prozivodjac" type="text" />
    </div>
    
    <div class="form-group">
        <label class="control-label requiredField" >Model<span class="asteriskField">*</span></label>
        <input placeholder="Unesite naziv modela" class="form-control" id="model" name="model" type="text" />
    </div>
    
    <div class="form-group">
        <label class="control-label requiredField" >Registrovano do:<span class="asteriskField">*</span></label>
        <input placeholder="Unesite do kad traje registracija" class="form-control" id="registracija" name="registracija" type="text"  />
    </div>
        
    <div class="form-group">
        <label class="control-label requiredField" >Zapremina motora<span class="asteriskField">*</span></label>
        <input placeholder="Zapremina motora"  class="form-control" id="zapremina" name="zapremina" type="number"  />
    </div>
    
    <div class="form-group">
        <label class="control-label requiredField" >Proizvedeno<span class="asteriskField">*</span></label>
        <input placeholder="Godina proizvodnje"  class="form-control" id="proizvodnja" name="proizvodnja" type="number" />
    </div>
    
    <div class="form-group">
        <label class="control-label requiredField" >Tip goriva<span class="asteriskField">*</span></label>
        <select class="form-control" id="gorivo" name="gorivo">
            <?php foreach ($DATA['fuels'] as $item): ?>
            <option><?php echo  $item->tip; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label class="control-label requiredField" >Broj vrata<span class="asteriskField">*</span></label>
        <select class="form-control" name="vrata" id="vrata">
            <?php foreach ($DATA['doors'] as $item): ?>
            <option><?php echo  $item->number; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    
    <div class="form-group">
            <button class="btn btn-primary " name="submit" type="submit">Add new values</button>
            <a  class="btn btn-primary" href="<?php echo Configuration::BASE_PATH; ?>cars">Back to cars</a>
    </div>
</form>

<script>
    function validateForm() {
        var form_ok = true;
            if($('#zapremina').val() < 1000) {
                form_ok = false;
                $('#zapremina').parent('.form-group').addClass('has-error');
            } else {
                $('#zapremina').parent('.form-group').removeClass('has-error');
            }
           
        return form_ok;
    }
</script>

<?php  if (isset($DATA['message'])): ?>
        <p><?php echo htmlspecialchars($DATA['message']); ?></p>
<?php endif; ?>

<?php include 'app/views/_global/afterContent.php'; ?>
