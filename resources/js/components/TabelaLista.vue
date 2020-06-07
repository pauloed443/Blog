<template>
    <div>
        <div class="row">

            <a v-if="criar && !modal" v-bind:href="criar">Criar Sem Modal</a>
            <modallink v-if="criar && modal"
                tipo="button" 
                nome="adicionar" 
                titulo="Adicionar" 
                css=""
            ></modallink>
            <div class="col-6 d-flex justify-content-end">
                <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th v-on:click="ordenaColuna(index)" v-for="(titulo, index) in titulos"> 
                        <span style="cursor:pointer"> {{ titulo }} </span>
                    </th>

                    <th v-if="detalhe || editar || deletar">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item,index) in lista">
                    <td v-for="i in item">{{ i }}</td>
                    
                    <td v-if="detalhe || editar || deletar">
                        <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar + item.id" method="POST">
                            <input type="hidden" name="_method" id="method" value="DELETE">
                            <input type="hidden" name="_token" id="token" v-bind:value="token">

                            <a v-if="detalhe && !modal" v-bind:href="detalhe"> Detalhe |</a>
                            <modallink v-if="detalhe && modal"
                                tipo="button" 
                                nome="detalhe" 
                                titulo="Detalhe" 
                                css=""
                                v-bind:item="item"
                                v-bind:url="detalhe"
                            ></modallink>

                            <a v-if="editar && !modal" v-bind:href="editar"> Editar |</a>
                            <modallink v-if="editar && modal"
                                tipo="button" 
                                nome="editar" 
                                titulo="Editar" 
                                css=""
                                v-bind:item="item"
                                v-bind:url="editar"
                            ></modallink>
                            <a href="#" v-on:click="executaForm(index)"> Deletar</a>
                        </form>
                        <span v-if="!token">
                            <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                            <modallink v-if="detalhe && modal"
                                tipo="button" 
                                nome="detalhe" 
                                titulo="Detalhe" 
                                css=""
                                v-bind:item="item"
                                v-bind:url="detalhe"
                            ></modallink>

                            <a v-if="editar && !modal" v-bind:href="editar"> Editar |</a>
                            <modallink v-if="editar && modal"
                                tipo="button" 
                                nome="editar" 
                                titulo="Editar" 
                                css=""
                                v-bind:item="item"
                                v-bind:url="editar"
                            ></modallink>
                            <a v-if="deletar" v-bind:href="deletar">Deletar</a>
                        </span>
                        <span v-if="token && !deletar">
                            <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                            <a v-if="editar && !modal" v-bind:href="editar"> Editar |</a>
                            <modallink v-if="editar && modal"
                                tipo="button" 
                                nome="editar" 
                                titulo="Editar" 
                                css=""
                            ></modallink>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['titulos', 'itens', 'ordem', 'ordemcol', 'criar', 'detalhe', 'editar', 'deletar', 'token', 'modal'],
        data: function(){
            return {
                buscar:"",
                ordemAux: this.ordem || "asc",
                ordemAuxCol: this.ordemCol || 0
            }
        },
        methods:{
            executaForm: function(index){
                document.getElementById(index).submit();
            },
            ordenaColuna: function(coluna) {
                this.ordemAuxCol = coluna;
                if (this.ordemAux.toLowerCase() === "asc") {
                    this.ordemAux = "desc";
                } else {
                    this.ordemAux = "asc";
                }
            }
        },
        computed:{
            lista:function(){
                
                let ordem = this.ordemAux;
                let ordemCol = this.ordemAuxCol;
                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if (ordem === "asc") {
                    this.itens.sort(function(a,b) {
                        if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) { return 1; }
                        if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) { return -1; }
                        return 0;
                    });    
                } else {
                    this.itens.sort(function(a,b) {
                        if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) { return 1; }
                        if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) { return -1; }
                        return 0;
                    });
                }

                if (this.buscar) {
                    return this.itens.filter(res => {
                        res = Object.values(res);
                        for (let k = 0; k < res.length; k++) {
                            if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                                return true;
                            }
                        }
                        return false;
                    });
                }
                return this.itens;
            }
        }
    }
</script>
