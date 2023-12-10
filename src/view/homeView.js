const dataHobby = {
    icon: 'hanya ICON',
    title: 'Rekomendasi Hobi',
    rating: '⭐️ 0.00'
}

const {icon, title, rating} = dataHobby

const createCardHobby = () => {
    return `
    <div class='card-hobby_item'>
        <div class='hobby-icon'><bold>${icon}</bold></div>
        <h5 class='hobby-title'><bold><a href="detail.html">${title}</a></bold></h5>
        <p class='hobby-rating'><strong>${rating}</strong></p>
    </div>
    `
}

const homeCard = document.querySelector('.home-card_item')
const zoomButton = document.querySelector('.card-hobby_item')

for (let i = 0; i < 20; i++) {
    homeCard.innerHTML += createCardHobby()
}

zoomButton.addEventListener('mouseover', () => {
    zoomButton.style.transform = 'scale(1.2)';
});

zoomButton.addEventListener('mouseout', () => {
    zoomButton.style.transform = 'scale(1)';
});