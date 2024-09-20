
document.addEventListener('DOMContentLoaded', function() {
    // Retrieve farmer information from localStorage
    const farmerName = localStorage.getItem('farmerName');
    const phone = localStorage.getItem('phone');
    const location = localStorage.getItem('location');

  
    document.getElementById('farmerNameDisplay').textContent = farmerName;
    document.getElementById('phoneDisplay').textContent = phone;
    document.getElementById('locationDisplay').textContent = location;

    const cropForm = document.getElementById('cropForm');
    const cropList = document.getElementById('cropList');
    cropForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const cropName = document.getElementById('cropName').value;
        const li = document.createElement('li');
        li.textContent = cropName;
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.addEventListener('click', function() {
            cropList.removeChild(li);
        });
        li.appendChild(deleteButton);
        cropList.appendChild(li);
        cropForm.reset();
    });

    let balance = 0;
    const moneyForm = document.getElementById('moneyForm');
    const balanceDisplay = document.getElementById('balance');
    moneyForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const amount = parseFloat(document.getElementById('amount').value);
        balance += amount;
        balanceDisplay.textContent = balance.toFixed(2);
        moneyForm.reset();
    });
});
