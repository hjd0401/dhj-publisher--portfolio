const slides = document.querySelector('.slides');
    const dots = document.querySelectorAll('.dot');
    let currentIndex = 0;
  
    function showSlide(index) {
      slides.style.transform = `translateX(-${index * 100}vw)`;
      dots.forEach(dot => dot.classList.remove('active'));
      dots[index].classList.add('active');
      currentIndex = index;
    }
  
    dots.forEach(dot => {
      dot.addEventListener('click', () => {
        const index = Number(dot.dataset.index);
        showSlide(index);
      });
    });
    var autoSlide = null;

document.querySelector('.next').addEventListener('click', function () {
  if (autoSlide) return; 
  autoSlide = setInterval(function () {
    currentIndex++;
    if (currentIndex > dots.length - 1) currentIndex = 0;
    showSlide(currentIndex);
  }, 3000);
});
