<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li v-for="item in lista" v-bind:class="defineClass">
                <a v-bind:href="item.url" v-if="item.url">{{item.titulo}}</a>
                <span v-if="!item.url">{{item.titulo}}</span>
            </li>
        </ol>
    </nav>
</template>

<script>
    export default {
        props:['lista'],
        computed:{
            defineClass: function() {
                if (this.url) {
                    return "breadcrumb-item active\" aria-current=\"page";
                } else {
                    return "breadcrumb-item";
                }
            }
        }
    }
</script>
