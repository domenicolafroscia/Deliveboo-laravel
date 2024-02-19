import './bootstrap';

import "~resources/scss/app.scss";

import * as boostrap from 'bootstrap';
import { read } from '@popperjs/core';

import.meta.glob([
    '../img/**'
]);

const previewImgElem = document.getElementById('preview-img');

document.getElementById('image').addEventListener
('change', function() {
    const selectedFile = this.files[0];
    if (selectedFile) {
        const reader = new FileReader();
        reader.addEventListener('load', function() {
            previewImgElem.src = reader.result;
        })
        reader.readAsDataURL(selectedFile);
    }
})