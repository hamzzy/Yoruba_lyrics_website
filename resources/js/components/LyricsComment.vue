<template>
    <div class="contact-form-area" style="align-content: center">
        <form  v-on:submit.prevent="AddLyrics" method="post">
            <div class="col-md-6 col-lg-4">
                <div class="form-group">

                    <input type="text" class="form-control" id="email"  v-model="field.comment" name="comment" placeholder="comment">
                    <div v-if="errors && errors.comment" class="text-danger">{{ errors.comment[0] }}</div>

                    <div class="text-center">
                        <button class="btn oneMusic-btn mt-30"  type="submit">Send </button>
                    </div>
                </div>
            </div>




        </form>
    </div>
</template>

<script>
    export default{
        props: ['lyric_id'],
        data(){
            return{
                field:{
                  'comment':'',
                  'lyric_id':this.lyric_id
                },
                errors:{},
                loaded:true,
                success: false,

            }

        }
        ,

        methods: {

            AddLyrics: function () {

                event.preventDefault();

                if (this.loaded) {
                    this.loaded = false;
                    this.success = false;
                    this.errors = {};
                    axios.post('/comment', this.field).then(response => {
                        this.field = {}; //Clear input fields.
                        this.loaded = true;
                        this.success = true;
                        this.$swal('comment added', 'success');
                    }).catch(error => {
                        this.loaded = true;
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        }


                    });
                }
//

            }
        }

        }

</script>

<style scoped>

</style>