<template>
    <div class="addItem">
        <input type="text" v-model="item.name" />
        <font-awesome-icon icon="plus-square"
        :class="[item.name ? 'active' : 'inactive' , 'plus']"
        v-on:click="addItem"
        />
        <!--<p :class="[item.name ? 'active' : 'inactive' , 'plus']" v-on:click="alertName">test</p>-->
    </div>
</template>

<script>
    export default {
        data : function () {
            return {
                item : {
                    name : ''
                }
            }
        },
        methods : {
            addItem: function () {
                if ( this.item.name === '' ) {
                    alert('不能为空')
                }

                let data = this.item;
                console.log(data);
                axios.post('api/item/store', {
                    name: data.name
                }).then( response => {
                    if (response.status === 200) {
                        this.item.name = '';
                        this.$emit('reloadList')
                    }
                } ).catch( error => {
                    console.log(error)
                } )
            }
        }
    }
</script>

<style scoped>
    .addItem {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    input {
        background: #f7f7f7;
        border: 0;
        outline: none;
        padding: 5px;
        margin-right: 10px;
        width: 100%;
    }

    .plus {
        color: red;
    }

    .active {
        color: red;
    }

    .inactive {
        color: gray;
    }
</style>
