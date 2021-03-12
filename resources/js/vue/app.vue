<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">{{message}}</h2>
            <add-item-form v-on:reloadList="getList()" />
            <list-view :items="items" :test="123456778" v-on:reloadList="getList()"/>
        </div>
    </div>
</template>

<script>
    import addItemForm from "./addItemForm";
    import listView from "./listView";

    export default {
        components : {
            addItemForm,
            listView,
        },
        data : function () {
            return {
                message : 'To do List',
                items : []
            }
        },
        methods : {
            getList : function () {
                axios.get('/api/item').then(
                    response => {
                        this.items = response.data.data
                        console.log(this.items)
                    }
                ).catch( error => {
                    console.log( error )
                } )
            }
        },
        created() {
            this.getList()
        }
    }
</script>

<style scoped>
    .todoListContainer {
        width: 350px;
        margin: auto;
    }

    .heading {
        background: #e6e6e6;
        padding: 10px;
    }

    #title {
        text-align: center;
    }
</style>
