<template>



    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Profile</h4>
            <form class="forms-sample" v-on:submit.prevent="UpdateProfile" method="post">
                <div class="form-group">
                    <label for="exampleInputUsername1">Username</label>
                    <input type="text" class="form-control" v-model="field.name" name="name" id="exampleInputUsername1" placeholder="Username" value="">
                    <div class="col-md-6 col-lg-4">

                        <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control"  v-model="field.email" name="email"  id="exampleInputEmail1" placeholder="Email" value="">
                    <div class="col-md-6 col-lg-4">

                        <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                    </div>
                </div>

                <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
            </form>
        </div>
    </div>


</template>

<script>
    export default{
        props: ['name','email'],

        data(){
            return{
                field:{
                   'name':this.name,
                    'email':this.email
                },
                errors:{},
                loaded:true,
                success: false,

            }

        }
        ,

        methods:{

          UpdateProfile: function (e) {

                e.preventDefault();

                if (this.loaded) {
                    this.loaded = false;
                    this.success = false;
                    this.errors = {};
                    axios.put('/update_user', this.field).then(response => {
                        this.field                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       = {}; //Clear input fields.
                        this.loaded = true;
                        this.success = true;
                        this.$swal('Profile Update successfully', 'success');
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