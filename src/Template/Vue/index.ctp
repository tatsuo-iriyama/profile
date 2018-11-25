<?= $this->Html->script('https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js'); ?>

<div id="app" style="border-bottom: 1px solid black; margin: 10px 0;">
    {{ message }}
</div>

<div id="app-2" style="border-bottom: 1px solid black; margin: 10px 0;">
    <span v-bind:title="message">
        Hover your mouse over me for a few seconds
        to see my dynamically bound title!
    </span>
</div>

<div id="app-3" style="border-bottom: 1px solid black; margin: 10px 0;">
    <span v-if="seen">Now you see me</span>
</div>

<div id="app-4" style="border-bottom: 1px solid black; margin: 10px 0;">
    <ol>
        <li v-for="todo in todos">
            {{ todo.text }}
        </li>
    </ol>
</div>

<div id="app-5" style="border-bottom: 1px solid black; margin: 10px 0;">
    <p>{{ message }}</p>
    <button v-on:click="reverseMessage">Reverse Message</button>
</div>

<div id="app-6" style="border-bottom: 1px solid black; margin: 10px 0;">
    <p>{{ message }}</p>
    <input v-model="message">
</div>

<div id="app-7" style="border-bottom: 1px solid black; margin: 10px 0;">
    <p v-if="show" v-for="message in messages">{{ message.text }}</p>
    <button v-on:click="showMessage">click</button>
</div>

<script type="text/javascript">
    var app = new Vue({
        el: '#app',
        data: {
            message: 'Hello Vue!'
        }
    })

    var app2 = new Vue({
        el: '#app-2',
        data: {
           message: 'You loaded this page on ' + new Date().toLocaleString()
        }
    })

    var app3 = new Vue({
        el: '#app-3',
        data: {
            seen: true
        }
    })

    var app4 = new Vue({
        el: '#app-4',
        data: {
            todos: [
                { text: 'Learn JavaScript' },
                { text: 'Learn Vue' },
                { text: 'Build something awesome' },
                { text: 'Bye' }
            ]
        }
    })

    var app5 = new Vue({
        el: '#app-5',
        data: {
            message: 'Hello Vue.js!'
        },
        methods: {
            reverseMessage: function() {
                this.message = this.message.split('').reverse().join('')
            }
        }
    })

    var app6 = new Vue({
        el: '#app-6',
        data: {
            message: 'Hi!'
        }
    })

    var app7 = new Vue({
        el: '#app-7',
        data: {
            show: false,
            messages: [
                { text: 'good!' },
                { text: 'vue master!' },
                { text: 'next time' }
            ]
        },
        methods: {
            showMessage: function() {
                this.show = true
            }
        }
    })
</script>