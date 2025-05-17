<?php include_once "partials/header.php"?>

<div class="description">
    <h1>Finished projects</h1>
</div>

<div class="container3d">
    <div id="border">
        <h2> Glock 17 made for a game</h2>
        <div class="canvasGlock"></div> <!-- First canvas -->
        <p>A model made for a game but for now has not been used.</p>
        <p>Even though it is one of my best models, I can with certeintly do much better.</p> 
        <p>Mainly with the face orientations as when I checked it, I wanted to respawn.</p> 
    </div>

    <div id="border">
        <h2>Train made for a commision</h2>
        <div class="canvasTrain"></div> <!-- Second canvas -->
        <p>Commisioned but never used.</p>
        <p>Hardest part was getting any good reference pictures.</p> 
    </div>
</div>

<!-- Three.js (non-module) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<!-- GLTFLoader (non-module) -->
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js"></script>

<!-- Load OrbitControls (non-module) -->
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>

    
<script type="module" src="../js/3dfin.js"></script>

<?php include_once "partials/footer.php"?>