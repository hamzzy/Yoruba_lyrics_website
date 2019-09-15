<template>
    <div class="row">
        <div class="col-12">
            <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
                <a class="btn oneMusic-btn" @click="showModal">Edit lyrics<i class="fa fa-pencil"></i></a>
            </div>
        </div>

        <div class="modal-backdrop" v-show="isModalVisible" >
            <div class="modal">
                <header class="modal-header">
                    <slot name="header">
                        This is the default tile!
                        <button
                                type="button"
                                class="btn-close"
                                @click="closeModal"
                        >
                            x
                        </button>
                    </slot>
                </header>
                <section class="modal-body">
                    <slot name="body">
                        <form v-on:click.prevent="propose">
                        <tinymce id="d1" v-model="field.lyric" name="lyric">
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
        name: 'app',
        props: ['lyric','lyric_id'],

            data() {
                return {
                    isModalVisible: false,
                    field:{
                        'lyric':this.lyric,
                        'lyrics_id':this.lyric_id
                    }
                };
            },
            methods: {
                showModal() {
                    this.isModalVisible = true;
                },
                closeModal() {
                    this.isModalVisible = false;
                },
                propose(){
                     axios.post('/update_prop',this.field).then(data=>{
                         this.$swal('Lyrics update propose', 'success');
                    });
                }

            },

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
        box-shadow: 2px 2px 20px 1px;
        overflow-x: auto;
        display: flex;
        flex-direction: column;
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

    .modal-footer {
        border-top: 1px solid #eeeeee;
        justify-content: flex-end;
    }

    .modal-body {
        position: relative;
        padding: 5px 0px;

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