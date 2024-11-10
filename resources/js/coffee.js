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

const light5 = new THREE.SpotLight(0xf1abfc, 20);
light5.position.set(0, 3, 0);
scene.add(light5);  

const ambientLight = new THREE.AmbientLight(0x691a75);
scene.add(ambientLight);

const camera = new THREE.PerspectiveCamera(
    75,
    window.innerWidth / window.innerHeight,
    0.1,
    1000
);
camera.position.set(1, 1.8, 1);

const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true, canvas: document.getElementById("coffee") });
renderer.setSize(window.innerWidth, window.innerHeight);

const fbxLoader = new GLTFLoader();

const coffee = await new Promise((resolve, reject) => {
    fbxLoader.load("/models/coffee.glb", resolve, undefined, reject);
});

coffee.scene.position.set(0, 0, 0);

coffee.scene.scale.set(0.1, 0.1, 0.1);

camera.lookAt(coffee.scene.position);

scene.add(coffee.scene);

window.addEventListener("resize", onWindowResize, false);
function onWindowResize() {
    const width = window.innerWidth;
    const height = window.innerHeight;
    camera.aspect = width / height;
    camera.updateProjectionMatrix();
    renderer.setSize(width, height);
    render();
}

function animate() {
    requestAnimationFrame(animate);
    coffee.scene.rotation.y += 0.005;
    render();
}

function render() {
    renderer.render(scene, camera);
}

animate();
