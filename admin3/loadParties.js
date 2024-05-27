document.addEventListener('DOMContentLoaded', function() {
    fetch('parties.html')
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            const partyList = doc.querySelector('.party-list');

            // Remove images from the party list
            const images = partyList.querySelectorAll('img');
            images.forEach(img => img.remove());

            // Insert the modified party list into the container
            const partyContainer = document.getElementById('party-container');
            partyContainer.innerHTML = partyList.innerHTML;

            // Add styles to each party item
            const parties = partyContainer.querySelectorAll('.Parti');
            parties.forEach(party => {
                party.style.borderBottom = '1px solid black';
                party.style.paddingBottom = '5px';
            });
        })
        .catch(error => console.error('Error loading parties:', error));
});
