const sceneCorvette = new THREE.Scene();
const cameraCorvette = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const rendererCorvette = new THREE.WebGLRenderer();
document.querySelector('.canvasCorvette').appendChild(rendererCorvette.domElement);

const ambientLightCorvette = new THREE.AmbientLight(0x404040, 2);
sceneCorvette.add(ambientLightCorvette);

const directionalLightCorvette = new THREE.DirectionalLight(0xffffff, 1);
directionalLightCorvette.position.set(5, 5, 5).normalize();
sceneCorvette.add(directionalLightCorvette);

const loaderCorvette = new THREE.GLTFLoader();
loaderCorvette.load('/models/StellarisCorvette.gltf', (gltf) => {
    sceneCorvette.add(gltf.scene);
    gltf.scene.scale.set(20, 20, 20);
    gltf.scene.position.set(0, 0, 0);
    animateCorvette();
}, undefined, (error) => {
    console.error('Error loading the model for canvas 1:', error);
});

cameraCorvette.position.set(100, 200, 200);

const controlsCorvette = new THREE.OrbitControls(cameraCorvette, rendererCorvette.domElement);

function resizeCanvasCorvette() {
  const width = window.innerWidth * 0.5; 
  const height = window.innerHeight * 0.6; 

  rendererCorvette.setSize(width, height);
  cameraCorvette.aspect = width / height;
  cameraCorvette.updateProjectionMatrix();
}

function animateCorvette() {
  requestAnimationFrame(animateCorvette);
  controlsCorvette.update();
  rendererCorvette.render(sceneCorvette, cameraCorvette);
}

//------------------------------------------------------------------------------------------

const sceneGTR = new THREE.Scene();
const cameraGTR = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const rendererGTR = new THREE.WebGLRenderer();
document.querySelector('.canvasGTR').appendChild(rendererGTR.domElement);


const ambientLightGTR = new THREE.AmbientLight(0x404040, 2);
sceneGTR.add(ambientLightGTR);

const directionalLightGTR = new THREE.DirectionalLight(0xffffff, 3);
directionalLightGTR.position.set(5, 5, 5).normalize();
sceneGTR.add(directionalLightGTR);

const loaderGTR = new THREE.GLTFLoader();
loaderGTR.load('/models/R35GTR1.gltf', (gltf) => {
    sceneGTR.add(gltf.scene);
    gltf.scene.scale.set(35, 35, 35);
    gltf.scene.position.set(0, 0, 0);
    animateGTR();
}, undefined, (error) => {
    console.error('Error loading the model for canvas 2:', error);
});

cameraGTR.position.set(100, 100, 150);

const controlsGTR = new THREE.OrbitControls(cameraGTR, rendererGTR.domElement);

function resizeCanvasGTR() {
  const width = window.innerWidth * 0.5;
  const height = window.innerHeight * 0.6;

  rendererGTR.setSize(width, height);
  cameraGTR.aspect = width / height;
  cameraGTR.updateProjectionMatrix();
}

function animateGTR() {
  requestAnimationFrame(animateGTR);
  controlsGTR.update();
  rendererGTR.render(sceneGTR, cameraGTR);
}

function resizeCanvas() {
    resizeCanvasCorvette();
    resizeCanvasGTR()
  }
  
  // Handle window resizing
  window.addEventListener('resize', resizeCanvas);
  
  // Initial resize on load
  resizeCanvas();