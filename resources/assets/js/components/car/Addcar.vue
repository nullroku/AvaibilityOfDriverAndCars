<template lang="html">
  <div class="container">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">TAMBAH MOBIL</button>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id=""></h4>
          </div>
          <div class="modal-body">
            <form @submit.prevent="add" class="form-horizontal">

              <div class="form-group">
                <label class="control-label col-sm-3" for="">NAMA MOBIL</label>
                <div class="col-sm-9">
                  <input v-model="inputData.name" class="form-control" type="text" name="name" value="">
                  <span class="text-danger">{{ errors.id?errors.name[0]:"" }}</span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="license_number">NO. POLISI</label>
                <div class="col-sm-9">
                  <input v-model="inputData.license_number" class="form-control" type="text" name="license_number" value="">
                  <span class="text-danger">{{ errors.license_number?errors.license_number[0]:"" }}</span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="location">LOKASI</label>
                <div class="col-sm-9">
                  <select  class="form-control" name="location" v-model="inputData.location">
                    <option>TDC BARAT</option>
                    <option>TDC TIMUR</option>
                    <option>TDC UTARA</option>
                    <option>TDC PPU</option>
                    <option>TDC GROGOT</option>
                  </select>
                  <span class="text-danger">{{ errors.saldo_awal?errors.location[0]:"" }}</span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="type">TYPE</label>
                <div class="col-sm-9">
                  <input v-model="inputData.type" class="form-control" type="text" name="type" value="">
                  <span class="text-danger">{{ errors.type?errors.type[0]:"" }}</span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="mutasi_masuk">TAHUN</label>
                <div class="col-sm-9">
                  <input v-model="inputData.year" class="form-control" type="text" name="year" value="">
                  <span class="text-danger">{{ errors.year?errors.year[0]:"" }}</span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="colour">WARNA</label>
                <div class="col-sm-9">
                  <input v-model="inputData.colour" class="form-control" type="text" name="colour" value="">
                  <span class="text-danger">{{ errors.colour?errors.colour[0]:"" }}</span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="frame_number">NOMOR RANGKA</label>
                <div class="col-sm-9">
                  <input v-model="inputData.frame_number" class="form-control" type="text" name="frame_number" value="">
                  <span class="text-danger">{{ errors.frame_number?errors.frame_number[0]:"" }}</span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="machine_number">NOMOR MESIN</label>
                <div class="col-sm-9">
                  <input v-model="inputData.machine_number" class="form-control" type="text" name="machine_number" value="">
                  <span class="text-danger">{{ errors.machine_number?errors.machine_number[0]:"" }}</span>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
        cars:[],

        inputData:{
          name:'',
          license_number:'',
          location:'',
          type:'',
          year:'',
          colour:'',
          frame_number:'',
          machine_number:''
        },

        errors:{}

    }
  },
  methods:{
    add(){
      axios.post('/api-indexcar',this.inputData)
      .then(response=>{
        this.$router.push('/car');
        console.log(response);
      })
      .catch(error=>{
        // this.errors=error.response.data;
        console.log(error.response);
      })
    },
  },
  mounted(){

  }

}
</script>

<style lang="css">
</style>
