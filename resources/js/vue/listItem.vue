<template>
    <div class="item">
        <input
            type="checkbox"
            v-model="item.status"
            @click="updateCheck()"
            />
        <span :class="[ item.status ? 'completed' : '' , 'itemText']">{{ item.name }}</span>
        <button @click="removeItem()" class="trashcan">
            <font-awesome-icon icon="trash" />
        </button>
    </div>
</template>

<script>
    export default {
        props : ['item'],
        methods : {
            updateCheck : function () {
                let status = 0;
                if (event.target.checked == true) {
                    status = 1;
                }

                console.log(event.target.checked);
                axios.get('/api/update.item?id=' + this.item.id + '&status=' + status).then(
                    response => {
                        if (response.data.code === 200) {
                            this.$emit('changeItem')
                        }
                    }
                ).catch(error => {
                    console.log(error)
                })
            },
            removeItem : function () {
                axios.get('/api/delete.item/' + this.item.id).then(
                    response => {
                        console.log(response);
                        if (response.data.code === 200) {
                            this.$emit('changeItem')
                        }
                    }
                ).catch(error => {
                    console.log(error)
                });
            }
        }
    }
</script>

<style scoped>
.completed {
    text-decoration: line-through;
    color: #999999;
}
.itemText {
    width: 100%;
    margin-left: 20px;
}
.item {
    display: flex;
    justify-content: center;
    align-items: center;
}
.trashcan {
    background: #e6e6e6;
    border: none;
    color: #FF0000;
    outline: none;
}
</style>
