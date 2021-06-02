<!-- MAIN content -->
<div id="main">
    <div id="main-content">
        <h3>This is home page.</h3>

        <?php
        if (!$user) { ?>
            <p> Welcome to the website! Login to see userslist. </p>
        <?php } else {
            $sql_users = "SELECT id, username FROM users";
            $result = $mysql->query($sql_users);
        ?><table>
                <tr>
                    <th>id</th>
                    <th>username</th>
                </tr>
                <?php while ($usr = $result->fetch_row()) { ?>
                    <tr>
                        <td><?php echo $usr[0]; ?></td>
                        <td><?php echo $usr[1]; ?></td>
                    </tr>
                <?php } ?>
                </tr>
            </table>
        <?php } ?>
    </div>

    <!-- embed sidbar.php -->
    <?php require __DIR__ . '/partials/sidebar.php' ?>
</div>
