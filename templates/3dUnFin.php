<?php include_once "partials/header.php"?>

    <div class="description">
        <h1>Unfinished projects</h1>
    </div>

    <div class="container3d">
        <div id="border">
            <h2>Corvette concept</h2>
            <div class="canvasCorvette"></div> <!-- First canvas -->
            <p>Originally meant to be a part of a shipset for Stellaris</p>
        </div>

        <div id="border">
            <h2>Nissan R35 GTR</h2>
            <div class="canvasGTR"></div> <!-- Second canvas -->
            <p>Experiment to try and mod Zomboid but failed.</p>
        </div>
        
    </div>
</div>

<!-- Three.js (non-module) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<!-- GLTFLoader (non-module) -->
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js"></script>

<!-- Load OrbitControls (non-module) -->
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>

<script type="module" src="../assets/js/3dunfin.js"></script>

<?php include_once "partials/footer.php"?>