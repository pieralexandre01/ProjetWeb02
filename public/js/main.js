
import { createApp, ref, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
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

//Interactive_text
const letters = "abcdefghijklmnopqrstuvwxyz";

const word1 = ref("Reality");
const original_word1 = ref("Reality");
const word2 = ref("Innovation");
const original_word2 = ref("Innovation");

function changeOriginalWord1() {
    if (original_word1.value === "Reality") {
        word1.value = "Curiosity"
        original_word1.value = "Curiosity"
        return
    }

    if (original_word1.value === "Curiosity") {
        word1.value = "Humanity"
        original_word1.value = "Humanity"
        return
    }

    if (original_word1.value === "Humanity") {
        word1.value = "Impossibility"
        original_word1.value = "Impossibility"
        return
    }

    if (original_word1.value === "Impossibility") {
        word1.value = "Reality"
        original_word1.value = "Reality"
        return
    }
}

function changeOriginalWord2() {
    if (original_word2.value === "Innovation") {
        word2.value = "Exploration"
        original_word2.value = "Exploration"
        return
    }

    if (original_word2.value === "Exploration") {
        word2.value = "Automation"
        original_word2.value = "Automation"
        return
    }

    if (original_word2.value === "Automation") {
        word2.value = "Opportunity"
        original_word2.value = "Opportunity"
        return
    }

    if (original_word2.value === "Opportunity") {
        word2.value = "Innovation"
        original_word2.value = "Innovation"
        return
    }
}

function animateText() {
    let iteration = 0;
    let interval = null;

    changeOriginalWord1()
    changeOriginalWord2()

    clearInterval(interval);

    interval = setInterval(() => {

        word1.value = word1.value
            .split("")
            .map((letter, index) => {
                if (index < iteration) {
                    if (index == 0) { }
                    return original_word1.value[index];
                }

                const random_letter = letters[Math.floor(Math.random() * 26)];

                if (index === 0) {
                    return random_letter.toUpperCase()
                } else {
                    return random_letter;
                }
            })
            .join("");

        word2.value = word2.value
            .split("")
            .map((letter, index) => {
                if (index < iteration) {
                    if (index == 0) { }
                    return original_word2.value[index];
                }

                const random_letter = letters[Math.floor(Math.random() * 26)];

                if (index === 0) {
                    return random_letter.toUpperCase()
                } else {
                    return random_letter;
                }
            })
            .join("");

        if (iteration >= word1.value.length && iteration >= word2.value.length) {
            clearInterval(interval);
        }

        iteration += 1 / 3;

    }, 30);
}




const root = {

    setup() {

        onMounted(initPaypal)

        return {
            //Propriétés
            is_open,
            activity,
            activity_list,
            word1,
            word2,
            original_word1,
            original_word2,

            //Méthodes
            toggleMenu,
            animateText,

        }
    }
}

//Initialisation de vue
createApp(root).mount('#app')
