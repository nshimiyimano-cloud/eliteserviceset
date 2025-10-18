// simple interactions
document.addEventListener('DOMContentLoaded', function(){
  document.querySelectorAll('[data-filter]').forEach(btn => btn.addEventListener('click', function(e){
    e.preventDefault();
    const type = this.dataset.filter;
    document.querySelectorAll('.project-card').forEach(it => { it.style.display = (type==='all' || it.dataset.type===type) ? 'inline-block' : 'none'; });
  }));
});