<div class="table-responsive resultadoFiltro">
    <table class="table table-hover" id="tableEmpleados">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NOMBRE Y APELLIDO</th>
                <th scope="col">EMAIL</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">SUELDO</th>
            </tr>
        </thead>
        <?php
        include('config.php');
        $sqlTrabajadores = ('SELECT * FROM trabajadores ORDER BY fecha_ingreso ASC');
        $query = mysqli_query($con, $sqlTrabajadores);
        $i = 1;
        while ($dataRow = mysqli_fetch_array($query)) { ?>
            <tbody>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $dataRow['nombre'] . ' ' . $dataRow['apellido']; ?></td>
                    <td><?php echo $dataRow['email']; ?></td>
                    <td><?php echo $dataRow['telefono']; ?></td>
                    <td><?php echo '$ ' . $dataRow['sueldo']; ?></td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>