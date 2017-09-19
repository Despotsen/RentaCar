<?php include 'app/views/_global/beforeContent.php'; ?>


<table class="table table-condendsed table-bordered">
    <thead>
        <tr>
            <th>Proizvodjac</th>
            <th>Model</th>
            <th>Registrovano do</th>
            <th>Godiste</th>            
            <th>Zapremina</th>            
            <th colspan="2">Opcije</th>           
        </tr>
    </thead>
    <tbody>
        <?php foreach ($DATA['cars'] as $item): ?>
        <tr>
            <td><?php echo $item->proizvodjac; ?></td>
            <td><?php echo $item->model; ?></td>
            <td><?php echo $item->registration; ?></td>
            <td><?php echo $item->godiste; ?></td>         
            <td><?php echo $item->zapremina; ?></td>         
            <td><a class="btn btn-sm btn-primary" href="<?php echo Configuration::BASE_PATH; ?>cars/edit/<?php echo $item->car_id; ?>">Izmeni</a></td>
            <td><a class="btn btn-sm btn-primary" href="<?php echo Configuration::BASE_PATH; ?>cars/delete/<?php echo $item->car_id; ?>">Brisi</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a class="btn btn-primary" href="<?php Configuration::BASE_PATH?>cars/add">Dodaj Vozilo</a>



<?php include 'app/views/_global/afterContent.php'; ?>

