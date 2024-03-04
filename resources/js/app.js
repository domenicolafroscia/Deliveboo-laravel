import './bootstrap';

import "~resources/scss/app.scss";

import * as bootstrap from 'bootstrap';
import { read } from '@popperjs/core';

import.meta.glob([
    '../img/**'
]);

const previewImgElem = document.getElementById('preview-img');
const image = document.getElementById('image');
const imagePreview = document.getElementById('image-preview');

if (image) {
    image.addEventListener('change', function () {
        const selectedFile = this.files[0];
        if (selectedFile) {
            const reader = new FileReader();
            reader.addEventListener('load', function () {
                if (previewImgElem.src = reader.result) {
                   imagePreview.remove();
                }
            })
            reader.readAsDataURL(selectedFile);
        }
    });
}



const buttons = document.querySelectorAll('.btn-delete');

buttons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();

        const deleteModalElem = document.getElementById('delete_modal');
        const deleteModal = new bootstrap.Modal(deleteModalElem);

        const title = button.getAttribute('data-title');
        document.getElementById('title-to-delete').innerHTML = title;

        document
            .getElementById('delete-btn')
            .addEventListener('click', () => {
                button.parentElement.submit();
            })

        deleteModal.show();
    });
})


const allButtons = document.querySelectorAll('.move-delete');

allButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();

        const deleteModalElem = document.getElementById('move_modal');
        const deleteModal = new bootstrap.Modal(deleteModalElem);

        const title = button.getAttribute('data-title');
        document.getElementById('title-to-move').innerHTML = title;

        document
            .getElementById('move-btn')
            .addEventListener('click', () => {
                button.parentElement.submit();
            })

        deleteModal.show();
    });
})