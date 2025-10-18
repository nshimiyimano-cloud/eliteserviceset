// theme.js - parallax, fade-in, smooth scrolling
document.addEventListener('DOMContentLoaded',function(){
document.querySelectorAll('a[href^="#"]').forEach(a=>{a.addEventListener('click',e=>{const t=document.querySelector(a.getAttribute('href'));if(t){e.preventDefault();t.scrollIntoView({behavior:'smooth'});}});});
function reveal(){document.querySelectorAll('.fade-in').forEach(el=>{if(el.getBoundingClientRect().top<window.innerHeight-50)el.classList.add('visible');});}
window.addEventListener('scroll',reveal);reveal();
window.addEventListener('scroll',()=>{document.querySelectorAll('.parallax').forEach(el=>{const y=-(window.scrollY*0.4);el.style.backgroundPosition='center '+y+'px';});});
});