<?php include 'app/views/_global/beforeContent.php'; ?>

<form method="post" action="<?php echo Configuration::BASE_PATH; ?>cars/edit/<?php echo $DATA['car']->car_id; ?>">
    
    <div class="form-group">
        <label class="control-label requiredField" >Proizvodjac<span class="asteriskField">*</span></label>
        <input placeholder="Unesite naziv proizvodjaca" class="form-control" id="proizvodjac" name="prozivodjac" type="text" value="<?php echo $DATA['car']->proizvodjac; ?>" />
    </div>
    
    <div class="form-group">
        <label class="control-label requiredField">Model<span class="asteriskField">*</span></label>
        <input placeholder="Unesite naziv modela" class="form-control" id="model" name="model" type="text" value="<?php echo $DATA['car']->model; ?>" />
    </div>
    
    <div class="form-group">
        <label class="control-label requiredField" >Registrovano do:<span class="asteriskField">*</span></label>
        <input  class="form-control" id="registracija" name="registracija" value="<?php echo $DATA['car']->registration; ?>"  />
    </div>
        
    <div class="form-group">
        <label class="control-label requiredField" >Zapremina motora<span class="asteriskField">*</span></label>
        <input placeholder="Zapremina motora"  class="form-control" id="zapremina" name="zapremina" type="number"  value="<?php echo $DATA['car']->zapremina; ?>"/>
    </div>
    
    <div class="form-group">
        <label class="control-label requiredField" >Proizvedeno<span class="asteriskField">*</span></label>
        <input placeholder="Godina proizvodnje"  class="form-control" id="proizvodnja" name="proizvodnja" type="text"  value="<?php echo $DATA['car']->godiste; ?>"/>
    </div>
    
      <div class="form-group">
        <label class="control-label requiredField" >Tip goriva<span class="asteriskField">*</span></label>
        <select class="form-control" id="gorivo" name="gorivo">
            <?php foreach ($DATA['fuels'] as $item): ?>
            <option value="<?php echo $item->fuel_id; ?>"><?php echo  $item->tip; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label class="control-label requiredField">Broj vrata<span class="asteriskField">*</span></label>
        <select class="form-control" name="vrata" id="vrata">
            <?php foreach ($DATA['doors'] as $item): ?>
            <option value="<?php echo  $item->broj_vrata_id; ?>"><?php echo  $item->number; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    
    <div class="form-group">
            <button class="btn btn-primary " name="submit" type="submit">Izmeni</button>
            <a  class="btn btn-primary" href="<?php echo Configuration::BASE_PATH; ?>cars">Vrati se na vozila</a>
    </div>
</form>

<?php  if (isset($DATA['message'])): ?>
        <p><?php echo htmlspecialchars($DATA['message']); ?></p>
<?php endif; ?>

<?php include 'app/views/_global/afterContent.php'; ?>
