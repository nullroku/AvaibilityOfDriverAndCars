<template lang="html">
  <table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th>NAMA</th>
        <th>E-MAIL</th>
        <th>ROLE</th>
        <th>PHONE</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for='user in users'>
        <td v-show="!showEdit(user.id)">{{user.name}}</td>
        <td v-show="showEdit(user.id)"><input v-model="editData.name" type="text" class="form-control" require autofocus /></td>

        <td v-show="!showEdit(user.id)">{{user.email}}</td>
        <td v-show="showEdit(user.id)"><input v-model="editData.email" type="text" class="form-control" require autofocus /></td>

        <td v-show="!showEdit(user.id)">{{user.role}}</td>
        <td v-show="showEdit(user.id)">
          <select v-show="showEdit(user.id)" v-model="editData.role" class="form-control" name="role" required autofocus>
            <option>{{user.role}}</option>
            <option>ADMIN</option>
            <option>USER</option>
            <option>DRIVER</option>
          </select>
        </td>

        <td v-show="!showEdit(user.id)">{{user.phone}}</td>
        <td v-show="showEdit(user.id)"><input v-model="editData.phone" type="number" class="form-control" require autofocus/></td>

        <td>
          <button v-show="!showEdit(user.id)" @click="formEdit(user.id)" class="btn btn-primary" type="button" name="button"><i class="fa fa-pencil"></i> Edit</button>
          <button v-show="!showEdit(user.id)" @click="deleteIt(user.id)" class="btn btn-danger" type="button" name="button"><i class="fa fa-times"></i> Delete</button>

          <button v-show="showEdit(user.id)" @click="updateIt(user.id)" class="btn btn-success" type="submit" ><i class="fa fa-check"></i> Save</button>
          <button v-show="showEdit(user.id)" @click.prevent="editForm=false" class="btn btn-danger" type="button" name="button"><i class="fa fa-times"> Cancel</i></button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  data(){
    return{
      users:[],

      editForm:"",

      editData:{
        name:'',
        email:'',
        role:'',
        phone:'',
      }
    }
  },
  methods:{
    indexUser(){
      axios.get('/api-indexuser/')
      .then(response=>{
        this.users=response.data;
        // console.log(response);
      });
    },

    formEdit(id){
      this.users.forEach((user,i)=>{
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
      axios.put('/api-indexuser/'+id,this.editData)
      .then(response=>{
        this.editForm=false;
        // this.editData=this.profiles;
        // this.push('/indexstokperdana');
        console.log(response);
      })
      .catch(error=>{
        console.log(error.response);
      })
      this.indexUser();
    },

    deleteIt(id){
      let ok=confirm("Apakah anda yakin menghapus data ini?");
      if(ok){
        axios.delete('/api-indexuser/'+id).then(response=>{
          this.indexUser();
          console.log(response);
        });
      }
    },


  },
  mounted(){
    this.indexUser();
  }
}
</script>

<style lang="css">
</style>
