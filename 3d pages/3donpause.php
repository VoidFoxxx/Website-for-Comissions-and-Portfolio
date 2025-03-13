<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>VoidFox - 3D On Pause</title>
</head>
<body>
    <?php include_once "../parts/header.php"?>

    <div class="description">
        <h1>Projects on Pause</h1>
    </div>

    <div class="container3d">
        <div id="border">
            <h2>G36C</h2>
            <div class="canvasG36"></div> <!-- First canvas -->
            <p>Meant to be used in an unfinished game called Decaying Lines</p>
        </div>

        <div id="border">
            <h2>Character head</h2>
            <div class="canvasHead"></div> <!-- Second canvas -->
            <p>Attempt to make a character.</p>
        </div>
    </div>

    <?php include_once "../parts/footer.php"?>
</div>

<!-- Three.js (non-module) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<!-- GLTFLoader (non-module) -->
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js"></script>

<!-- Load OrbitControls (non-module) -->
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>

<script type="module" src="../js/3donpause.js"></script>
</body>
</html>