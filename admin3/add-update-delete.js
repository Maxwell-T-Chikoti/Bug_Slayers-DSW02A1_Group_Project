document.addEventListener('DOMContentLoaded', function() {
    const partyList = document.getElementById('party-list');
    const addPartyButton = document.getElementById('add-party');
    const backButton = document.getElementById('back-button');
    const partyModal = document.getElementById('party-modal');
    const closeModal = document.querySelector('.modal .close');
    const partyForm = document.getElementById('party-form');
    const modalTitle = document.getElementById('modal-title');
    const submitButton = document.getElementById('submit-button');
    const deleteButton = document.getElementById('delete-button');
    const partyIndexField = document.getElementById('party-index');

    let parties = [
        'African National Congress', 
        'Economic Freedom Fighters', 
        'Democratic Alliance', 
        'uMkhonto we Sizwe', 
        'African Democratic Change', 
        'Freedom Front Plus', 
        'Build One SA', 
        'ActionSA', 
        'African Christian Democratic Party', 
        'Rise Mzansi', 
        'Pan Africanist Congress of Azania', 
        'United Democratic Movement', 
        'Good (political party)', 
        'Patriotic Alliance', 
        'Independent Civic Organisation of South Africa', 
        'African People\'s Convention', 
        'United Independent Movement', 
        'Abantu Batho Congress', 
        'National Coloured Congress', 
        'Forum for Service Delivery', 
        'United Christian Democratic Party'
    ];
    

    function renderParties() {
        partyList.innerHTML = '';
        parties.forEach((party, index) => {
            const li = document.createElement('li');
            li.innerHTML = `
                <span>${party}</span>
                <div>
                    <button class="edit-button" data-index="${index}">Edit</button>
                </div>
            `;
            partyList.appendChild(li);
        });

        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', (event) => {
                const index = event.target.dataset.index;
                openModal('update', index);
            });
        });
    }

    function openModal(action, index = null) {
        partyModal.style.display = 'block';
        partyIndexField.value = index;

        if (action === 'add') {
            modalTitle.textContent = 'Add Party';
            submitButton.textContent = 'Add';
            deleteButton.style.display = 'none';
            partyForm.reset();
        } else if (action === 'update') {
            modalTitle.textContent = 'Update Party';
            submitButton.textContent = 'Update';
            deleteButton.style.display = 'inline-block';
            document.getElementById('party-name').value = parties[index];
        }

        submitButton.dataset.action = action;
    }

    function closeModalHandler() {
        partyModal.style.display = 'none';
    }

    addPartyButton.addEventListener('click', () => {
        openModal('add');
    });

    closeModal.addEventListener('click', closeModalHandler);

    window.addEventListener('click', (event) => {
        if (event.target === partyModal) {
            closeModalHandler();
        }
    });

    partyForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const action = submitButton.dataset.action;
        const index = partyIndexField.value;
        const partyName = document.getElementById('party-name').value;

        if (action === 'add') {
            parties.push(partyName);
        } else if (action === 'update') {
            parties[index] = partyName;
        }

        renderParties();
        closeModalHandler();
    });

    deleteButton.addEventListener('click', () => {
        const index = partyIndexField.value;
        parties.splice(index, 1);
        renderParties();
        closeModalHandler();
    });

    backButton.addEventListener('click', () => {
        window.location.href = 'parties.html';
    });

    renderParties();
});
