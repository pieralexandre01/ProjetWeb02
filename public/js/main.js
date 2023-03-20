
import { createApp, ref } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'

const is_open = ref(false)

function toggleMenu() {
    if( ! is_open.value){
        is_open.value = true

    } else {
        is_open.value = false
    }
}

const root = {
    setup() {
        return {
            //Propriétés
            is_open,

            //Méthodes
            toggleMenu,
        }
    }
}

//Initialisation de vue
createApp(root).mount('#app')
