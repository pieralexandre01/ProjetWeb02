
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

// Interactive_text
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

function generateAnimatedText() {
    if(Math.floor(state.scrollHeight) == 24) {
        animateText("Reality", "Innovation")
    }
    if(Math.floor(state.scrollHeight) == 25 || Math.floor(state.scrollHeight) == 49) {
        animateText("Curiosity", "Exploration")
    }
    if(Math.floor(state.scrollHeight) == 50 || Math.floor(state.scrollHeight) == 74) {
        animateText("Humanity", "Automation")
    }
    if(Math.floor(state.scrollHeight) == 75) {
        animateText("Impossibility", "Opportunity")
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

    generateAnimatedText()

    console.log(state.scrollHeight)
}


const root = {
    setup() {
        onMounted(initPaypal)

        onMounted(() => {
            window.addEventListener('scroll', updateScrollLine);
          })

        onBeforeUnmount(() => {
            window.removeEventListener('scroll', updateScrollLine);
        })

        return {
            //Propriétés
            is_open,
            activity,
            activity_list,
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
