const hiddenElements = document.querySelectorAll('.hos');
hiddenElements.forEach((el) => {
  el.classList.add('fade'); // add initial fade animation
});

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add('sos'); // add the class to the element when it becomes visible
      entry.target.classList.remove('fade'); // remove the fade animation when the element is visible
      observer.unobserve(entry.target); // stop observing the element
    }
  });
});

hiddenElements.forEach((el) => {
  observer.observe(el);
});

const animationDelay = (elements, delay) => {
    elements.forEach((el, index) => {
        el.style.transitionDelay = delay * index + 'ms';
    });
}

const popularJob = document.querySelectorAll('.popular-job');
animationDelay(popularJob, 100);

const featuredJobs = document.querySelectorAll('.featured-jobs');
animationDelay(featuredJobs, 100);

const featuredCity = document.querySelectorAll('.featured-city');
animationDelay(featuredCity, 100);

const freelancerSectionCards = document.querySelectorAll('.freelancer-section-cards');
animationDelay(freelancerSectionCards, 100);

const footerSocialButtons = document.querySelectorAll('.footer-social-buttons');
animationDelay(footerSocialButtons, 100);