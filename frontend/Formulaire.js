function ajouterFormation() {
    // Cloner le fieldset contenant les champs de formation
    let fieldset = document.getElementById('formationFieldset');
    let clonedFieldset = fieldset.cloneNode(true);

    // Remettre à zéro les valeurs des champs clonés
    let inputs = clonedFieldset.querySelectorAll('input');
    inputs.forEach(input => input.value = '');

    // Trouver le dernier fieldset cloné et insérer le nouveau cloné juste après
    let dernierCloné = fieldset.parentNode.lastElementChild.previousElementSibling;
    fieldset.parentNode.insertBefore(clonedFieldset, dernierCloné.nextSibling);
}
function ajouterExperience() {
    // Cloner le fieldset contenant les champs d'expérience
    let fieldset = document.getElementById('ExperienceFieldset');
    let clonedFieldset = fieldset.cloneNode(true);
  
    // Remettre à zéro les valeurs des champs clonés
    let inputs = clonedFieldset.querySelectorAll('input');
    inputs.forEach(input => input.value = '');

    // Remettre à zéro la valeur de la zone de texte de la description
    let descriptionTextarea = clonedFieldset.querySelector('textarea');
    descriptionTextarea.value = '';

    // Trouver le dernier fieldset cloné et insérer le nouveau cloné juste après
    let dernierCloné = fieldset.parentNode.lastElementChild.previousElementSibling;
    fieldset.parentNode.insertBefore(clonedFieldset, dernierCloné.nextSibling);
}
function ajoutercompétence() {
    
    let fieldset = document.getElementById('compétenceFieldset');
    let clonedFieldset = fieldset.cloneNode(true);

    
   // Remettre à zéro les valeurs des champs clonés
   let inputs = clonedFieldset.querySelectorAll('input');
   inputs.forEach(input => input.value = '');

   // Trouver le dernier fieldset cloné et insérer le nouveau cloné juste après
   let dernierCloné = fieldset.parentNode.lastElementChild.previousElementSibling;
   fieldset.parentNode.insertBefore(clonedFieldset, dernierCloné.nextSibling);
}
function ajouterlangue() {
    
    let fieldset = document.getElementById('langueFieldset');
    let clonedFieldset = fieldset.cloneNode(true);

    
    // Remettre à zéro les valeurs des champs clonés
    let inputs = clonedFieldset.querySelectorAll('input');
    inputs.forEach(input => input.value = '');

    // Trouver le dernier fieldset cloné et insérer le nouveau cloné juste après
    let dernierCloné = fieldset.parentNode.lastElementChild.previousElementSibling;
    fieldset.parentNode.insertBefore(clonedFieldset, dernierCloné.nextSibling);
}
function ajoutercertification() {
    
    let fieldset = document.getElementById('certificationfiledset');
    let clonedFieldset = fieldset.cloneNode(true);

    // Remettre à zéro les valeurs des champs clonés
    let inputs = clonedFieldset.querySelectorAll('input');
    inputs.forEach(input => input.value = '');

    // Trouver le dernier fieldset cloné et insérer le nouveau cloné juste après
    let dernierCloné = fieldset.parentNode.lastElementChild.previousElementSibling;
    fieldset.parentNode.insertBefore(clonedFieldset, dernierCloné.nextSibling);
}
