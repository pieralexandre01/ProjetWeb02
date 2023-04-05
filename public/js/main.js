
import { createApp, ref, onMounted, onBeforeUnmount, reactive } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import initPaypal from './cart.js'


// Header - navigation -----------------------
const is_open = ref(false)


// Toggle pour le bouton menu burger
function toggleMenu() {
    if (!is_open.value) {
        is_open.value = true

    } else {
        is_open.value = false
    }
}


// Activity page -----------------------

// Refs pour faire un @click et un v-show dans la page d'activitées
const activity = ref(0)
const activity_list = ref(1)


// Homepage -----------------------

// Interactive_text + Robot_carousel

// Accéder à l'état du scroll et activer la fonction generateAnimation lorsque la page se load
window.addEventListener('scroll', e => {
    state.scrollY = window.scrollY
    generateAnimation()
    animateInteractiveText()
    animateCallToAction()
})

// Scroll_bar

// La fonction reactive permet que la valeur du scrollHeight soit réactive et donc dynamise le code qui utilise cette propriété
const state = reactive({
    scrollHeight: 0,
    opacity: 1,
    scale: 1
})

let scroll_position = 0
let scroll_direction = 0

// Fonction qui encapsule la position en % du scrollHeight de "window"
function updateScrollLine(e) {
    const window_top = window.pageYOffset
    const doc_height = document.documentElement.scrollHeight
    const window_height = window.innerHeight
    const scroll_state = (window_top / (doc_height - window_height)) * 100
    const opacity = 1 - (window_top / window.innerHeight)
    const scale = 1 - (window_top / window.innerHeight)


    state.scrollHeight = scroll_state
    state.opacity = opacity
    state.scale = scale

    // Vérifie la direction du scroll et écrase la valeur de "position" pour la valeur de "scroll_state"
    scroll_direction = scroll_state - scroll_position
    scroll_position = scroll_state
}

// Variables pour l'animation de texte
const interactive_text = ref(null)
const letters = "abcdefghijklmnopqrstuvwxyz"
const word1 = ref("Reality")
const original_word1 = ref("Reality")
const word2 = ref("Innovation")
const original_word2 = ref("Innovation")
let active_word = null

// Variables pour l'animation des images de robot (carousel)
const robot_carousel = ref(null)
const image1 = ref(null)
const image2 = ref(null)
const image3 = ref(null)
const image4 = ref(null)

// Variable pour l'animation du "call-to-action" de scroll_down
const scroll_down_cta = ref(null)


// Génère des mots avec des lettres aléatoires provenant de la variable "letters"
function shuffleLetters(word, original_word, iteration) {
    return word
     // Sépare le mot en tableau
    .split("")
     // Fait un boucle sur le tableau
    .map((letter, index) => {
        // Retourne l'index si c'est plus petit que l'iteration
        if (index < iteration) {
            return original_word[index]
        }
        // Encapsule la lettre aléatoire
        const random_letter = letters[Math.floor(Math.random() * 26)]

        // Met en majuscule la première lettre à la position 0 de l'index, sinon retourne les lettres en minuscule
        if (index === 0) {
            return random_letter.toUpperCase()
        } else {
            return random_letter
        }
    })
    // Rassemble tous les lettres du tableau en string
    .join("")
}

// Fonction qui anime le texte
function generateWords(word, original_word) {
    // Si le mot actif est déjà affiché, l'animation ne sera pas réactivé
    if(active_word == word){
        return
    }
    // Encapsule la valeur de "word"
    active_word = word

    let iteration = 0
    let interval = null

    // Cancel l'action fait dans le setInterval
    clearInterval(interval)

    interval = setInterval(() => {

        // Encapsule les valeurs
        word1.value = shuffleLetters(word, word, iteration)

        word2.value = shuffleLetters(original_word, original_word, iteration)

        // Cancel l'action fait dans le setInterval si l'itération est plus grande que la valeur des mots
        if (iteration >= word1.value.length && iteration >= word2.value.length) {
            clearInterval(interval);
        }

        // Fait l'itération 3 fois pour chaque 0.03 seconde
        iteration += 1 / 3

    }, 30)
}

