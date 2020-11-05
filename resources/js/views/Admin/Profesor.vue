<template>
    <v-container class="justify-center" >
          <h3>Lista de Estudiantes: <br>
                <v-btn @click="StateNuevo=!StateNuevo" color="primary">Añadir</v-btn>

          </h3>
          <v-simple-table>
              <thead>
                  <th>Nombre</th> <th>Cedula</th> <th>correo</th> <th>Numero Carnet</th> <th>Acciones</th>
              </thead>
              <tbody>
                  <tr v-for="(item,index) in Estudiantes" :key="index">
                      <td>{{item.name}}</td>
                      <td>{{item.cedula}}</td>
                      <td>{{item.email}}</td>
                      <td>{{item.IdCarnet}}</td>
                      <td> <button class="btn btn-warning btn-sm"
                @click="abrirEditar(index)"><v-icon>mdi-pencil</v-icon>   Editar</button>
            <button class="btn btn-danger btn-sm"
                @click="eliminar(index)"><v-icon>mdi-delete</v-icon>Eliminar</button></td>
                  </tr>
              </tbody>
          </v-simple-table>


<!-- cuadros de dialogos--->
<!-- Carga--->
  <v-dialog
      v-model="StateLoading"
      hide-overlay
      persistent
      width="300"
    >
      <v-card
        color="primary"
        dark
      >
        <v-card-text>
          Cargando..
          <v-progress-linear
            indeterminate
            color="white"
            class="mb-0"
          ></v-progress-linear>
        </v-card-text>
      </v-card>
    </v-dialog>
<!-- Agregar --->
<v-dialog v-model="StateNuevo" persistent max-width="700px">
<v-card>
    <form @submit.prevent="agregar" lazy-validation >
   <v-card-title><span class="headline">Agregar Profesor</span></v-card-title>
   <v-card-text>
       <v-container>

           <v-row>
               <v-col cols="12" >
                   <v-text-field label="Ingrese el nombre"  v-model='Estudiante.name' :rules="nameRules"></v-text-field>
               </v-col>
                  <v-col cols="12" >
                   <v-text-field label="Ingrese la cedula" type="number" v-model="Estudiante.cedula" :rules="nameRules"></v-text-field>
               </v-col>
                 <v-col cols="12">
                <v-text-field  label="Email*"  required  type="email" v-model="Estudiante.email" :rules="emailRules"></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field  label="Password*"    type="password"  required  v-model="Estudiante.password"  :rules="nameRules" ></v-text-field>
              </v-col>
                <v-col cols="12">
                <v-text-field  label="Id carnet"    type="numeric"  required v-model="Estudiante.IdCarnet"  :rules="nameRules"  ></v-text-field>
              </v-col>
           </v-row>

       </v-container>
   </v-card-text>
    <v-card-actions>
   <v-spacer></v-spacer>
<v-btn color="blue darken-1"   text  @click="StateNuevo = false"  >
            Close
          </v-btn>
          <v-btn  color="blue darken-1" type="submit" >
            Save
          </v-btn>
    </v-card-actions>
      </form>
</v-card>
</v-dialog>

<!--Editar--->
<v-dialog v-model="modoEditar" persistent max-width="700px">
<v-card>
    <form @submit.prevent="GuardarEdicion(Estudiante)" lazy-validation >
   <v-card-title><span class="headline">Editar Estudiante</span></v-card-title>
   <v-card-text>
       <v-container>

           <v-row>
               <v-col cols="12" >
                   <v-text-field label="Ingrese el nombre"  v-model='Estudiante.name' :rules="nameRules"></v-text-field>
               </v-col>
                  <v-col cols="12" >
                   <v-text-field label="Ingrese la cedula" type="number" v-model="Estudiante.cedula" :rules="nameRules"></v-text-field>
               </v-col>
                 <v-col cols="12">
                <v-text-field  label="Email*"  required  type="email" v-model="Estudiante.email" :rules="emailRules"></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field  label="Password*"    type="password"  required  v-model="Estudiante.password"  :rules="nameRules" ></v-text-field>
              </v-col>
                <v-col cols="12">
                <v-text-field  label="Id carnet"    type="numeric"  required v-model="Estudiante.IdCarnet"  :rules="nameRules"  ></v-text-field>
              </v-col>
           </v-row>

       </v-container>
   </v-card-text>
    <v-card-actions>
   <v-spacer></v-spacer>
