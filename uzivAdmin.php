<?php
    include("navigacia.php");
    include("auth/Uzivatel.php");

    if (isset($_GET['delete']))
    {
        $db->removeUser($_GET['delete']);
    }
?>
<main style="height: 100vh;">

    <table class="table container mt-5 mb-5">
    <thead class="thead-light" style = "background-color: whitesmoke;">
        <tr>
        <th scope="col">Poradie</th>
        <th scope="col">Meno</th>
        <th scope="col">Priezvisko</th>
        <th scope="col">Email</th>
        <th scope="col"> </th>
        </tr>
    </thead>
    <tbody>
        <?php
            $cislo = 0;
            foreach($db->getAllUsers() as $user) { 
                
                if ($user->meno != "admin") { $cislo++; ?>
            <tr>
            <th class = "post"><?php echo $cislo; ?></th>
            <td><?php echo $user->meno; ?></td>
            <td><?php echo $user->priezvisko; ?></td>
            <td><?php echo $user->email; ?></td>
            <td><a href="?delete=<?php echo $user->id ?>" class="btn btn-danger">Vymaz</a></td>
            </tr>
            <?php } } ?>
    </tbody>
    </table>
</main>
<?php
    include("footer.php");
?>