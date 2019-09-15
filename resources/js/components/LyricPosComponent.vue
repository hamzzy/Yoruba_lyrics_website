<template>
    <div class="container">
        <div class="contact-form-area" style="align-content: center">
            <form  v-on:submit.prevent="AddLyrics" method="post">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <input type="text" class="form-control" id="email"  v-model="field.artist" name="artist" placeholder="artist">
                        <div v-if="errors && errors.artist" class="text-danger">{{ errors.artist[0] }}</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <input type="text" class="form-control"  name="title" id="email"   v-model="field.title" placeholder=" song title">
                        <div v-if="errors && errors.title" class="text-danger">{{ errors.title[0] }}</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <input type="text" class="form-control"  name="Album" id="email"   v-model="field.Album" placeholder=" Album">
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <select  class="form-control"  name="tag" v-model="field.tag" placeholder="tag">
                            <option value=""> </option>
                            <option value="gospel"> gospel</option>


                        </select>
                        <div v-if="errors && errors.tag" class="text-danger">{{ errors.tag[0] }}</div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-10">
                    <div class="form-group">
                        <tinymce id="d1" name="content" v-model="field.content" ></tinymce>
                        <div v-if="errors && errors.content" class="text-danger">{{ errors.content[0] }}</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="featuring" v-model="field.featuring" placeholder="featuring">

                    </div>
                </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="content" v-model="field.producer" placeholder="producer"/>
                        </div>
                    </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="written_by" v-model="field.written_by" placeholder="written by"/>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <input type="date" class="form-control" name="release_date" v-model="field.release_date" placeholder="date released"/>
                        <div v-if="errors && errors.release_date" class="text-danger">{{ errors.release_date[0] }}</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">

                        <input type="file" class="form-control-file" @change="onImage" name="image"  placeholder="Album image"/>
                    <div v-if="errors && errors.image" class="text-danger">{{ errors.image[0] }}</div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="audio_link" v-model="field.audio_link" placeholder="Audio link"/>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="video_link" v-model="field.video_link" placeholder="Video link"/>
                    </div>
                </div>




                <div class="col-12 text-center">
                    <button class="btn oneMusic-btn mt-30"  type="submit">Send </button>
                </div>

            </form>
        </div>
    </div>
</template>



<script>

    export default{

     data(){
         return{
             field:{
                 'artist':'',
                 'title':'',
                 'tag':'',
                 'Album':'',
                 'content':'',
                 'featuring':'',
                 'producer':'',
                 'written_by':'',
                 'release_date':'',
                 'image':'',
                 'audio_link':'',
                 'video_link':'',
             },
             errors:{},
             loaded:true,
             success: false,

         }

     }
     ,

        methods:{
            onImage(e) {
                let file= e.target.files[0];
                let render= new FileReader();

                render.onloadend=(file)=> {
                    this.field.image=render.result;

                }
                render.readAsDataURL(file)

            },
            AddLyrics: function (e) {

                e.preventDefault();

                if (this.loaded) {
                    this.loaded = false;
                    this.success = false;
                    this.errors = {};
                    axios.post('/post_lyrics', this.field).then(response => {
                        this.field                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       = {}; //Clear input fields.
                        this.loaded = true;
                        this.success = true;
                        this.$swal('Lyrics added successfully', 'success');
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