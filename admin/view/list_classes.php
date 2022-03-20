<?php include 'header.php'; ?>

<div>
    <h2>Vehicle Class List</h2>
    <table>
        <tr>
            <th>Name</th>
        </tr>
        <?php foreach ($classes as $class) : ?>
        <tr>
            <td><?php echo $class['Class']; ?></td>
            <td class="small-length">
                <form action = "index.php?action=remove_class" method="post">
                    <input type="hidden" name= "class_id" value="<?php echo htmlspecialchars($class['ID']); ?>">
                    <input type="submit" class="full-width" value="Remove">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>     
</div>

<div>
    <h2>Add Vehicle Class</h2>
    <form>
        <input type="hidden" name="action" value="add_class">
        <label>Name:</label>
        <input type="text" name="class" required>
        <button>Add Class</button>
    </form>
</div>

<div>
    <p><a href="?action=list_vehicles">View Vehicles</a></p>
    <p><a href="?action=add_vehicle">Add Vehicle</a></p>
    <p><a href="?action=list_makes">View/Edit Makes</a></p>
    <p><a href="?action=list_types">View/Edit Types</a></p>          
</div>

<?php include 'footer.php'; ?>