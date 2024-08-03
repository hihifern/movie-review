const slideStates = {
    'list': { currentIndex: 0, intervalId: null }
};

function showSlide(containerId, index) {
    const container = document.getElementById(containerId);
    const slides = container.querySelector('.slides');
    const totalSlides = container.querySelectorAll('.slide-movie').length;
    
    // จำนวนที่แสดงคือ 5
    const slidesToShow = 5;
    const slideWidth = 100 / slidesToShow; // ความกว้างของแต่ละสไลด์

    // คำนวณการเลื่อน
    const offset = (index * slideWidth) % (totalSlides * slideWidth);
    slides.style.transform = `translateX(-${offset}%)`;
    slideStates[containerId].currentIndex = index;
}

function nextSlide(containerId) {
    const state = slideStates[containerId];
    const totalSlides = document.getElementById(containerId).querySelectorAll('.slide-movie').length;
    
    const slidesToShow = 5;
    const totalSlidesToShow = Math.ceil(totalSlides / slidesToShow);
    
    state.currentIndex = (state.currentIndex + 1) % totalSlidesToShow;
    showSlide(containerId, state.currentIndex);
}

function prevSlide(containerId) {
    const state = slideStates[containerId];
    const totalSlides = document.getElementById(containerId).querySelectorAll('.slide-movie').length;
    
    const slidesToShow = 5;
    const totalSlidesToShow = Math.ceil(totalSlides / slidesToShow);

    state.currentIndex = (state.currentIndex - 1 + totalSlidesToShow) % totalSlidesToShow;
    showSlide(containerId, state.currentIndex);
}

slideStates['list'].intervalId = setInterval(() => nextSlide('list'), 3000);

// แสดงภาพแรกใน list
showSlide('list', 0);
