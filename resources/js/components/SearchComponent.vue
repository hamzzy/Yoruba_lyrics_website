<template>
    <div >
        <div class="col-sm-10">
        <input type="text" autocomplete="off" v-model="search" id="search"
               class="form-control input-lg" placeholder="Search for artist,song title" />

        <!-- Vue Search List Start-->
        <ul v-cloak v-if="posts" v-bind:style="{ width : width + 'px' }" class="widget">
            <li v-for="(post,key) in posts" :id="key +1"
                v-bind:class="[(key + 1 == count) ? activeClass : '', menuItem]"
            ><a v-bind:href="post.url" >
                    <div class="list_item_container" v-bind:title="post.title">
                        <div class="label">
                            <h4>{{ post.title }}</h4>
                            <h4>{{ post.artist }}</h4>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
        <!-- Vue Search List End-->
    </div>
    </div>


</template>

<script>
    export default {
        data() {
            return {
                posts: '',
                search: '',
                count: 0,
                width: 0,
                menuItem: 'menu-item',
                activeClass: 'active'

            };
        },

        methods: {
            getPosts: _.debounce(function () {
                this.posts = "";
                this.count = 0;
                self = this;

                if (this.search.trim() != '') {
                    axios.post("/findlyric", {
                        search: self.search
                    })
                        .then(function (response) {
                            self.posts = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }

            }, 500),
            selectPost: function (keyCode) {
                // If down arrow key is pressed
                if (keyCode == 40 && this.count < this.posts.length) {
                    this.count++;
                }
                // If up arrow key is pressed
                if (keyCode == 38 && this.count > 1) {
                    this.count--;
                }
                // If enter key is pressed
                if (keyCode == 13) {
                    // Go to selected post
                    document.getElementById(this.count).childNodes[0].click();
                }
            },
            clearData: function (e) {
                if (e.target.id != 'search') {
                    this.posts = '',
                        this.count = 0
                }
            }
        },
        mounted: function () {
            self = this;

            // get width of search input for vue search widget on initial load
            this.width = document.getElementById("search").offsetWidth;
            // get width of search input for vue search widget when page resize
            window.addEventListener('resize', function (event) {
                self.width = document.getElementById('search').offsetWidth;
            });

            // To clear vue search widget when click on body
            document.body.addEventListener('click', function (e) {
                self.clearData(e);
            });

            document.getElementById('search').addEventListener('keydown', function (e) {
                // check whether arrow keys are pressed
                if (_.includes([37, 38, 39, 40, 13], e.keyCode)) {
                    if (e.keyCode === 38 || e.keyCode === 40) {
                        // To prevent cursor from moving left or right in text input
                        e.preventDefault();
                    }

                    if (e.keyCode === 40 && self.posts == "") {
                        // If post list is cleared and search input is not empty
                        // then call ajax again on down arrow key press
                        self.getPosts();
                        return;
                    }

                    self.selectPost(e.keyCode);

                } else {
                    self.getPosts();
                }
            });
        }
    }
</script>

<style scoped>

    /* Common for all */
    [v-cloak] {
        display: none;
    }
    .active {
        background-color: #f5f5f5;
    }

    /* Styling Vue Search Widget - You can customize it as you wish */
    .widget {
        border: 1px solid #c5c5c5;
        background: white;
        position: absolute;
        cursor: pointer;
        list-style: none;
        padding: 0;
        z-index: 100;
    }
    .menu-item{
        height: 80px;
        border: 1px solid #ececf9;
    }
    .list_item_container {
        width: 98%;
        float: left;
    }

    .image {
        width: 5%;
        float: left;
        padding: 3px;
    }
    .image img{
        width: 200px;
        height : 60px;
    }
    .label{
        width: 89%;
        float:right;
        color: rgb(124,77,255);
        font-weight: bold;
        text-align: left;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }
    @media only screen and (max-width:768px) {

        .image img{
            width: 200px;
            height : 60px;
        }
        .label{
            width: 70%;
        }
        .label h4{
            font-size: 15px;
        }
    }


    /* To get a indigo focus color in search input - Not nessary */
    input[type="text"]:focus{
        border-color: #5b518b !important;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 4px #5b518b !important;
        outline: 0 none;
    }

</style>