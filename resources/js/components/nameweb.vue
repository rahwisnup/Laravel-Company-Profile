<template lang="html">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-name">Website Setting </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3"> Name Website</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model='input.name' class="form-control" value="asdas">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3"> Name Website</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model='input.telp' class="form-control" value="asdas">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3"> Name Website</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model='input.email' class="form-control" value="asdas">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3"> Name Website</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model='input.address' class="form-control" value="asdas">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3"> Logo   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img :src="'img/web/' + input.logo " >  </label>
                                    <div class="col-md-9">
                                        <div class="col-md-6 file">
                                            <input type="file" v-on:change="onImageChange" class="form-control">
                                        </div>
                                        <div class="col-md-3" v-if="image">
                                            <img :src="image" class="img-responsive" height="70" width="90">
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3"> SEO</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model='input.seo' class="form-control" value="asdas">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <button type="button" @click.prevent="update(input)" class="btn btn-primary btn-sm"> Update </button>
                                    </div>
                                </div>
                            </div>
                            <!-- <input type="text" v-model="input.image"> -->
                    </div>
                </div>
            <!-- /.box -->
            </div>
        <!-- /.col -->
        </div>

    </section>
</template>
asdas
<script>
export default {
    mounted(){
        this.getData() ;
    }
    ,watch: {
        search(v) {
            this.getData()
        }
    },
    data() {
        return{
            input : {} ,
            url: BASE_URL + 'api/web',
            image : null
        }
    },
    methods:{
        getData(page = 1){
            axios.get(this.url).then((res) =>{
                this.input = res.data
            })
            .catch((err) => {
                console.log(err)
            })
        },
        onImageChange(e) {
               let files = e.target.files || e.dataTransfer.files;
               if (!files.length)
                   return;
               this.createImage(files[0]);
        },
        //untuk tampil image
        createImage(file) {
               let reader = new FileReader();
               let vm = this;
               reader.onload = (e) => {
                   vm.image = e.target.result;
               };
               reader.readAsDataURL(file);

        },
        update(input){
            axios.post(BASE_URL + 'api/web/updatedata', {image:this.image, name:this.input.name, telp:this.input.telp,email:this.input.email, address:this.input.address, seo:this.input.seo, id:this.input.id } ).then((res) =>{
                this.getData()
                this.image = null
                this.image = null
                this.onImageChange = null
                alert('Update Success')
            })
            .catch((err) => {
                console.log(err)
            })
        }
    }
}
</script>

<style lang="css" scoped>
    img{
        width: 100px;
    }

    .file{
        margin-left: -15px;
    }
</style>
