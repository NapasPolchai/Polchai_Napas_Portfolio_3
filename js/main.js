

const hamburgerBtn = document.getElementById('hamburgerBtn')
const mobileNavCloseBtn = document.getElementById('mobileNavCloseBtn')
const mobileNav = document.getElementById('mobileNav')

const toggleMobileNav = () => {
    mobileNav.classList.toggle('show')
}

hamburgerBtn.addEventListener('click', toggleMobileNav)
mobileNavCloseBtn.addEventListener('click', toggleMobileNav)




const tl = gsap.timeline()

tl.to('.hero', {
    x: 0,
    duration: .6
}).to('.hero', {
    opacity: 1,
    duration: .8
}, '-=.2')


// gsap.to('.hero', {
//     x: 0,
//     opacity: 1,
//     duration: .4
// })