<v-btn color="blue darken-1"   text  @click="Cancelar"  >
            Cancelar
          </v-btn>
          <v-btn  color="blue darken-1" type="submit" >
            Save
          </v-btn>
    </v-card-actions>
      </form>
</v-card>
</v-dialog>
    </v-container>
</template>



<script>

export default {
    created(){
        this.StateLoading=true;
        axios.get('/Admin/Teacher').then(res=>{
            this.Estudiantes=res.data;
        })
    this.StateLoading=false;
    },
    data(){
        return{
            Estudiantes:[],
            StateLoading:false,
            StateNuevo:false,
            StateEditar:false,
            modoEditar:false,
            idEditar:{id:0 ,index:0},
            Estudiante:{name:'',cedula:'',email:'',IdCarnet:'',password:''},
            //reglas para los inputs
             nameRules: [
             v => !!v || 'El campo es requerido',
             v => (v && v.length >= 10) || 'Tienes que poner mas de 10 caracteres',
             ],
            email: '',
            emailRules: [
              v => !!v || 'Correo es requerido',
             v => /.+@.+\..+/.test(v) || 'Correo invalido',
            ],
        }
    },
    computed:{

    },
    methods:{
        agregar(){
            console.log("entro");
            this.StateLoading=true;
            const nuevoEstudiante=this.Estudiante;
            this.Estudiante={name:'',cedula:'',email:'',IdCarnet:'',password:''};
            axios.post('/Admin/teacher',nuevoEstudiante).then((res) =>{
                 const notaServidor = res.data;
                    console.log(notaServidor);

            });
            this.StateLoading=false;
            this.StateNuevo=false;

        },
       eliminar(index){
        const confirmacion = confirm(`Eliminar nota ${this.Estudiantes[index].name}`);
           if(confirmacion){
               console.log("todo bien ahorita se te elimina");
               axios.delete(`/Admin/Teacher/eliminar/${this.Estudiantes[index].id}`).then(()=>{
                   this.Estudiantes.splice(index,1);
               })
           }
       },
       abrirEditar(index){
           this.idEditar.id=this.Estudiantes[index].id;
           this.idEditar.index=index;
            this.Estudiante.name=this.Estudiantes[index].name;
            this.Estudiante.cedula=this.Estudiantes[index].cedula;
            this.Estudiante.email=this.Estudiantes[index].email;
            this.Estudiante.IdCarnet=this.Estudiantes[index].IdCarnet;
            this.Estudiante.password=this.Estudiantes[index].password;
            this.modoEditar=true;
       },
       Cancelar(){
           this.Estudiante={name:'',cedula:'',email:'',IdCarnet:'',password:''};
           this.modoEditar=false;
       },
       GuardarEdicion(estudiantew){
           console.log(this.idEditar);
           const param={name:estudiantew.name ,cedula:estudiantew.cedula,email:estudiantew.email,
           IdCarnet:estudiantew.IdCarnet,password:estudiantew.password}
           axios.put(`/Editar/${this.idEditar.id}`,param).then(
             res=>{
               this.modoEditar=false;
                Estudiantes[this.idEditar.index]=param;
                console.log(res.data);
             })
       },
       cargar(){
                 this.StateLoading=true;
        axios.get('/Admin/Estudiantes').then(res=>{
            this.Estudiantes=res.data;
        })
    this.StateLoading=false;
       }

    }
}
</script>
