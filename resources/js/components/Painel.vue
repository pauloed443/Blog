<template>
    <div class="card">
        <div v-if="titulo" v-bind:class="defineCorTitulo">
            {{titulo}}
        </div>

        <div v-bind:class="defineCorTituloBody">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo', 'cortitulo', 'cortextotitulo', 'cortitulobody'],
        computed: {
            defineCorTitulo: function(){
                return "card-header " + (this.cortextotitulo || "") + " " + (this.cortitulo || "");
            },
            defineCorTituloBody: function(){
                return "card-body " + (this.cortitulobody || "");
            }
        }
    }
</script>

<style>

.card > .blue {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #0f35a0 !important;
    color: #ffffff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}

.card > .blue-body {
    flex: 1 1 auto;
    padding: 1.25rem;
    border: solid #0f35a0 1px;
}

.card > .orange {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #ef5f0a !important;
    color: #ffffff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}

.card > .orange-body {
    flex: 1 1 auto;
    padding: 1.25rem;
    border: solid #ef5f0a 1px;
}

</style>
