<template>
    <div class="row">
    <div class="col-md-3 grid-margin "  v-for="post in posts">
        <div class="card">
            <img :src="'lyrics_images/'+post.Album_art" alt=" lyrics post">
            <div class="card-body">
                <h4 class="card-title">{{ post.title}}</h4>
                <p>{{post.artist}}</p>
            </div>
            <div class="card-footer " >
                <div class="row">

                <button @click="Del(post.id)"  type="button" class="btn btn-gradient-primary btn-icon-text  btn-sm">
                    Delete
                    <i class="mdi mdi-delete"></i>
                </button>

                <button type="button" @click="showModal" class="btn btn-gradient-primary btn-icon-text btn-sm">
                    <i class="mdi mdi-pencil"></i>
                    Update
                </button>

            </div>

        </div>
    </div>
    </div>


        <div class="modal-backdrop" v-show="isModalVisible" >

            <div class="modal">
                <header class="modal-header">
                    <slot name="header">

                        <button
                                type="button"
                                class="btn-close"
                                @click="closeModal"
                        >x
                        </button>
                    </slot>
                </header>
                <section class="modal-body">
                    <slot name="body">
                        <form v-on:click.prevent="propose">
                            <tinymce id="d1"  name="lyric">
                            </tinymce>
                            <br/>
                            <br/>

                            <div class="col-12">
                                <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">

                                    <button class="btn oneMusic-btn mt-30"  type="submit">Send </button>
                                </div>
                            </div>


                        </form>
                    </slot>
                </section>
            </div>
        </div>

    </div>


</template>

<script>
    export default {

        data(){
            return {
                posts: [],
                id:'',
                isModalVisible: false,
            }
        },
        mounted(){
            // Make a request for a user with a given ID
            var app=this;
            axios.get('/user_l')
                .then(function (resp) {
                    app.posts = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp.data);
                    alert("Could not load companies");
                });

        },
        methods:{

            showModal() {
                this.isModalVisible = true;
            },
            closeModal() {
                this.isModalVisible = false;
            },
   Del(id){
       this.$swal({
           title:'are you sure',
           text:"you wouldn't be able to revert",
           type:'warning',
           showCancelButton: true,
           confirmButtonText:"Yes, delete it"
       }).then((result)=> {
               axios.delete('/delete_lyrics/'+id).then(() => {
                   if (result.value) {
                       this.$swal('Deleted','lyrics deleted','success');
                   }



               });

       });
   }


        }
    }

</script>

<style scoped>

    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0.3);
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .modal {
        background: #FFFFFF;
        box-shadow: 1px 2px 20px 1px;
        display: flex;
        flex-direction: column;
        margin: 100px;
    }

    .modal-header,
    .modal-footer {
        padding: 15px;
        display: flex;
    }

    .modal-header {
        border-bottom: 1px solid #eeeeee;
        color: #4AAE9B;
        justify-content: space-between;
    }



    .modal-body {
        position: relative;
        padding: 3px 0px;

    }

    .btn-close {
        border: none;
        font-size: 20px;
        padding: 20px;
        cursor: pointer;
        font-weight: bold;
        color: #4AAE9B;
        background: transparent;
    }

    .btn-green {
        color: white;
        background: #4AAE9B;
        border: 1px solid #4AAE9B;
        border-radius: 2px;
    }


</style>