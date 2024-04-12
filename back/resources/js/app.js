import './bootstrap';

import { createApp } from 'vue';
import ListaCaracteristicas from './components/ListaCaracteristicas.vue';
import TinyMCE from './components/TinyMCE.vue';

createApp({})
    .component('ListaCaracteristicas', ListaCaracteristicas)
    .component('TinyMCE', TinyMCE)
    .mount('#app')

// get the close btn
var alert_button = document.getElementsByClassName("alert-btn-close");

// looping into all alert close btns
for (let i = 0; i < alert_button.length; i++) {
    const btn = alert_button[i];

    btn.addEventListener('click', function () {
        var dad = this.parentNode;
        dad.classList.add('animated', 'fadeOut');
        setTimeout(() => {
            dad.remove();
        }, 1000);
    });

}

// work with sidebar
var btn = document.getElementById('sliderBtn'),
    sideBar = document.getElementById('sideBar'),
    sideBarHideBtn = document.getElementById('sideBarHideBtn');

// show sidebar
btn.addEventListener('click', function () {
    if (sideBar.classList.contains('md:-ml-64')) {
        sideBar.classList.replace('md:-ml-64', 'md:ml-0');
        sideBar.classList.remove('md:slideOutLeft');
        sideBar.classList.add('md:slideInLeft');
    }
});

// hide sideBar
sideBarHideBtn.addEventListener('click', function () {
    if (sideBar.classList.contains('md:ml-0', 'slideInLeft')) {
        var _class = function () {
            sideBar.classList.remove('md:slideInLeft');
            sideBar.classList.add('md:slideOutLeft');

            console.log('hide');
        };
        var animate = async function () {
            await _class();

            setTimeout(function () {
                sideBar.classList.replace('md:ml-0', 'md:-ml-64');
                console.log('animated');
            }, 300);

        };

        _class();
        animate();
    }
});
// end with sidebar

const dropArea = document.getElementById('drop-area');
const fileElem = document.getElementById('fileElem');
const fileLabel = document.getElementById('fileLabel');
const thumbnails = document.getElementById('thumbnails');
const enlargedImageContainer = document.getElementById('enlarged-image-container');
const enlargedImage = document.getElementById('enlarged-image');

// Função para prevenir comportamento padrão de drag and drop
function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

// Adicionando e removendo destaque durante drag and drop
['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
    dropArea.addEventListener(eventName, highlight, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
    dropArea.addEventListener(eventName, unhighlight, false);
});

function highlight() {
    fileLabel.innerText = 'Solte os arquivos aqui!';
}

function unhighlight() {
    fileLabel.innerText = 'Arraste e solte ou clique aqui para selecionar arquivos';
}

// Tratando o evento de drop
dropArea.addEventListener('drop', handleDrop, false);

// Tratando o evento de seleção de arquivos
fileElem.addEventListener('change', () => {
    const files = fileElem.files;
    handleFiles(files);
}, false);

// Função para tratar os arquivos após o drop ou seleção
function handleFiles(files) {
    const fileArray = Array.from(files);
    thumbnails.innerHTML = '';

    fileArray.forEach(file => {
        const reader = new FileReader();

        reader.onload = function (e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('thumbnail');
            img.addEventListener('click', () => {
                showImage(file);
            });
            thumbnails.appendChild(img);
        };

        reader.readAsDataURL(file);
    });
}

// Função para exibir a imagem ampliada
function showImage(file) {
    const reader = new FileReader();

    reader.onload = function (e) {
        enlargedImage.src = e.target.result;
        enlargedImageContainer.style.display = 'block';
    };

    reader.readAsDataURL(file);
}
function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;

    handleFiles(files);
}

function hideImage() {
    enlargedImageContainer.style.display = 'none';
}

enlargedImageContainer.addEventListener('mouseleave', hideImage, false);
