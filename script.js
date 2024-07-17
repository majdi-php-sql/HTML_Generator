document.getElementById('element').addEventListener('change', function () {
    const selectedElement = this.value;
    hideAllOptions();

    switch (selectedElement) {
        case 'form':
            document.getElementById('formOptions').style.display = 'block';
            break;
        case 'img':
            document.getElementById('imageOptions').style.display = 'block';
            break;
        case 'a':
            document.getElementById('linkOptions').style.display = 'block';
            break;
        case 'table':
            document.getElementById('tableOptions').style.display = 'block';
            break;
        case 'list':
            document.getElementById('listOptions').style.display = 'block';
            break;
        case 'iframe':
            document.getElementById('iframeOptions').style.display = 'block';
            break;
        default:
            break;
    }
});

document.getElementById('addField').addEventListener('click', function () {
    const fieldName = document.getElementById('fieldName').value;
    const fieldType = document.getElementById('fieldType').value;

    if (fieldName && fieldType) {
        addFormField(fieldName, fieldType);
        clearFormFieldInputs();
    }
});

function hideAllOptions() {
    document.getElementById('formOptions').style.display = 'none';
    document.getElementById('imageOptions').style.display = 'none';
    document.getElementById('linkOptions').style.display = 'none';
    document.getElementById('tableOptions').style.display = 'none';
    document.getElementById('listOptions').style.display = 'none';
    document.getElementById('iframeOptions').style.display = 'none';
}

function addFormField(fieldName, fieldType) {
    const fieldsContainer = document.getElementById('fieldsContainer');
    const fieldDiv = document.createElement('div');
    fieldDiv.textContent = `${fieldName}:${fieldType}`;
    fieldsContainer.appendChild(fieldDiv);

    const hiddenField = document.createElement('input');
    hiddenField.type = 'hidden';
    hiddenField.name = 'formFields[]';
    hiddenField.value = `${fieldName}:${fieldType}`;
    fieldsContainer.appendChild(hiddenField);
}

function clearFormFieldInputs() {
    document.getElementById('fieldName').value = '';
    document.getElementById('fieldType').value = 'text';
}
