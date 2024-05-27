document.addEventListener('DOMContentLoaded', function() {
    const partyList = document.getElementById('party-list');
    const addPartyButton = document.getElementById('add-party');
    const deletePartyButton = document.getElementById('delete-party');
    const updatePartyButton = document.getElementById('update-party');

    // Placeholder data
    const parties = [
        'Party 1', 'Party 2', 'Party 3', 'Party 4', 'Party 5', 'Party 6',
        'Party 7', 'Party 8', 'Party 9', 'Party 10', 'Party 11', 'Party 12',
        'Party 13', 'Party 14', 'Party 15', 'Party 16', 'Party 17', 'Party 18',
        'Party 19', 'Party 20', 'Party 21', 'Party 22'
    ];

    function renderParties() {
        partyList.innerHTML = '';
        parties.forEach((party, index) => {
            const li = document.createElement('li');
            li.textContent = party;
            li.dataset.index = index;
            partyList.appendChild(li);
        });
    }

    addPartyButton.addEventListener('click', () => {
        window.location.href = 'add-update-delete.html?action=add';
    });

    deletePartyButton.addEventListener('click', () => {
        window.location.href = 'add-update-delete.html?action=delete';
    });

    updatePartyButton.addEventListener('click', () => {
        window.location.href = 'add-update-delete.html?action=update';
    });

    renderParties();
});
