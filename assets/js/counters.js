// assets/js/counters.js
document.addEventListener('DOMContentLoaded', function(){
    function animateCount(el, target, duration){
      let start = 0;
      const stepTime = Math.max(Math.floor(duration / Math.max(target,1)), 10);
      const increment = Math.max(1, Math.floor(target / (duration / stepTime)));
      const timer = setInterval(() => {
        start += increment;
        if(start >= target){
          el.textContent = target + '+';
          clearInterval(timer);
        } else {
          el.textContent = start + '+';
        }
      }, stepTime);
    }
  
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if(entry.isIntersecting){
          const container = entry.target;
          container.querySelectorAll('[data-target]').forEach(el => {
            const target = parseInt(el.getAttribute('data-target')) || 0;
            animateCount(el, target, 1500);
          });
          container.classList.add('visible');
          obs.unobserve(container);
        }
      });
    }, { threshold: 0.4 });
  
    document.querySelectorAll('.counter-grid').forEach(node => {
      node.classList.add('reveal');
      observer.observe(node);
    });
  });
  