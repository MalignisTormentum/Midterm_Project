<?php include 'header.php'; ?>

<div>
    <header>
        <form action="." method="post">
            <input type="hidden" name="action" value="add_vehicle">

            <select name="make_id" required>
                <option value="0">View All Makes</option>
                <?php foreach ($makes as $make) : ?>
                <option value="<?= $make['ID'] ?>">
                    <?= $make['Make'] ?>
                </option>
                <?php endforeach; ?>
            </select>

            <select name="type_id" required>
                <option value="0">View All Types</option>
                <?php foreach ($types as $type) : ?>
                <option value="<?= $type['ID'] ?>">
                    <?= $type['Type'] ?>
                </option>
                <?php endforeach; ?>
            </select>

            <select name="class_id" required>
                <option value="0">View All Classes</option>
                <?php foreach ($classes as $class) : ?>
                <option value="<?= $class['ID'] ?>">
                    <?= $class['Class'] ?>
                </option>
                <?php endforeach; ?>
            </select>

            <label>Year:</label>
            <input type="text" name="year" required><br>
            <label>Model:</label>
            <input type="text" name="model" required>
            <label>Price:</label>
            <input type="text" name="price" required>
            
            <button>Add Vehicle</button>
        </form>
    </header>

    <p><a href="?action=list_vehicles">View Vehicles</a></p>
    <p><a href="?action=list_makes">View/Edit Makes</a></p>
    <p><a href="?action=list_types">View/Edit Types</a></p>     
    <p><a href="?action=list_classes">View/Edit Classes</a></p>     
</div>

<?php include 'footer.php'; ?>