<div class="head">
        <p>VoidFox</p>
        <?php if ($_SERVER['REQUEST_URI'] == "/Comission_Portfolio/"){
            echo('
                <div>
                    <a href="3d pages/3dfin.php">Finished 3D projects</a>
                    <a href="3d pages/3dunfin.php">Unfinished 3D projects</a>
                    <a href="3d pages/3donpause.php">3D projects on pause</a>
                </div>
                <div>
                    <a href="project pages/projectidea.php">Project ideas</a>
                    <a href="project pages/projecthalted.php">Stopped projects</a>
                </div>
                <div>
                    <a href="main.php">Main page</a>
                </div>
            ');
        }else{
            echo('
                <div>
                    <a href="../3d pages/3dfin.php">Finished 3D projects</a>
                    <a href="../3d pages/3dunfin.php">Unfinished 3D projects</a>
                    <a href="../3d pages/3donpause.php">3D projects on pause</a>
                </div>
                <div>
                    <a href="../project pages/projectidea.php">Project ideas</a>
                    <a href="../project pages/projecthalted.php">Stopped projects</a>
                </div>
                <div>
                    <a href="../main.php">Main page</a>
                </div>
            ');
        }
    ?>
</div>