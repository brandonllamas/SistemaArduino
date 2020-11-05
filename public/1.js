(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Admin/Profesor.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Admin/Profesor.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  created: function created() {
    var _this = this;

    this.StateLoading = true;
    axios.get('/Admin/Teacher').then(function (res) {
      _this.Estudiantes = res.data;
    });
    this.StateLoading = false;
  },
  data: function data() {
    return {
      Estudiantes: [],
      StateLoading: false,
      StateNuevo: false,
      StateEditar: false,
      modoEditar: false,
      idEditar: {
        id: 0,
        index: 0
      },
      Estudiante: {
        name: '',
        cedula: '',
        email: '',
        IdCarnet: '',
        password: ''
      },
      //reglas para los inputs
      nameRules: [function (v) {
        return !!v || 'El campo es requerido';
      }, function (v) {
        return v && v.length >= 10 || 'Tienes que poner mas de 10 caracteres';
      }],
      email: '',
      emailRules: [function (v) {
        return !!v || 'Correo es requerido';
      }, function (v) {
        return /.+@.+\..+/.test(v) || 'Correo invalido';
      }]
    };
  },
  computed: {},
  methods: {
    agregar: function agregar() {
      console.log("entro");
      this.StateLoading = true;
      var nuevoEstudiante = this.Estudiante;
      this.Estudiante = {
        name: '',
        cedula: '',
        email: '',
        IdCarnet: '',
        password: ''
      };
      axios.post('/Admin/teacher', nuevoEstudiante).then(function (res) {
        var notaServidor = res.data;
        console.log(notaServidor);
      });
      this.StateLoading = false;
      this.StateNuevo = false;
    },
    eliminar: function eliminar(index) {
      var _this2 = this;

      var confirmacion = confirm("Eliminar nota ".concat(this.Estudiantes[index].name));

      if (confirmacion) {
        console.log("todo bien ahorita se te elimina");
        axios["delete"]("/Admin/Teacher/eliminar/".concat(this.Estudiantes[index].id)).then(function () {
          _this2.Estudiantes.splice(index, 1);
        });
      }
    },
    abrirEditar: function abrirEditar(index) {
      this.idEditar.id = this.Estudiantes[index].id;
      this.idEditar.index = index;
      this.Estudiante.name = this.Estudiantes[index].name;
      this.Estudiante.cedula = this.Estudiantes[index].cedula;
      this.Estudiante.email = this.Estudiantes[index].email;
      this.Estudiante.IdCarnet = this.Estudiantes[index].IdCarnet;
      this.Estudiante.password = this.Estudiantes[index].password;
      this.modoEditar = true;
    },
    Cancelar: function Cancelar() {
      this.Estudiante = {
        name: '',
        cedula: '',
        email: '',
        IdCarnet: '',
        password: ''
      };
      this.modoEditar = false;
    },
    GuardarEdicion: function GuardarEdicion(estudiantew) {
      var _this3 = this;

      console.log(this.idEditar);
      var param = {
        name: estudiantew.name,
        cedula: estudiantew.cedula,
        email: estudiantew.email,
        IdCarnet: estudiantew.IdCarnet,
        password: estudiantew.password
      };
      axios.put("/Editar/".concat(this.idEditar.id), param).then(function (res) {
        _this3.modoEditar = false;
        Estudiantes[_this3.idEditar.index] = param;
        console.log(res.data);
      });
    },
    cargar: function cargar() {
      var _this4 = this;

      this.StateLoading = true;
      axios.get('/Admin/Estudiantes').then(function (res) {
        _this4.Estudiantes = res.data;
      });
      this.StateLoading = false;
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Admin/Profesor.vue?vue&type=template&id=392a0ea9&":
/*!************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Admin/Profesor.vue?vue&type=template&id=392a0ea9& ***!
  \************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "v-container",
    { staticClass: "justify-center" },
    [
      _c(
        "h3",
        [
          _vm._v("Lista de Estudiantes: "),
          _c("br"),
          _vm._v(" "),
          _c(
            "v-btn",
            {
              attrs: { color: "primary" },
              on: {
                click: function($event) {
                  _vm.StateNuevo = !_vm.StateNuevo
                }
              }
            },
            [_vm._v("Añadir")]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("v-simple-table", [
        _c("thead", [
          _c("th", [_vm._v("Nombre")]),
          _vm._v(" "),
          _c("th", [_vm._v("Cedula")]),
          _vm._v(" "),
          _c("th", [_vm._v("correo")]),
          _vm._v(" "),
          _c("th", [_vm._v("Numero Carnet")]),
          _vm._v(" "),
          _c("th", [_vm._v("Acciones")])
        ]),
        _vm._v(" "),
        _c(
          "tbody",
          _vm._l(_vm.Estudiantes, function(item, index) {
            return _c("tr", { key: index }, [
              _c("td", [_vm._v(_vm._s(item.name))]),
              _vm._v(" "),
              _c("td", [_vm._v(_vm._s(item.cedula))]),
              _vm._v(" "),
              _c("td", [_vm._v(_vm._s(item.email))]),
              _vm._v(" "),
              _c("td", [_vm._v(_vm._s(item.IdCarnet))]),
              _vm._v(" "),
              _c("td", [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-warning btn-sm",
                    on: {
                      click: function($event) {
                        return _vm.abrirEditar(index)
                      }
                    }
                  },
                  [_c("v-icon", [_vm._v("mdi-pencil")]), _vm._v("   Editar")],
                  1
                ),
                _vm._v(" "),
                _c(
                  "button",
                  {
                    staticClass: "btn btn-danger btn-sm",
                    on: {
                      click: function($event) {
                        return _vm.eliminar(index)
                      }
                    }
                  },
                  [_c("v-icon", [_vm._v("mdi-delete")]), _vm._v("Eliminar")],
                  1
                )
              ])
            ])
          }),
          0
        )
      ]),
      _vm._v(" "),
      _c(
        "v-dialog",
        {
          attrs: { "hide-overlay": "", persistent: "", width: "300" },
          model: {
            value: _vm.StateLoading,
            callback: function($$v) {
              _vm.StateLoading = $$v
            },
            expression: "StateLoading"
          }
        },
        [
          _c(
            "v-card",
            { attrs: { color: "primary", dark: "" } },
            [
              _c(
                "v-card-text",
                [
                  _vm._v("\n          Cargando..\n          "),
                  _c("v-progress-linear", {
                    staticClass: "mb-0",
                    attrs: { indeterminate: "", color: "white" }
                  })
                ],
                1
              )
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "v-dialog",
        {
          attrs: { persistent: "", "max-width": "700px" },
          model: {
            value: _vm.StateNuevo,
            callback: function($$v) {
              _vm.StateNuevo = $$v
            },
            expression: "StateNuevo"
          }
        },
        [
          _c("v-card", [
            _c(
              "form",
              {
                attrs: { "lazy-validation": "" },
                on: {
                  submit: function($event) {
                    $event.preventDefault()
                    return _vm.agregar($event)
                  }
                }
              },
              [
                _c("v-card-title", [
                  _c("span", { staticClass: "headline" }, [
                    _vm._v("Agregar Profesor")
                  ])
                ]),
                _vm._v(" "),
                _c(
                  "v-card-text",
                  [
                    _c(
                      "v-container",
                      [
                        _c(
                          "v-row",
                          [
                            _c(
                              "v-col",
                              { attrs: { cols: "12" } },
                              [
                                _c("v-text-field", {
                                  attrs: {
                                    label: "Ingrese el nombre",
                                    rules: _vm.nameRules
                                  },
                                  model: {
                                    value: _vm.Estudiante.name,
                                    callback: function($$v) {
                                      _vm.$set(_vm.Estudiante, "name", $$v)
                                    },
                                    expression: "Estudiante.name"
                                  }
                                })
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c(
                              "v-col",
                              { attrs: { cols: "12" } },
                              [
                                _c("v-text-field", {
                                  attrs: {
                                    label: "Ingrese la cedula",
                                    type: "number",
                                    rules: _vm.nameRules
                                  },
                                  model: {
                                    value: _vm.Estudiante.cedula,
                                    callback: function($$v) {
                                      _vm.$set(_vm.Estudiante, "cedula", $$v)
                                    },
                                    expression: "Estudiante.cedula"
                                  }
                                })
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c(
                              "v-col",
                              { attrs: { cols: "12" } },
                              [
                                _c("v-text-field", {
                                  attrs: {
                                    label: "Email*",
                                    required: "",
                                    type: "email",
                                    rules: _vm.emailRules
                                  },
                                  model: {
                                    value: _vm.Estudiante.email,
                                    callback: function($$v) {
                                      _vm.$set(_vm.Estudiante, "email", $$v)
                                    },
                                    expression: "Estudiante.email"
                                  }
                                })
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c(
                              "v-col",
                              { attrs: { cols: "12" } },
                              [
                                _c("v-text-field", {
                                  attrs: {
                                    label: "Password*",
                                    type: "password",
                                    required: "",
                                    rules: _vm.nameRules
                                  },
                                  model: {
                                    value: _vm.Estudiante.password,
                                    callback: function($$v) {
                                      _vm.$set(_vm.Estudiante, "password", $$v)
                                    },
                                    expression: "Estudiante.password"
                                  }
                                })
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c(
                              "v-col",
                              { attrs: { cols: "12" } },
                              [
                                _c("v-text-field", {
                                  attrs: {
                                    label: "Id carnet",
                                    type: "numeric",
                                    required: "",
                                    rules: _vm.nameRules
                                  },
                                  model: {
                                    value: _vm.Estudiante.IdCarnet,
                                    callback: function($$v) {
                                      _vm.$set(_vm.Estudiante, "IdCarnet", $$v)
                                    },
                                    expression: "Estudiante.IdCarnet"
                                  }
                                })
                              ],
                              1
                            )
                          ],
                          1
                        )
                      ],
                      1
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "v-card-actions",
                  [
                    _c("v-spacer"),
                    _vm._v(" "),
                    _c(
                      "v-btn",
                      {
                        attrs: { color: "blue darken-1", text: "" },
                        on: {
                          click: function($event) {
                            _vm.StateNuevo = false
                          }
                        }
                      },
                      [_vm._v("\n            Close\n          ")]
                    ),
                    _vm._v(" "),
                    _c(
                      "v-btn",
                      { attrs: { color: "blue darken-1", type: "submit" } },
                      [_vm._v("\n            Save\n          ")]
                    )
                  ],
                  1
                )
              ],
              1
            )
          ])
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "v-dialog",
        {
          attrs: { persistent: "", "max-width": "700px" },
          model: {
            value: _vm.modoEditar,
            callback: function($$v) {
              _vm.modoEditar = $$v
            },
            expression: "modoEditar"
          }
        },
        [
          _c("v-card", [
            _c(
              "form",
              {
                attrs: { "lazy-validation": "" },
                on: {
                  submit: function($event) {
                    $event.preventDefault()
                    return _vm.GuardarEdicion(_vm.Estudiante)
                  }
                }
              },
              [
                _c("v-card-title", [
                  _c("span", { staticClass: "headline" }, [
                    _vm._v("Editar Estudiante")
                  ])
                ]),
                _vm._v(" "),
                _c(
                  "v-card-text",
                  [
                    _c(
                      "v-container",
                      [
                        _c(
                          "v-row",
                          [
                            _c(
                              "v-col",
                              { attrs: { cols: "12" } },
                              [
                                _c("v-text-field", {
                                  attrs: {
                                    label: "Ingrese el nombre",
                                    rules: _vm.nameRules
                                  },
                                  model: {
                                    value: _vm.Estudiante.name,
                                    callback: function($$v) {
                                      _vm.$set(_vm.Estudiante, "name", $$v)
                                    },
                                    expression: "Estudiante.name"
                                  }
                                })
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c(
                              "v-col",
                              { attrs: { cols: "12" } },
                              [
                                _c("v-text-field", {
                                  attrs: {
                                    label: "Ingrese la cedula",
                                    type: "number",
                                    rules: _vm.nameRules
                                  },
                                  model: {
                                    value: _vm.Estudiante.cedula,
                                    callback: function($$v) {
                                      _vm.$set(_vm.Estudiante, "cedula", $$v)
                                    },
                                    expression: "Estudiante.cedula"
                                  }
                                })
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c(
                              "v-col",
                              { attrs: { cols: "12" } },
                              [
                                _c("v-text-field", {
                                  attrs: {
                                    label: "Email*",
                                    required: "",
                                    type: "email",
                                    rules: _vm.emailRules
                                  },
                                  model: {
                                    value: _vm.Estudiante.email,
                                    callback: function($$v) {
                                      _vm.$set(_vm.Estudiante, "email", $$v)
                                    },
                                    expression: "Estudiante.email"
                                  }
                                })
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c(
                              "v-col",
                              { attrs: { cols: "12" } },
                              [
                                _c("v-text-field", {
                                  attrs: {
                                    label: "Password*",
                                    type: "password",
                                    required: "",
                                    rules: _vm.nameRules
                                  },
                                  model: {
                                    value: _vm.Estudiante.password,
                                    callback: function($$v) {
                                      _vm.$set(_vm.Estudiante, "password", $$v)
                                    },
                                    expression: "Estudiante.password"
                                  }
                                })
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c(
                              "v-col",
                              { attrs: { cols: "12" } },
                              [
                                _c("v-text-field", {
                                  attrs: {
                                    label: "Id carnet",
                                    type: "numeric",
                                    required: "",
                                    rules: _vm.nameRules
                                  },
                                  model: {
                                    value: _vm.Estudiante.IdCarnet,
                                    callback: function($$v) {
                                      _vm.$set(_vm.Estudiante, "IdCarnet", $$v)
                                    },
                                    expression: "Estudiante.IdCarnet"
                                  }
                                })
                              ],
                              1
                            )
                          ],
                          1
                        )
                      ],
                      1
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "v-card-actions",
                  [
                    _c("v-spacer"),
                    _vm._v(" "),
                    _c(
                      "v-btn",
                      {
                        attrs: { color: "blue darken-1", text: "" },
                        on: { click: _vm.Cancelar }
                      },
                      [_vm._v("\n            Cancelar\n          ")]
                    ),
                    _vm._v(" "),
                    _c(
                      "v-btn",
                      { attrs: { color: "blue darken-1", type: "submit" } },
                      [_vm._v("\n            Save\n          ")]
                    )
                  ],
                  1
                )
              ],
              1
            )
          ])
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/Admin/Profesor.vue":
/*!***********************************************!*\
  !*** ./resources/js/views/Admin/Profesor.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Profesor_vue_vue_type_template_id_392a0ea9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Profesor.vue?vue&type=template&id=392a0ea9& */ "./resources/js/views/Admin/Profesor.vue?vue&type=template&id=392a0ea9&");
/* harmony import */ var _Profesor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Profesor.vue?vue&type=script&lang=js& */ "./resources/js/views/Admin/Profesor.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Profesor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Profesor_vue_vue_type_template_id_392a0ea9___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Profesor_vue_vue_type_template_id_392a0ea9___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Admin/Profesor.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/Admin/Profesor.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./resources/js/views/Admin/Profesor.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Profesor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Profesor.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Admin/Profesor.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Profesor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/Admin/Profesor.vue?vue&type=template&id=392a0ea9&":
/*!******************************************************************************!*\
  !*** ./resources/js/views/Admin/Profesor.vue?vue&type=template&id=392a0ea9& ***!
  \******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profesor_vue_vue_type_template_id_392a0ea9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Profesor.vue?vue&type=template&id=392a0ea9& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Admin/Profesor.vue?vue&type=template&id=392a0ea9&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profesor_vue_vue_type_template_id_392a0ea9___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profesor_vue_vue_type_template_id_392a0ea9___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);