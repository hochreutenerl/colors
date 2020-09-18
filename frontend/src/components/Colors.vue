<template>
    <div id="colors">
        <h1>Color scheme</h1>
        <table>
            <thead>
            <tr>
                <th class="name">Name</th>
                <th class="hex">Hexcode</th>
                <th class="color">Color</th>
                <th class="remove">Remove</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="color in colors" :key="color.id">
                <td class="name">{{ color.name }}</td>
                <td class="hex">{{ color.hex }}</td>
                <td class="color" v-bind:style="{'background-color': color.hex}"></td>
                <td class="remove"><button @click="remove(color.id)">X</button></td>
            </tr>
            <tr>
                <td colspan="2"><input id="name" type="text" name="name" placeholder="Name" v-model="newName"/></td>
                <td><input id="color" type="color" name="color" v-model="newColor"/></td>
                <td><button @click="save">Save</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: 'HelloWorld',
        data: function () {
            return ({
                newName: "",
                newColor: "#000000",
                colors: []
            })
        },
        props: {
            msg: String
        },
        mounted() {
            this.refresh();
        },
        methods: {
            refresh: function () {
                axios
                    .get('http://localhost:8080/colors')
                    .then(response => (this.colors = response.data))
                    .catch(() => {
                        alert('The colors could not be loaded')
                    })
            },
            save: function () {
                if (this.newName === "") {
                    alert('The name cannot be empty')
                }

                var color = {
                    name: this.newName,
                    hex: this.newColor,
                };
                this.newName = "";
                this.newColor = "#000000";

                this.colors.push(color);
                axios
                    .post('http://localhost:8080/colors', color)
                    .then(() => {
                        this.refresh();
                    })
                    .catch(() => {
                        alert('The color could not be saved')
                    })
                ;
            },
            remove: function (id) {
                this.colors = this.colors.filter(color => color.id !== id);
                axios
                    .delete('http://localhost:8080/colors/' + id)
                    .then(() => this.refresh())
                    .catch(() => {
                        alert('The color could not be removed')
                    })
            }
        }
    }
</script>

<style scoped>
    table {
        margin-left: auto;
        margin-right: auto;
        min-width: 50%;
    }

    td {
        border-radius: 8px;
    }

    td.name, th.name, td.hex, th.hex {
        text-align: left;
    }

    td.color {
        padding: 4px;
        border: solid 1px #000000;
    }

    input {
        border-radius: 8px;
        border-color: #000000;
    }

    input[type=text] {
        padding: 8px;
        border: solid 1px #000000;
    }

    input[type=color] {
        padding: 4px;
        cursor: pointer;
        background-color: #ffffff;
    }

    input#name {
        width: -moz-available;
        width: -webkit-fill-available;
    }

    input#color {
        width: -moz-available;
        width: -webkit-fill-available;
    }

    button {
        width: 100%;
        border: solid 1px #000000;
        border-radius: 8px;
        background-color: #ffffff;
        padding: 8px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background-color: #cccccc;
    }
</style>
