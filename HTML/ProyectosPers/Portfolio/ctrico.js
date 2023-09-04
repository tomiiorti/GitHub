/*window.requestAnimFrame = function (){
    return(
        window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRquestAnimationFrame ||
        window.msRequestAnimationFrame ||
        function (callback){
            window.setTimeout(callback);
        }
    );
};

function init(elmid){
    let canvas =document.getElementById(elemid),
    c = canvas.getContext("2d"),
    w = (canvas.width = window.innerWidth),
    h = (canvas.height = windows.innerHeight);
    c.fillStyle = "rgba(30,30,30,1)";
    c.fillRect(0,0,w,h);
    return { c: c, canvas: canvas};
}
window.onloead = function(){
    let c = init("canvas").c,
    canvas = init("canvas").canvas,
    w = (canvas.width = window.innerWidth),
    h = (canvas.height = window.innerHeight)
}*/
var swiper = new Swiper (".mySwiper",  {
    slidesPerView: 1,
    centeredSlides:true,
    loop:true,
    spaceBetween: 30,
    grabCursor:true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    breakpoints :{
        991: {
            slidesPerView: 3
        }
    }
});