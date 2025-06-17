// First Scene Setup (for first canvas)
const sceneGlock = new THREE.Scene();
const cameraGlock = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const rendererGlock = new THREE.WebGLRenderer();
document.querySelector('.canvasGlock').appendChild(rendererGlock.domElement);

// Lighting for first sceneGlock
const ambientLight1 = new THREE.AmbientLight(0x404040, 2);  // Soft white light
sceneGlock.add(ambientLight1);

const directionalLight1 = new THREE.DirectionalLight(0xffffff, 1);
directionalLight1.position.set(5, 5, 5).normalize();
sceneGlock.add(directionalLight1);

// Load a model for the first canvas
const loaderGlock = new THREE.GLTFLoader();
loaderGlock.load('../models/PG17V1.gltf', (gltf) => {
    sceneGlock.add(gltf.scene);
    gltf.scene.scale.set(35, 35, 35);
    gltf.scene.position.set(0, 0, 0);
    animateGlock();
}, undefined, (error) => {
    console.error('Error loading the model for canvas 1:', error);
});

// Set the camera position for the first scene
cameraGlock.position.set(100, 40, 170);

// OrbitControls for the first canvas
const controlsGlock = new THREE.OrbitControls(cameraGlock, rendererGlock.domElement);

// Resize function for the first canvas
function resizeCanvasGlock() {
  const width = window.innerWidth * 0.5;  // 50% of the window width for the first canvas
  const height = window.innerHeight * 0.6;  // 60% of the window height for the first canvas

  // Resize the first renderer and update the camera aspect
  rendererGlock.setSize(width, height);
  cameraGlock.aspect = width / height;
  cameraGlock.updateProjectionMatrix();
}

// Animation loop for the first scene
function animateGlock() {
  requestAnimationFrame(animate1);
  controlsGlock.update();
  rendererGlock.render(sceneGlock, cameraGlock);
}

//------------------------------------------------------------------------------------------

const sceneTrain = new THREE.Scene();
const cameraTrain = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const rendererTrain = new THREE.WebGLRenderer();
document.querySelector('.canvasTrain').appendChild(rendererTrain.domElement);


const ambientLightTrain = new THREE.AmbientLight(0x404040, 2);
sceneTrain.add(ambientLightTrain);

const directionalLightTrain = new THREE.DirectionalLight(0xffffff, 1);
directionalLightTrain.position.set(5, 5, 5).normalize();
sceneTrain.add(directionalLightTrain);

const loaderTrain = new THREE.GLTFLoader();
loaderTrain.load('../models/MTrain163.gltf', (gltf) => {
    sceneTrain.add(gltf.scene);
    gltf.scene.scale.set(10, 10, 10);
    gltf.scene.position.set(0, 0, 0);
    animateTrain();
}, undefined, (error) => {
    console.error('Error loading the model for canvas 2:', error);
});

cameraTrain.position.set(100, 100, 150);

const controlsTrain = new THREE.OrbitControls(cameraTrain, rendererTrain.domElement);

function resizeCanvasTrain() {
  const width = window.innerWidth * 0.5;
  const height = window.innerHeight * 0.6;

  rendererTrain.setSize(width, height);
  cameraTrain.aspect = width / height;
  cameraTrain.updateProjectionMatrix();
}

function animateTrain() {
  requestAnimationFrame(animateTrain);
  controlsTrain.update();
  rendererTrain.render(sceneTrain, cameraTrain);
}

function resizeCanvas() {
    resizeCanvasGlock();
    resizeCanvasTrain();
  }
  
  // Handle window resizing
  window.addEventListener('resize', resizeCanvas);
  
  // Initial resize on load
  resizeCanvas();