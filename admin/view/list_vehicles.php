<?php include 'header.php'; ?>

<?php
    function format_price($price){
        return '$' . number_format($price, 2);   
    }
?>

<div>
    <header>
        <form action="." method="get">
            <input type="hidden" name="action" value="list_vehicles">
            <select name="make_id" required>
                <option value="0">View All Makes</option>
                <?php foreach ($makes as $make) : ?>
                <option value="<?= $make['ID'] ?>">
                    <?= $make['Make'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <br>
            <select name="type_id" required>
                <option value="0">View All Types</option>
                <?php foreach ($types as $type) : ?>
                <option value="<?= $type['ID'] ?>">
                    <?= $type['Type'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <br>
            <select name="class_id" required>
                <option value="0">View All Classes</option>
                <?php foreach ($classes as $class) : ?>
                <option value="<?= $class['ID'] ?>">
                    <?= $class['Class'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <br>
            <select name="order" required>
                <option value="price">Order By Price</option>
                <option value="year">Order By Year</option>
            </select>
            <button>Submit</button>
        </form>
    </header>

    <table class="home-table">
        <tr>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Class</th>
            <th>Price</th>
            <th>&nbsp</th>
        </tr>
        <?php foreach ($vehicles as $vehicle) : ?>
        <tr>
            <td><?php echo $vehicle['year']; ?></td>
            <td><?php echo $vehicle['Make']; ?></td>
            <td><?php echo $vehicle['model']; ?></td>
            <td><?php echo $vehicle['Type']; ?></td>
            <td><?php echo $vehicle['Class']; ?></td>
            <td><?php echo format_price($vehicle['price']); ?></td>
            <td class="small-length"> 
                <form action = "index.php?action=remove_vehicle" method="post">
                    <input type="hidden" name= "make_id" value="<?php echo htmlspecialchars($vehicle['make_id']); ?>">
                    <input type="hidden" name= "type_id" value="<?php echo htmlspecialchars($vehicle['type_id']); ?>">
                    <input type="hidden" name= "class_id" value="<?php echo htmlspecialchars($vehicle['class_id']); ?>">
                    <input type="submit" class="full-width" value="Remove">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>     

    <p><a href="?action=add_vehicle">Add Vehicle</a></p>
    <p><a href="?action=list_makes">View/Edit Makes</a></p>
    <p><a href="?action=list_types">View/Edit Types</a></p>     
    <p><a href="?action=list_classes">View/Edit Classes</a></p>     
</div>

<?php include 'footer.php'; ?>