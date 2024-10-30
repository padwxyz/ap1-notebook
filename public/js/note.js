function loadFacilities() {
    const locationId = document.getElementById('location').value;
    const facilitySelect = document.getElementById('facility');
    facilitySelect.innerHTML = '<option value="">Choose Facility</option>';

    if (locationId) {
        fetch(`/facilities/${locationId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(facility => {
                    const option = document.createElement('option');
                    option.value = facility.id;
                    option.text = facility.facility_name;
                    facilitySelect.appendChild(option);
                });
                facilitySelect.disabled = false;
            })
            .catch(error => console.error('Error fetching facilities:', error));
    } else {
        facilitySelect.disabled = true;
    }
    resetSelect('category');
    resetSelect('item');
}

function loadCategories() {
    const facilityId = document.getElementById('facility').value;
    const categorySelect = document.getElementById('category');
    categorySelect.innerHTML = '<option value="">Choose Category</option>';

    if (facilityId) {
        fetch(`/categories/${facilityId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.text = category.category_name;
                    categorySelect.appendChild(option);
                });
                categorySelect.disabled = false;
            })
            .catch(error => console.error('Error fetching categories:', error));
    } else {
        categorySelect.disabled = true;
    }
    resetSelect('item');
}

function loadItems() {
    const categoryId = document.getElementById('category').value;
    const itemSelect = document.getElementById('item');
    itemSelect.innerHTML = '<option value="">Choose Item</option>';

    if (categoryId) {
        fetch(`/items/${categoryId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.id;
                    option.text = item.item_name;
                    itemSelect.appendChild(option);
                });
                itemSelect.disabled = false;
            })
            .catch(error => console.error('Error fetching items:', error));
    } else {
        itemSelect.disabled = true;
    }
}