const container = document.querySelector('.container');
    const dots = document.querySelectorAll('.dot');

    dots.forEach((btn, index) => {
      btn.addEventListener('click', () => {
        container.style.transform = `translateX(-${index * 100}vw)`;
        dots.forEach(dot => dot.classList.remove('active'));
        btn.classList.add('active');
      });
    });