<template>
 <v-container class="justify-center" >
     <h3>Ver cursos</h3><br>
     <v-btn color="primary">Agregar</v-btn>
<v-simple-table>
<thead>
    <th>Nombre curso</th> <th>capacidad</th> <th>Acciones</th>
</thead>
<tbody>
    <tr v-for="(item,index) in Cursos" :key="index">
        <td>{{item.nombreCurso}}</td>
        <td>{{item.Capacidad}}</td>
        <td><v-btn @click="verInfoDelCurso(item.id,index)">Ver Ingresos</v-btn></td>
    </tr>
</tbody>
</v-simple-table>

<!--Cuadroo de dialogo-->
<v-dialog v-model="stateCursoIngresos" persistent max-width="700px">
<v-card>
<v-card-title><span class="headline">Ingreso del curso {{Cursos[index].nombreCurso}}</span></v-card-title>

<v-card-text>
<v-container>
       <v-date-picker v-model="fecha"  full-width :max="AñoMaximo" @change="verInfoDelCurso(idCurso,index)">
    </v-date-picker>

<v-simple-table>

    <thead>
        <th>Tarjeta de ingreso</th> <th>temperatura</th> <th>fecha</th> <th>accion</th>
    </thead>
    <tbody>
        <tr v-for="(item,index) in PersonasIngreso"  :key="index">
            <td>{{item.Usuario_id}}</td>
            <td >{{item.Temperatura}}°</td>
            <td>{{item.Fecha}}</td>
            <td><v-btn @click="obtenerDatosUser(item.Usuario_id)">ver estudiante</v-btn></td>
        </tr>
    </tbody>
</v-simple-table>
</v-container>
</v-card-text>
<v-card-actions>
<v-spacer></v-spacer>

<v-btn @click="cerrarCurso">Cerrar</v-btn>
</v-card-actions>


</v-card>

</v-dialog>

<v-dialog v-model="statePersona" persistent max-width="400">
<v-card >
   <v-card width="400">
         <v-img
          height="200px"
          src="https://cdn.pixabay.com/photo/2020/07/12/07/47/bee-5396362_1280.jpg"
        >

          <v-card-title class="white--text mt-8">
            <v-avatar size="56">
              <img
                alt="user"
                src="https://cdn.pixabay.com/photo/2020/06/24/19/12/cabbage-5337431_1280.jpg"
              >
            </v-avatar>
            <p class="ml-3">
             {{Persona.name}}
            </p>
          </v-card-title>
         </v-img>
         <v-card-text>
             <div class="font-weight-bold ml-8 mb-2">
            Datos
          </div>

          <v-timeline
            align-top
            dense
          >
            <v-timeline-item
              small
            >
              <div>
                <div class="font-weight-normal">
                  <strong>Cedula:</strong>{{ Persona.cedula}}
                </div>
              </div>
            </v-timeline-item>

   <v-timeline-item
              small
            >
              <div>
                <div class="font-weight-normal">
                  <strong>Correo:</strong>{{Persona.email}}
                </div>
              </div>
            </v-timeline-item>

          </v-timeline>
        </v-card-text>
        <v-card-actions>
<v-spacer></v-spacer>

<v-btn @click="cerrarPersona">Cerrar</v-btn>
</v-card-actions>




   </v-card>


</v-card>
</v-dialog>

<v-dialog>

</v-dialog>

<v-dialog>

</v-dialog>
 </v-container>
</template>


<script>
export default {
created(){
  axios.get('/Admin/Cursos').then(res=>{
            this.Cursos=res.data;
        })
},
data(){
    return{
        Cursos:[],
        Curso:[],
        PersonasIngreso:[],
        PersonaIngresoCopia:[],
        Persona:[],
        fecha: new Date().toISOString().substr(0, 10),
        AñoMaximo:new Date().toISOString().substr(0, 10),
        stateCursoIngresos:false,
        statePersona:false,
        stateAgregar:false,
        idCurso:0,
        idPersona:0,
        index:0,
        respueta:[]



    }
},
methods:{
    verInfoDelCurso(idCurso,index){
        console.log(this.fecha);
        this.stateCursoIngresos=true;
        this.index=index;
        this.idCurso=idCurso;
        axios.get(`/Admin/curso/ver/${idCurso}/${this.fecha}`).then(res=>{
            this.PersonasIngreso=res.data;
        })
    },
    FiltrarCurso(){

    },
    cerrarCurso(){
        this.stateCursoIngresos=false;
        this.index=0;
        this.PersonasIngreso=[];
        console.log(this.stateCursoIngresos);
    },
    obtenerDatosUser(carnet){
        this.statePersona=true;
          axios.get(`/Admin/obtenerUser/${carnet}`).then(res=>{
           this.respueta=res.data;
            this.Persona=this.respueta[0];

        })

    },
    cerrarPersona(){
        this.statePersona=false;
        this.Persona=[]
    }
}
}
</script>
