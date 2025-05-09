//Filtering and Search
function filterListings() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const cityFilter = document.getElementById('cityFilter').value;
    const priceFilter = document.getElementById('priceFilter').value;

    const listings = document.querySelectorAll('.listing-card');

    listings.forEach(listing => {
    const title = listing.getAttribute('data-title').toLowerCase();
    const city = listing.getAttribute('data-city');
    const price = parseInt(listing.getAttribute('data-price'));

        let matchesSearch = title.includes(searchInput);
        let matchesCity = cityFilter === "" || city === cityFilter;
        let matchesPrice = false;

        if (priceFilter === "") {
            matchesPrice = true;
        } else if (priceFilter === "low" && price < 800) {
            matchesPrice = true;
        } else if (priceFilter === "medium" && price >= 800 && price <= 1200) {
            matchesPrice = true;
        } else if (priceFilter === "high" && price > 1200) {
            matchesPrice = true;
        }

        if (matchesSearch && matchesCity && matchesPrice) {
            listing.style.display = "block";
        } else {
        listing.style.display = "none";
        }
    });
}
//Opens more Detail Option
function openModal(title, location, price, phone, email) {
    document.getElementById('modal-title').innerText = title;
    document.getElementById('modal-location').innerHTML = `<strong>Location:</strong> ${location}`;
    document.getElementById('modal-price').innerHTML = `<strong>Price:</strong> ${price}`;
    document.getElementById('modal-phone').innerHTML = `<strong>Phone Number:</strong> ${phone}`;
    document.getElementById('modal-email').innerHTML = `<a href="mailto:${email}">${email}</a>`;
    document.getElementById('modal').style.display = 'flex';
}

//Closes more detail option
function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

function changeImage(button, direction) {
    // Find the closest card container
    const card = button.closest('.listing-card');
    const images = card.querySelectorAll('.card-image');

    // Determine the currently visible image
    let currentImageIndex = 0;
    images.forEach((image, index) => {
        if (image.style.display === 'block') {
            currentImageIndex = index;
        }
    });

    // Hide the current image
    images[currentImageIndex].style.display = 'none';

    // Calculate the next image index (wrap around using modulo)
    const nextImageIndex = (currentImageIndex + direction + images.length) % images.length;

    // Show the next image
    images[nextImageIndex].style.display = 'block';
}


