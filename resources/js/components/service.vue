<template lang="html">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-name">Our Service </h3>
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
                                    <th>Name Service</th>
                                    <th class="desc">Desc</th>
                                    <th>Icon </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="d, no in datas.data" >
                                    <td>{{ no + 1 }}</td>
                                    <td>{{ d.name  }}</td>
                                    <td>{{ d.description  }}</td>
                                    <td> <i :class="d.icon"></i> </td>
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
                        <label class="col-md-3">Name Service</label>
                        <div class="col-md-9">
                            <input type="text" v-model='input.name' class="form-control">
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
                        <label class="col-md-3">Icon</label>
                        <div class="col-md-9">
                            <input type="text" v-model='input.icon' class="form-control">
                            to find code Icon Please click <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Fa Icon</a> or <a href="https://ionicons.com/" target="_blank"> Ionics icon</a>
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
            datas : { }, data : [], input : {} , search : '',
            url: BASE_URL + 'api/service'
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
            this.input.name = ''
            this.input.description = ''
            this.input.id = undefined
            this.icon = ''
            this.$modal.show('create');
        },
        save(){
            axios.post(this.url , this.input).then((res) => {
               this.input.name = ''
               this.input.description = ''
               this.icon = ''
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
                axios.put(this.url+`/${input.id}`, this.input   ).then((res) =>{
                    this.input.name = ''
                    this.input.description = ''
                    this.input.icon = ''
                    this.getData(this.pages)
                    console.log(res)
                    this.$modal.hide('create')
                    console.log(res)
                })
                .catch((err) =>{
                    console.log(err)
                })
        },
        deleted(d){
            if (!confirm('Anda yakin?')) {
                return
            }
            axios.delete(this.url+`/${d.id}`,  ).then((res) =>{
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
    .desc{
        width: 40%;
    }
</style>
