
import { createApp, ref, onMounted, onBeforeUnmount, reactive } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import initPaypal from './cart.js'


// Header - navigation -----------------------
const is_open = ref(false)

function toggleMenu() {
    if (!is_open.value) {
        is_open.value = true

    } else {
        is_open.value = false
    }
}

// Activity page -----------------------
const activity = ref(0)
const activity_list = ref(1)


// Homepage -----------------------

// Interactive_text + Robot_carousel
window.addEventListener('scroll', e => {
    state.scrollY = window.scrollY
    generateAnimatedText()
})

const letters = "abcdefghijklmnopqrstuvwxyz"

const word1 = ref("Reality")
const original_word1 = ref("Reality")
const word2 = ref("Innovation")
const original_word2 = ref("Innovation")

function generateWords(word, original_word, iteration) {
    return word
    .split("")
    .map((letter, index) => {
        if (index < iteration) {
            return original_word[index]
        }

        const random_letter = letters[Math.floor(Math.random() * 26)]

        if (index === 0) {
            return random_letter.toUpperCase()
        } else {
            return random_letter
        }
    })
    .join("")
}

const robot_carousel = document.querySelector("#robot_carousel")
const interactive_text = document.querySelector("#interactive_text")

const image1 = document.querySelector("#image1")
const image2 = document.querySelector("#image2")
const image3 = document.querySelector("#image3")
const image4 = document.querySelector("#image4")

function generateAnimatedText() {
    if(Math.floor(state.scrollHeight) == 9) {
        animateText("Reality", "Innovation")
        animateCarousel(image1)
        console.log(image1)
    }
    if(Math.floor(state.scrollHeight) == 10 || Math.floor(state.scrollHeight) == 19) {
        animateText("Curiosity", "Exploration")
        animateCarousel(image2)
    }
    if(Math.floor(state.scrollHeight) == 20 || Math.floor(state.scrollHeight) == 29) {
        animateText("Humanity", "Automation")
        animateCarousel(image3)
    }
    if(Math.floor(state.scrollHeight) == 30) {
        animateText("Impossibility", "Opportunity")
        animateCarousel(image4)
    }
    if(Math.floor(state.scrollHeight) >= 40) {
        robot_carousel.style.display = "none"
        interactive_text.style.display = "none"
        console.log(interactive_text)
    } else {
        robot_carousel.style.display = "block"
        interactive_text.style.display = "block"
    }
}

let active_word = null

function animateText(word, original_word) {
    if(active_word == word){
        return
    }

    active_word = word

    let iteration = 0
    let interval = null

    clearInterval(interval)

    interval = setInterval(() => {

        word1.value = generateWords(word, word, iteration)

        word2.value = generateWords(original_word, original_word, iteration)

        if (iteration >= word1.value.length && iteration >= word2.value.length) {
            clearInterval(interval);
        }

        iteration += 1 / 3

    }, 30)
}

function animateCarousel(image) {
    image.style.animation = "robot_carousel 3s ease-out forwards"
}

// Scroll_bar
const state = reactive({
    scrollHeight: 0
})

function updateScrollLine() {
    const window_top = window.pageYOffset
    const doc_height = document.documentElement.scrollHeight
    const window_height = window.innerHeight
    const scrolled = (window_top / (doc_height - window_height)) * 100

    state.scrollHeight = scrolled

    // generateAnimatedText()

    console.log(state.scrollY)
}


const root = {
    setup() {
        onMounted(initPaypal)

        onMounted(() => {
            window.addEventListener('scroll', updateScrollLine)
          })

        // onMounted(() => {
        //     window.addEventListener('scroll', e => {
        //         state.scrollY = window.scrollY
        //         generateAnimatedText()
        //     })
        //   })

        onBeforeUnmount(() => {
            window.removeEventListener('scroll', updateScrollLine)
        })

        return {
            //Propriétés
            is_open,
            activity,
            activity_list,
            // robot_carousel,
            // interactive_text,
            word1,
            word2,
            original_word1,
            original_word2,
            state,

            //Méthodes
            toggleMenu,
            // animateText,
            generateAnimatedText,

        }
    }
}

//Initialisation de vue
createApp(root).mount('#app')
