<?php include 'app/views/_global/beforeContent.php'; ?>

<table class="table table-condendsed table-bordered">
    <thead>
        <tr>
            <th>Vozilo</th>
            <th>Klijent</th>
            <th>Izdato do</th>
                    
        </tr>
    </thead>
    <tbody>
        <?php foreach ($DATA['rez'] as $item): ?>
        <tr>
            <td><?php echo CarModel::getById($item->car_id)->proizvodjac; ?></td>
            <td><?php echo CostumerModel::getById($item->costumer_id)->name; ?></td>
            <td><?php echo $item->end_date; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>



<a class="btn btn-primary" href="<?php Configuration::BASE_PATH?>rental/add">Izdaj Vozilo</a>



<?php include 'app/views/_global/afterContent.php'; ?>