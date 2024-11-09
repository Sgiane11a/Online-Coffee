import * as THREE from "three";
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls";
import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader";

const scene = new THREE.Scene();

const light1 = new THREE.PointLight(0xd946ef, 35);
light1.position.set(-2, 2.5, 2);
scene.add(light1);

const light2 = new THREE.PointLight(0x6366f1, 25);
light2.position.set(1, 2, 1.1);
scene.add(light2);

const light3 = new THREE.PointLight(0x3b82f6, 35);
light3.position.set(2, 2.2, -2);
scene.add(light3);

const light4 = new THREE.PointLight(0x6366f1, 10);
light4.position.set(-1, 1, -1.5);
scene.add(light4);

const ambientLight = new THREE.AmbientLight(0x5b21b6);
scene.add(ambientLight);

const camera = new THREE.PerspectiveCamera(
  75,
  window.innerWidth / window.innerHeight,
  0.1,
  1000
);
camera.position.set(0.8, 1.4, 1.0);

const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
renderer.setSize(window.innerWidth, window.innerHeight);
const container = document.getElementById("coffee");
container.appendChild(renderer.domElement);

const controls = new OrbitControls(camera, renderer.domElement);
controls.target.set(0, 1, 0);

const fbxLoader = new GLTFLoader();

const coffee = await new Promise((resolve, reject) => {
    fbxLoader.load(
        "/models/coffee.glb", resolve, undefined, reject
      );
})

coffee.scene.scale.set(0.1, 0.1, 0.1);

scene.add(coffee.scene);

window.addEventListener("resize", onWindowResize, false);
function onWindowResize() {
  const container = document.getElementById("coffee");
  const width = window.innerWidth;
  const height = container.clientHeight;
    camera.aspect = width / height;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, height);
  render();
}

function animate() {
  requestAnimationFrame(animate);
  controls.update();
  render();
}

function render() {
  renderer.render(scene, camera);
}

animate();
