const sceneG36 = new THREE.Scene();
const cameraG36 = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const rendererG36 = new THREE.WebGLRenderer();
document.querySelector('.canvasG36').appendChild(rendererG36.domElement);

const ambientLightG36 = new THREE.AmbientLight(0x404040, 2);
sceneG36.add(ambientLightG36);

const directionalLightG36 = new THREE.DirectionalLight(0xffffff, 1);
directionalLightG36.position.set(5, 5, 5).normalize();
sceneG36.add(directionalLightG36);

const loaderG36 = new THREE.GLTFLoader();
loaderG36.load('../models/G36C1DL.gltf', (gltf) => {
    sceneG36.add(gltf.scene);
    gltf.scene.scale.set(1, 1, 1);
    gltf.scene.position.set(0, 0, 0);
    animateG36();
}, undefined, (error) => {
    console.error('Error loading the model for canvas 1:', error);
});

cameraG36.position.set(100, 200, 200);

const controlsG36 = new THREE.OrbitControls(cameraG36, rendererG36.domElement);

function resizeCanvasG36() {
  const width = window.innerWidth * 0.5; 
  const height = window.innerHeight * 0.6; 

  rendererG36.setSize(width, height);
  cameraG36.aspect = width / height;
  cameraG36.updateProjectionMatrix();
}

function animateG36() {
  requestAnimationFrame(animateG36);
  controlsG36.update();
  rendererG36.render(sceneG36, cameraG36);
}

//------------------------------------------------------------------------------------------

const sceneHead = new THREE.Scene();
const cameraHead = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const rendererHead = new THREE.WebGLRenderer();
document.querySelector('.canvasHead').appendChild(rendererHead.domElement);


const ambientLightHead = new THREE.AmbientLight(0x404040, 2);
sceneHead.add(ambientLightHead);

const directionalLightHead = new THREE.DirectionalLight(0xffffff, 1);
directionalLightHead.position.set(5, 5, 5).normalize();
sceneHead.add(directionalLightHead);

const loaderHead = new THREE.GLTFLoader();
loaderHead.load('../models/Head.gltf', (gltf) => {
    sceneHead.add(gltf.scene);
    gltf.scene.scale.set(50, 50, 50);
    gltf.scene.position.set(0, 0, 0);
    animateHead();
}, undefined, (error) => {
    console.error('Error loading the model for canvas 2:', error);
});

cameraHead.position.set(300, 100, 150);

const controlsHead = new THREE.OrbitControls(cameraHead, rendererHead.domElement);

function resizeCanvasHead() {
  const width = window.innerWidth * 0.5;
  const height = window.innerHeight * 0.6;

  rendererHead.setSize(width, height);
  cameraHead.aspect = width / height;
  cameraHead.updateProjectionMatrix();
}

function animateHead() {
  requestAnimationFrame(animateHead);
  controlsHead.update();
  rendererHead.render(sceneHead, cameraHead);
}

function resizeCanvas() {
    resizeCanvasG36();
    resizeCanvasHead()
  }
  
  // Handle window resizing
  window.addEventListener('resize', resizeCanvas);
  
  // Initial resize on load
  resizeCanvas();