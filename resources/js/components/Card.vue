<template>
    <div class="card">
        <img :src="imagemlink" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ titulo }}</h5>
            <p class="card-text">{{ descricao }}</p>
            <p class="card-text"><small class="text-muted">{{ data }} - {{ autor }}</small></p>
            <a :href="link" class="card-link">{{ linktexto }}</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo', 'descricao', 'data', 'autor', 'link', 'linktexto', 'imagemlink']
    }
</script>