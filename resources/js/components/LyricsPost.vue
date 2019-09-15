<template>

    <div class="row " >
    <div   class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p" v-for="post in posts" >
        <div class="single-album">
            <img :src=" 'lyrics_images/'+post.Album_art" alt="">

            <div class="album-info">
                <a :href="'lyric_det/'+post.slug">
                    <h5>{{ post.title}}</h5>
                </a>
                <p>{{post.artist}}</p>
            </div>
        </div>

    </div>


</div>








</template>

<script>

    export default {

        data() {
            return {
                page: 1,
                posts: [],
            };
        },
        mounted(){


                let vm =this;
                axios.get('/get_lyrics?page=',vm.page).then(data => {
                    vm.posts=data.data;

                });



            }
        }





</script>
