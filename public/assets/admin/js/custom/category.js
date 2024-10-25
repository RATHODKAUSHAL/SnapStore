function toggleActions(event){
    event.stopPropagation();

    const actionButtons = event.target.closest('.relative').querySelector('.action-buttons');

    if(actionButtons){
        actionButtons.classList.toggle('hidden');
    }
}

document.addEventListener('click', function(event){
    const actionButtons = document.querySelectorAll('.action-bittons');
    actionButtons.forEach(button=>{
        if(!button.contains(event.target) && !button.previousElementSibling.contains(event.target)){
            button.classList.add('hidden');
        }
    });
});

let draggedRow = null;

function drag(event) {
    draggedRow = event.target; // Save the dragged row
    event.dataTransfer.effectAllowed = "move"; // Set allowed effect
}

function allowDrop(event) {
    event.preventDefault(); // Prevent default to allow drop
}

function drop(event) {
    event.preventDefault(); // Prevent default behavior
    if (event.target.tagName === 'TR' || event.target.tagName === 'TD') {
        const targetRow = event.target.closest('tr'); // Get the closest row
        const parentTable = targetRow.parentNode;

        // Insert draggedRow before the targetRow
        parentTable.insertBefore(draggedRow, targetRow.nextSibling);

        // Update the index or any other required properties here
        updateIndexes();

        const orderedIds = [];
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach((row) => {
            const categoryId = row.id.split('-')[1]; // Assuming ID format is 'row-1'
            orderedIds.push(categoryId);
        });

        // Send the new order to the backend
        updateCategoryOrder(orderedIds);
    }
}

function updateIndexes() {
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach((row, index) => {
        row.querySelector('td:first-child').textContent = index + 1; // Update index in the first cell
    });
}

// Attach the allowDrop and drop event listeners to the table body
document.querySelector('tbody').addEventListener('dragover', allowDrop);
document.querySelector('tbody').addEventListener('drop', drop);


function updateCategoryOrder(orderedIds) {
    fetch(url('/categories/update-order'), {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Ensure CSRF token is included
        },
        body: JSON.stringify({ ordered_ids: orderedIds }),
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.message); // Handle success
    })
    .catch(error => {
        console.error('Error:', error); // Handle error
    });
}