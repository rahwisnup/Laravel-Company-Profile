<template lang="html">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Slide Header </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                    <button type="button" @click="create()" class="btn btn-primary btn-sm">Add Data</button>
                                </div>
                                <div class="input-group col-md-2">
                                    <input type="text" v-model="search" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <table class="table table-sm text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Desc</th>
                                    <th>Pict</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="d, no in datas.data" >
                                    <td>{{ no + 1 }}</td>
                                    <td>{{ d.title  }}</td>
                                    <td>{{ d.description  }}</td>
                                    <td> <img :src="'img/intro-carousel/' + d.picture" alt="" class="img-responsive"> </td>
                                    <td>
                                        <button type="button" @click.prevent='edit(d)' class="btn-warning btn-xs"> <i class="fa fa-pencil"></i> </button>
                                        <button type="button" @click.prevent='deleted(d)' class="btn-danger btn-xs"> <i class="fa fa-times"></i> </button>

                                    </td>
                                    <input type="hidden" v-model="data.total">
                                    <input type="hidden" v-model="pages">
                                </tr>
                            </tbody>
                        </table>
                        <pagination :data="datas" @pagination-change-page="getData"></pagination>
                    </div>
                </div>
            <!-- /.box -->
            </div>
        <!-- /.col -->
        </div>

        <modal name="create" class="box" height="auto">
            <div class="box-header with-border">
                Form
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Title</label>
                        <div class="col-md-9">
                            <input type="text" v-model='input.title' class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Description</label>
                        <div class="col-md-9">
                            <textarea v-model='input.description' class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Picture</label>
                        <div class="col-md-9">
                            <div class="col-md-3" v-if="image">
                                <img :src="image" class="img-responsive" height="70" width="90">
                             </div>
                            <div class="col-md-6">
                                <input type="file" v-on:change="onImageChange" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="box-footer">
                <div class="row">
                    <label for="" class="col-md-3"></label>
                    <button class="btn btn-primary btn-sm" @click.prevent="input.id === undefined ? save() : update(input) ">{{ input.id === undefined ? 'Save': 'Update'}} </button>
                </div>
            </div>
        </modal>
    </section>
</template>
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
            datas : { }, data : [], input : {} , search : '',
            url: BASE_URL +'api/intro',
            image: null
        }
    },
    methods:{
        getData(page = 1){
            let params = {
                page: page,
                search: this.search
            }
            axios.get(this.url , {params: params}).then((res) =>{
                this.datas = res.data
                this.data = res.data
                this.pages = page
                console.log(res.data)
            })
            .catch((err) => {
                console.log(err)
            })
        },
        create(){
            this.input.title = ''
            this.input.description = ''
            this.input.id = undefined
            this.image = null
            this.$modal.show('create');
        },
        //untuk mengkonversi image
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
        save(){
            axios.post(BASE_URL +'api/intro', { image: this.image, title : this.input.title , description : this.input.description}).then((res) => {
               this.input.title = ''
               this.input.description = ''
               this.image = null
               this.$modal.hide('create')
               this.getData()
            })
            .catch((err) =>{
                console.log(err)
            })
        },
        edit(d){
            this.input = JSON.parse(JSON.stringify(d))
            this.$modal.show('create');
        },
        update(input){
            if(this.image == null){
                axios.post(BASE_URL +'api/intro/updatedata', this.input   ).then((res) =>{
                    this.input.title = ''
                    this.input.description = ''
                    this.image = null
                    this.getData(this.pages)
                    this.$modal.hide('create')
                    console.log(res)
                })
                .catch((err) =>{
                    console.log(err)
                })
            }else{
                axios.post(BASE_URL +'api/intro/updatedata', { image: this.image, id : this.input.id , title : this.input.title , description : this.input.description}).then((res) =>{
                    this.input.title = ''
                    this.input.content = ''
                    this.getData(this.pages)
                    this.$modal.hide('create')
                    console.log(res)
                })
                .catch((err) =>{
                    console.log(err)
                })
            }

        },
        deleted(d){
            if (!confirm('Anda yakin?')) {
                return
            }
            axios.delete(BASE_URL +`api/intro/${d.id}?picture=${d.picture}`,  ).then((res) =>{
                var hitung = (this.pages - 1) * 5
                var sisa = this.data.total - hitung
                if(sisa > 1){
                    var hal = this.pages
                }else{
                    var hal  = this.pages - 1
                }
                this.getData(hal)
                console.log(res)
            })
            .catch((err) =>{
                consol.log(err)
            })
        }
    }
}
</script>

<style lang="css" scoped>
    img{
        width: 100px;
    }
</style>
