<?php include 'app/views/_global/beforeContent.php'; ?>

<table class="table table-condendsed table-bordered">
    <thead>
        <tr>
            <th>Ime</th>
            <th>Broj licne karte</th>            
            <th colspan="2">Opcije</th>           
        </tr>
    </thead>
    <tbody>
        <?php foreach ($DATA['costumers'] as $item): ?>
        <tr>         
            <td><?php echo $item->name; ?></td>
            <td><?php echo $item->driving_license_number; ?></td>         
            <td><a class="btn btn-sm btn-primary" href="<?php echo Configuration::BASE_PATH; ?>costumers/edit/<?php echo $item->costumer_id; ?>">Izmeni</a></td>
            <td><a class="btn btn-sm btn-primary" href="<?php echo Configuration::BASE_PATH; ?>costumers/delete/<?php echo $item->costumer_id; ?>">Obrisi</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a class="btn btn-primary" href="<?php Configuration::BASE_PATH?>costumers/add">Dodaj Klijenta</a>



<?php include 'app/views/_global/afterContent.php'; ?>

