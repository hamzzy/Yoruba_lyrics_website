<template>
    <div class="row" >

        <!-- Single Album Area -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-2" v-for="post in posts">
            <div class="single-album-area wow fadeInUp" data-wow-delay="100ms">
                <div class="album-thumb">
                    <a :href="'lyric_det/'+post.slug"><img :src="'lyrics_images/'+post.Album_art" alt=""></a>
                    <!-- Play Icon -->
                </div>
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

        data(){
            return {
                posts: []
            }
        },
        mounted(){
            // Make a request for a user with a given ID
            var app=this;
            axios.get('/latest')
                .then(function (resp) {
                    app.posts = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp.data);
                });

        }
    }

</script>

<style scoped>

</style>