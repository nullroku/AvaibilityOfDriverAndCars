<template lang="html">
  <table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th>NAMA MOBIL</th>
        <th>NO. POLISI</th>
        <th>LOKASI</th>
        <th>TYPE</th>
        <th>TAHUN</th>
        <th>WARNA</th>
        <th>NOMOR RANGKA</th>
        <th>NOMOR MESIN</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for='car in cars'>
        <td v-show="!showEdit(car.id)">{{car.name}}</td>
        <td v-show="showEdit(car.id)"><input v-model="editData.name" type="text" class="form-control" require autofocus /></td>

        <td v-show="!showEdit(car.id)">{{car.license_number}}</td>
        <td v-show="showEdit(car.id)"><input v-model="editData.license_number" type="text" class="form-control" require autofocus /></td>

        <td v-show="!showEdit(car.id)">{{car.location}}</td>
        <td v-show="showEdit(car.id)">
          <select v-show="showEdit(car.id)" v-model="editData.location" class="form-control" name="location" required autofocus>
            <option>{{car.location}}</option>
            <option>TDC BARAT</option>
            <option>TDC TIMUR</option>
            <option>TDC UTARA</option>
            <option>TDC PPU</option>
            <option>TDC GROGOT</option>
          </select>
        </td>

        <td v-show="!showEdit(car.id)">{{car.type}}</td>
        <td v-show="showEdit(car.id)"><input v-model="editData.type" type="text" class="form-control" require autofocus/></td>

        <td v-show="!showEdit(car.id)">{{car.year}}</td>
        <td v-show="showEdit(car.id)"><input v-model="editData.year" type="text" class="form-control" require autofocus/></td>

        <td v-show="!showEdit(car.id)">{{car.colour}}</td>
        <td v-show="showEdit(car.id)"><input v-model="editData.colour" type="text" class="form-control" require autofocus/></td>

        <td v-show="!showEdit(car.id)">{{car.frame_number}}</td>
        <td v-show="showEdit(car.id)"><input v-model="editData.frame_number" type="text" class="form-control" require autofocus/></td>

        <td v-show="!showEdit(car.id)">{{car.machine_number}}</td>
        <td v-show="showEdit(car.id)"><input v-model="editData.machine_number" type="text" class="form-control" require autofocus/></td>

        <td>
          <button v-show="!showEdit(car.id)" @click="formEdit(car.id)" class="btn btn-primary" type="button" name="button"><i class="fa fa-pencil"></i> Edit</button>
          <button v-show="!showEdit(car.id)" @click="deleteIt(car.id)" class="btn btn-danger" type="button" name="button"><i class="fa fa-times"></i> Delete</button>

          <button v-show="showEdit(car.id)" @click="updateIt(car.id)" class="btn btn-success" type="submit" ><i class="fa fa-check"></i> Save</button>
          <button v-show="showEdit(car.id)" @click.prevent="editForm=false" class="btn btn-danger" type="button" name="button"><i class="fa fa-times"> Cancel</i></button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  data(){
    return{
      cars:[],

      editForm:"",

      editData:{
        name:'',
        license_number:'',
        location:'',
        type:'',
        year:'',
        colour:'',
        frame_number:'',
        machine_number:'',
      }
    }
  },
  methods:{
    getIndex(){
      axios.get('/api-indexcar/')
      .then(response=>{
        this.cars=response.data;
        console.log(response);
      });
    },

    formEdit(id){
      this.cars.forEach((user,i)=>{
        if(user.id==id){
            this.editData=user;
        }
      });
      return this.editForm=id;
    },

    showEdit(id){
      if(this.editForm==id){
        return true;
      }
      return false;
    },

    updateIt(id){
      axios.put('/api-indexcar/'+id,this.editData)
      .then(response=>{
        this.editForm=false;
        // this.editData=this.profiles;
        // this.push('/indexstokperdana');
        console.log(response);
      })
      .catch(error=>{
        console.log(error.response);
      })
      this.getIndex();
    },

    deleteIt(id){
      let ok=confirm("Apakah anda yakin menghapus data ini?");
      if(ok){
        axios.delete('/api-indexcar/'+id).then(response=>{
          this.getIndex();
          console.log(response);
        });
      }
    },
  },
  mounted(){
    this.getIndex();
  }
}
</script>

<style lang="css">
</style>
