window.sr = ScrollReveal();

    sr.reveal('.box-left', {
        duration:2200,
        origin:'left',
        distance:'200px'
       
        
    });
    sr.reveal('.box-right', {
        duration:2200,
        origin:'right',
        distance:'200px'
       
        
    });
    sr.reveal('.vino3', {
        duration:2200,
        origin:'left',
        distance:'200px'
       
        
    });
    sr.reveal('.vino4', {
        duration:2200,
        origin:'right',
        distance:'200px'
       
        
    });
    sr.reveal('.card', {
        duration:2200,
        origin:'right',
        distance:'200px'
       
        
    });
    sr.reveal('.card2', {
        duration:2200,
        origin:'left',
        distance:'200px'
       
        
    });
    sr.reveal('.vino2', {
        duration:2200,
        origin:'right',
        distance:'200px'
       
        
    });
    sr.reveal('.vino3', {
        duration:2200,
        origin:'left',
        distance:'200px'
       
        
    });
    sr.reveal('.vino4', {
        duration:2200,
        origin:'right',
        distance:'200px'
       
        
    });
    function toggleMenu() {
        const menu = document.querySelector('.menu');
        menu.classList.toggle('active');
    }
document.getElementById('ajustesBtn').addEventListener('mouseover', function() {
    document.getElementById('ajustesDiv').classList.add('hover');
});

document.getElementById('ajustesBtn').addEventListener('mouseout', function() {
    document.getElementById('ajustesDiv').classList.remove('hover');
});