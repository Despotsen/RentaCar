<?php include 'app/views/_global/beforeContent.php'; ?>

<form method="post" action="<?php echo Configuration::BASE_PATH; ?>rental/add">
    
    <div class="form-group">
        <label class="control-label requiredField" >Izaberite korisnika<span class="asteriskField">*</span></label>
        <select class="form-control" name="korisnik" id="korisnik">
            <?php foreach ($DATA['korisnici'] as $item): ?>
            <option><?php echo  $item->name; ?></option>
            <?php endforeach; ?>
        </select><br>
        <a class="btn btn-primary" href="<?php Configuration::BASE_PATH?>costumers/add">Dodaj Klijenta</a>
    </div>
    
    <div class="form-group">
        <label class="control-label requiredField" >Izaberite Vozilo<span class="asteriskField">*</span></label>
        <select class="form-control" name="vozila" id="vozila">
            <?php foreach ($DATA['vozila'] as $item): ?>
            <option><?php echo  $item->proizvodjac; ?></option>
            <?php endforeach; ?>
        </select>
    
    </div>
    
    <div class="form-group">
        <label class="control-label requiredField" >Izdaj do:<span class="asteriskField">*</span></label>
        <input placeholder="YYYY-MM-DD" class="form-control" id="datum" name="datum" type="text"  />
    </div>
    
    <div class="form-group">
            <button class="btn btn-primary " name="submit" type="submit">Izdaj</button>
            <a  class="btn btn-primary" href="<?php echo Configuration::BASE_PATH; ?>rental">Nazad na izdavanje</a>
    </div>
</form>

<?php include 'app/views/_global/afterContent.php'; ?>

