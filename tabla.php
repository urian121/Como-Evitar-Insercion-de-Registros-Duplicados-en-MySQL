<?php
include('config.php');
$sqlTrabajadores = ('SELECT * FROM trabajadores ORDER BY fecha_ingreso ASC');
$query      = mysqli_query($con, $sqlTrabajadores);
$total      = mysqli_num_rows($query);
?>

<strong style="float: right; color:crimson;">
    <?php echo ($total > 0) ? 'Total (' . $total . ')' : 'Total (0)'; ?>
</strong>
<div class="table-responsive resultadoFiltro">
    <table class="table table-hover" id="tableEmpleados">
        <thead>
            <tr>
                <th scope="col">NOMBRE Y APELLIDO</th>
                <th scope="col">EMAIL</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">SUELDO</th>
            </tr>
        </thead>
        <?php
        while ($dataRow = mysqli_fetch_array($query)) { ?>
            <tbody>
                <tr>
                    <td><?php echo $dataRow['nombre'] . ' ' . $dataRow['apellido']; ?></td>
                    <td><?php echo $dataRow['email']; ?></td>
                    <td><?php echo $dataRow['telefono']; ?></td>
                    <td><?php echo '$ ' . number_format($dataRow['sueldo'], 0,'','.'); ?></td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>