// Fonction qui associe la ligne de code d'animation à l'image selon la direction du scroll
function animateCarousel(image) {
    if(scroll_direction > 0) {
        image.style.animation = "robot_carousel 3s steps(10000, end) forwards"
    } else {
        image.style.animation = "robot_carousel 3s ease-out reverse forwards"
    }

    setTimeout( e => {
        image.style.animation = ""
    }, 3050)
}

function animateInteractiveText() {
    const opacity = 1
    const scroll_state = Math.floor(state.scrollHeight)

    if (scroll_state >= 40 && scroll_state <= 45) {
        const opacity_difference = 1 - ((scroll_state - 40) / 5)
        interactive_text.value.style.opacity = opacity_difference * opacity

    } else if (scroll_state < 40) {
        interactive_text.value.style.opacity = opacity

    } else if (scroll_state > 45) {
        interactive_text.value.style.opacity = 0
    }
}

function animateCallToAction() {
    const scale = 0.1
    const scroll_state = Math.floor(state.scrollHeight)

    if (scroll_state >= 45 && scroll_state <= 50) {
        const scale_difference = 0.1 + ((scroll_state - 45))
        scroll_down_cta.value.style.transform = "scale(" + (scale_difference * scale) + ")"

console.log(scroll_down_cta.value)

    } else if (scroll_state < 45) {
        scroll_down_cta.value.style.transform = "scale(" + scale + ")"

    } else if (scroll_state > 50) {
        scroll_down_cta.value.style.transform = "scale(" + 1 + ")"
    }
}

// if (scroll_state >= 45 && scroll_state <= 50) {
//     const scale_difference = 1 + ((scroll_state - 45) / 5)
//     scroll_down_cta.value.style.scale = scale_difference * scale

// console.log(scroll_down_cta.value.style)

// } else if (scroll_state < 45) {
//     scroll_down_cta.value.style.scale = scale

// } else if (scroll_state > 50) {
//     scroll_down_cta.value.style.scale = 1
// }



// Fonction qui génère les animations du texte et des images en effet carrousel
function generateAnimation() {
    const scroll_state = Math.floor(state.scrollHeight)

    // Vérification de la position du scroll height (%) pour activer les fonctions
    if(scroll_direction > 0) {
        if(scroll_state == 1) {
            generateWords("Reality", "Innovation")
            animateCarousel(image1.value)
        }

        if(scroll_state == 10) {
            generateWords("Curiosity", "Exploration")
            animateCarousel(image2.value)
        }

        if(scroll_state == 20) {
            generateWords("Humanity", "Automation")
            animateCarousel(image3.value)
        }

        if(scroll_state == 30) {
            generateWords("Impossibility", "Opportunity")
            animateCarousel(image4.value)
        }

    } else {
        if(scroll_state == 9) {
            generateWords("Reality", "Innovation")
            animateCarousel(image1.value)
        }

        if(scroll_state == 19) {
            generateWords("Curiosity", "Exploration")
            animateCarousel(image2.value)
        }

        if(scroll_state == 29) {
            generateWords("Humanity", "Automation")
            animateCarousel(image3.value)
        }

        if(scroll_state == 39) {
            generateWords("Impossibility", "Opportunity")
            animateCarousel(image4.value)
        }
    }

    // Selon le scrollHeight, les divs seront en display:none ou display: block/flex
    if(scroll_state >= 46) {
        robot_carousel.value.style.setProperty('display', 'none', 'important')
        interactive_text.value.style.setProperty('display', 'none', 'important')

    } else {
        robot_carousel.value.style.setProperty('display', 'flex', 'important')
        interactive_text.value.style.setProperty('display', 'flex', 'important')
    }
}

const root = {
    setup() {
        onMounted(() => {
            initPaypal()

            // Active l'événement de scroll et exécute la fonction lors de l'action du scroll
            window.addEventListener('scroll', updateScrollLine)
          })

        // Désactive l'événement de scroll et la fonction ne sera plus exécutée
        onBeforeUnmount(() => {
            window.removeEventListener('scroll', updateScrollLine)
        })

        return {
            //Propriétés
            is_open,
            activity,
            activity_list,
            robot_carousel,
            interactive_text,
            scroll_down_cta,
            image1,
            image2,
            image3,
            image4,
            word1,
            word2,
            original_word1,
            original_word2,
            state,

            //Méthodes
            toggleMenu,
        }
    }
}

//Initialisation de vue
createApp(root).mount('#app')
