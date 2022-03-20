<?php include 'header.php'; ?>

<div>
    <h2>Vehicle Make List</h2>
    <table>
        <tr>
            <th>Name</th>
        </tr>
        <?php foreach ($makes as $make) : ?>
        <tr>
            <td><?php echo $make['Make']; ?></td>
            <td class="small-length">
                <form action = "index.php?action=remove_make" method="post">
                    <input type="hidden" name= "make_id" value="<?php echo htmlspecialchars($make['ID']); ?>">
                    <input type="submit" class="full-width" value="Remove">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>     
</div>

<div>
    <h2>Add Vehicle Make</h2>
    <form>
        <input type="hidden" name="action" value="add_make">
        <label>Name:</label>
        <input type="text" name="make" required>
        <button>Add Make</button>
    </form>
</div>

<div>
    <p><a href="?action=list_vehicles">View Vehicles</a></p>
    <p><a href="?action=add_vehicle">Add Vehicle</a></p>
    <p><a href="?action=list_types">View/Edit Types</a></p>     
    <p><a href="?action=list_classes">View/Edit Classes</a></p>     
</div>

<?php include 'footer.php'; ?>