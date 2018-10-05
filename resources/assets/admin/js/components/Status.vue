<template>
    <!--<tr>-->
        <td>
            <div v-if="editing">
                <div class="form-group">
                    <label>Название <img src="/img/ru.svg" alt="" style="width: 1.5em;"> </label>
                    <input class="form-control" v-model="title_ru">
                </div>
                <div class="form-group">
                    <label>Название <img src="/img/ua.svg" alt="" style="width: 1.5em;"> </label>
                    <input class="form-control" v-model="title_uk">
                </div>
                <button class="btn btn-xs btn-primary" @click="update">сохранить</button>
                <button class="btn btn-xs btn-link" @click="editing = false">отмена</button>
            </div>

            <div v-else v-text="title_ru"></div>
        </td>
        <td>
            <a  @click="editing = true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
        <td>
            <a href=""  class="delete"  @click="destroy">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
        </td>

    <!--</tr>-->
</template>
<script>
    export default {
        props: ['attributes'],

        data(){
            return {
                editing: false,
                title_ru: this.attributes.title_ru,
                title_uk: this.attributes.title_uk
            };
        },
        mounted() {
            console.log('Component mounted.')
            // axios.get('/admin/calculator/statuses')
            //     .then((response) => {
            //         this.statuses = response.data
            //     });
        },

        methods: {
            destroy(){
                // var _this = this;
                // axios.delete('/admin/calculator/statuses/' + this.attributes.id).then(function(response){
                //
                //     if (response.data.class == 'success'){
                //         $(_this.$el).fadeOut(400);
                //         window.flash(response.data.message, response.data.class);
                //     }
                // });
                axios.delete('/admin/calculator/statuses/' + this.attributes.id);
                $(this.$el).fadeOut(600, ()=>{

                    window.flash('Статус удален', 'success');
                });
            },

            update(){
                axios.patch('/admin/calculator/statuses/' + this.attributes.id, {
                    title_ru: this.title_ru,
                    title_uk: this.title_uk
                }).then(function(response){

                    if (response.data.class == 'success'){
                        window.flash(response.data.message, response.data.class);
                    }
                });

                this.editing = false;
            }
        }
    }
</script>