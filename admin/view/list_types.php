<?php include 'header.php'; ?>

<div>
    <h2>Vehicle Type List</h2>
    <table>
        <tr>
            <th>Name</th>
        </tr>
        <?php foreach ($types as $type) : ?>
        <tr>
            <td><?php echo $type['Type']; ?></td>
            <td class="small-length">
                <form action="index.php?action=remove_type" method="post">
                    <input type="hidden" name= "type_id" value="<?php echo htmlspecialchars($type['ID']); ?>">
                    <input type="submit" class="full-width" value="Remove">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>     
</div>

<div>
    <h2>Add Vehicle Type</h2>
    <form>
        <input type="hidden" name="action" value="add_type">
        <label>Name:</label>
        <input type="text" name="type" required>
        <button>Add Type</button>
    </form>
</div>

<div>
    <p><a href="?action=list_vehicles">View Vehicles</a></p>
    <p><a href="?action=add_vehicle">Add Vehicle</a></p>
    <p><a href="?action=list_makes">View/Edit Makes</a></p>     
    <p><a href="?action=list_classes">View/Edit Classes</a></p>     
</div>

<?php include 'footer.php'; ?>