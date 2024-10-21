function toggleActions(event){
    event.stopPropagation();

    const actionButtons = event.target.closest('.relative').querySelector('.action-buttons');

    if(actionButtons){
        actionButtons.classList.toggle('hidden');
    }
}

document.addEventListener('click', function(event){
    const actionButtons  = document.querySelectorAll('.action-bittons');
    actionButtons.forEach(button=>{
        if(!button.contains(event.target) && !button.previousElementSibling.contains(event.target)){
            button.classList.add('hidden');
        }
    });
});