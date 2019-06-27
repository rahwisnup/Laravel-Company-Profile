<template lang="html">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-name">Message</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">
                          <div class="row">
                              <div class="col-md-10">
                                  <button type="button" @click="delleteAll()" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Delete Selected</button>
                              </div>
                              <div class="input-group col-md-2">
                                  <input type="text" v-model="search" class="form-control" >
                              </div>
                          </div>
                        </div>
                        <table class="table table-sm text-center">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" v-model="selectAll" @click="select"></th>
                                    <th>Name</th>
                                    <th>subject </th>
                                    <th>Email </th>
                                    <th class="desc">Message</th>
                                    <th>Read/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="d, no in datas.data" >
                                    <td> <input type="checkbox" :value="d.id" v-model="selected"> </td>
                                    <td>{{ d.name  }}</td>
                                    <td>{{ d.subject  }}</td>
                                    <td><a :href="'mailto:'+ d.email ">{{ d.email }}</a></td>
                                    <td>{{ d.message }}</td>
                                    <td>
                                        <div v-if="d.status === 1">
                                          <a href="#" @click.prevent='read(d)' title="Not yet To read"> <i class="fa fa-eye text-danger"></i> </a>
                                          &nbsp |
                                          &nbsp
                                          <a href="#" @click.prevent='deleted(d)' title="Already to Read"><i class="fa fa-trash text-primary"></i></a>
                                        </div>
                                        <div v-else-if="d.status  === 0">
                                          <a href="#" @click.prevent='read(d)' title="Already to Read"><i class="fa fa-eye text-primary"></i></a>
                                          &nbsp |
                                          &nbsp
                                          <a href="#" @click.prevent='deleted(d)' title="Already to Read"><i class="fa fa-trash text-primary"></i></a>
                                        </div>
                                    </td>
                                    <!-- <td>
                                        <button type="button" @click.prevent='edit(d)' class="btn-warning btn-xs"> <i class="fa fa-pencil"></i> </button>
                                        <button type="button" @click.prevent='deleted(d)' class="btn-danger btn-xs"> <i class="fa fa-times"></i> </button>

                                    </td> -->
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
                            <input type="text" v-model='input.name' class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Value</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" v-model="input.value">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">color</label>
                        <div class="col-md-9">
                            <input type="text" v-model='input.color' class="form-control">
                            to find code Color Please click <a href="https://getbootstrap.com/docs/4.0/utilities/colors/" target="_blank">Bootstrap Color</a>
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
            url: BASE_URL + 'api/message' ,
            selected: [],
		        selectAll: false
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
        read(d){
            axios.get(this.url + `/read/${d.id}` ).then((res) => {
                console.log(res)
                this.getData()
            }).catch((err) => {
                console.log(err)
            })
        },
        create(){
            this.input.name = ''
            this.input.value = ''
            this.input.id = undefined
            this.color = ''
            this.$modal.show('create');
        },
        save(){
            axios.post(this.url , this.input).then((res) => {
               this.input.name = ''
               this.input.value = ''
               this.color = ''
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
                    this.input.value = ''
                    this.input.color = ''
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
                var hitung = (this.pages - 1) * 10
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
        },
        select() {
    			this.selected = [];
    			if (!this.selectAll) {
    				for (let i in this.datas.data) {
    					this.selected.push(this.datas.data[i].id);
    				}
    			}
    		},
        delleteAll(){
          if (!confirm('Anda yakin?')) {
              return
          }
          axios.post(this.url+'/delleteAll', { id : this.selected } ).then((res) => {
              this.getData()
              console.log(res)
          }).catch((err) => {
              console.console.log(err);
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
