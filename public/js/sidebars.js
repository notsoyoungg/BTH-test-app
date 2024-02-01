/* global bootstrap: false */
(function () {
  'use strict'
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()

function addAttributeFields(id) {
    // Создаем новые элементы для имени и значения атрибута
    var attributeNameInput = document.createElement("input");
    attributeNameInput.type = "text";
    attributeNameInput.name = "attribute_name[]";
    attributeNameInput.placeholder = "Имя атрибута";
    attributeNameInput.classList.add("form-control");

    var attributeValueInput = document.createElement("input");
    attributeValueInput.type = "text";
    attributeValueInput.name = "attribute_value[]";
    attributeValueInput.placeholder = "Значение атрибута";
    attributeValueInput.classList.add("form-control", "mx-1");
    attributeValueInput.required = true;

    // Создаем кнопку для удаления поля
    var removeButton = document.createElement("button");
    removeButton.type = "button";
    removeButton.innerHTML = '<i class="fa-solid fa-trash"></i>';
    removeButton.classList.add("btn", "btn-danger", "mx-1");
    removeButton.addEventListener("click", function() {
        removeAttributeFields(attributeContainer);
    });

    // Создаем контейнер для хранения полей атрибутов и кнопки удаления
    var attributeContainer = document.createElement("div");
    attributeContainer.classList.add("d-flex", "mt-2");
    attributeContainer.appendChild(attributeNameInput);
    attributeContainer.appendChild(attributeValueInput);
    attributeContainer.appendChild(removeButton);

    // Добавляем новые элементы в раздел для атрибутов
    var attributesSection = document.getElementById(id);
    attributesSection.appendChild(attributeContainer);
}

function removeAttributeFields(attributeContainer) {
    // Удаляем весь контейнер
    attributeContainer.parentNode.removeChild(attributeContainer);
}


// function addAttributeFields(id) {
//     // Создаем новые элементы для имени и значения атрибута с использованием jQuery
//     let attributeNameInput = $('<input>', {
//         type: 'text',
//         name: 'attribute_name[]',
//         placeholder: 'Имя атрибута',
//         class: 'form-control',
//     });
//
//     let attributeValueInput = $('<input>', {
//         type: 'text',
//         name: 'attribute_value[]',
//         placeholder: 'Значение атрибута',
//         class: 'form-control mx-1',
//         required: true,
//     });
//
//     // Создаем кнопку для удаления поля с использованием jQuery
//     let removeButton = $('<button>', {
//         type: 'button',
//         html: '<i class="fa-solid fa-trash"></i>',
//         class: 'btn btn-danger mx-1',
//         click: function() {
//             removeAttributeFields(attributeContainer);
//         },
//     });
//
//     // Создаем контейнер для хранения полей атрибутов и кнопки удаления
//     let attributeContainer = $('<div>', {
//         class: 'd-flex mt-2',
//     });
//
//     // Добавляем новые элементы в контейнер с использованием jQuery
//     attributeContainer.append(attributeNameInput, attributeValueInput, removeButton);
//
//     // Добавляем контейнер в раздел для атрибутов с использованием jQuery
//     $('#' + id).append(attributeContainer);
// }
//
// function removeAttributeFields(attributeContainer) {
//     // Удаляем весь контейнер с использованием jQuery
//     attributeContainer.remove();
// }

window.addEventListener('load', function() {
    $('.show-product').on('click', function (event) {
        event.preventDefault();

        var url = $(this).data('url');

        $.ajax({
            url: url,
            method: 'GET',
            success: function (response) {
                if (response && response.body) {
                    $('#modal').html(response.body);
                    $('#modal_show').modal('show');
                } else {
                    console.error('API вернул неверный ответ:', response);
                }
            },
            error: function (error) {
                console.error('Ошибка при запросе к API', error);
            }
        });
    });


    $('.edit-product').on('click', function (event) {
        event.preventDefault();
        console.log('dhslghslkH');

        var url = $(this).data('url');

        $.ajax({
            url: url,
            method: 'GET',
            success: function (response) {
                if (response && response.body) {
                    $('#modal2').html(response.body);
                    $('#modal_edit').modal('show');
                } else {
                    console.error('API вернул неверный ответ:', response);
                }
            },
            error: function (error) {
                console.error('Ошибка при запросе к API', error);
            }
        });
    });
});
