<template lang="html">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-name">Description </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-sm text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Type</th>
                                    <th class="desc">desc</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="d, no in datas.data" >
                                    <td>{{ no + 1 }}</td>
                                    <td>{{ d.type  }}</td>
                                    <td>{{ d.description }}</td>
                                    <td>
                                        <button type="button" @click.prevent='edit(d)' class="btn-warning btn-xs"> <i class="fa fa-pencil"></i> </button>
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
                        <label class="col-md-3">Name Skill</label>
                        <div class="col-md-9">
                            <input type="text" v-model='input.type' disabled class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Value</label>
                        <div class="col-md-9">
                            <textarea v-model="input.description" class="form-control" ></textarea>
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
            url: BASE_URL + 'api/description'
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
            this.input.id = undefined
            this.color = ''
            this.$modal.show('create');
        },
        edit(d){
            this.input = JSON.parse(JSON.stringify(d))
            this.$modal.show('create');
        },
        update(input){
                axios.put(this.url+`/${input.id}`, this.input   ).then((res) =>{
                    this.getData(this.pages)
                    this.$modal.hide('create')
                    alert('Success to Update')
                })
                .catch((err) =>{
                    console.log(err)
                })
        }
    }
}
</script>

<style lang="css" scoped>
    .desc{
        width: 60%;
    }
</style>
