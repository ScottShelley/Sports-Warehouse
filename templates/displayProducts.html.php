<table id="myTable" class="display">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Sale price</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><a href="product.php?id=<?=$row["Id"]?>"><?=$row["Name"]?></a></td>
                <td><?=$row["Description"]?></td>
                <td><?=$row["Price"]?></td>
                <td><?=$row["SalePrice"]?></td>
                <td><img src="<?=$row["Photo"]?>" alt="Image of <?=$row["Name"]?>"></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    });
</script>