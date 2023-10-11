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

const btnAbrirModal = 
document.querySelector("#btn-abrir-modal");
const btnCerrarModal =
document.querySelector("#btn-cerrar-modal");
const modal =
document-querySelector("#modal");

btnAbrirModal.addEventListener("click",() =>{
    modal.showModal();
})

btnCerrarModal.addEventListener("click", () =>{
    modal.close();
})