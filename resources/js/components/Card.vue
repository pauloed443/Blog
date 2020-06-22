<template>
    <div class="card">
        <img :src="imagemlink" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ titulo }}</h5>
            <p class="card-text text-truncate">{{ descricao }}</p>
            <p class="card-text"><small class="text-muted">{{ autor | capitalize }} • {{ data | FrontEndFormatDate }}</small></p>
            <a :href="link" class="btn btn-primary card-link stretched-link">{{ linktexto }}</a>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
        props: ['titulo', 'descricao', 'data', 'autor', 'link', 'linktexto', 'imagemlink'],
        filters:{
            FrontEndFormatDate(value){
                if (!value) return '';

                let valueAux = value.toString().split('-');

                if (valueAux.length == 3) {
                    if (valueAux[2].split(':').length == 2) {
                        return moment(value).format('DD/MM/YYYY hh:mm');
                    } else {
                        return moment(value).format('DD/MM/YYYY');
                    }
                }

                return value;
            }
        },
    }
</script>